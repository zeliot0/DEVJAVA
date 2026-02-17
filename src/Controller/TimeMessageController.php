<?php

namespace App\Controller;

use App\Entity\TimeMessage;
use App\Entity\Goal;
use App\Entity\User;
use App\Repository\TimeMessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/time-journal')]
class TimeMessageController extends AbstractController
{
    private function getCurrentUserId(): ?int
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return null;
        }

        return $user->getId();
    }

    #[Route('/', name: 'app_time_message_index')]
    public function index(TimeMessageRepository $timeMessageRepository): Response
    {
        $userId = $this->getCurrentUserId();
        
        if (!$userId) {
            $this->addFlash('error', 'Please login first');
            return $this->redirectToRoute('app_login'); // Adjust to your login route
        }
        
        // Get messages by type
        $futureMessages = $timeMessageRepository->findByUserAndType($userId, TimeMessage::TYPE_TO_FUTURE);
        $pastMessages = $timeMessageRepository->findByUserAndType($userId, TimeMessage::TYPE_TO_PAST);
        $reflections = $timeMessageRepository->findByUserAndType($userId, TimeMessage::TYPE_REFLECTION);
        
        // Get undelivered messages
        $undeliveredMessages = $timeMessageRepository->findUndeliveredMessages($userId);
        
        return $this->render('time_message/index.html.twig', [
            'future_messages' => $futureMessages,
            'past_messages' => $pastMessages,
            'reflections' => $reflections,
            'undelivered_messages' => $undeliveredMessages,
        ]);
    }

    #[Route('/new/future/{goalId?}', name: 'app_time_message_new_future')]
    public function newFuture(Request $request, EntityManagerInterface $entityManager, 
                              SluggerInterface $slugger, ?int $goalId = null): Response
    {
        $userId = $this->getCurrentUserId();
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }
        
        if ($request->isMethod('POST')) {
            $timeMessage = new TimeMessage();
            $timeMessage->setTitleMsg($request->request->get('title'));
            $timeMessage->setMessageTypeG(TimeMessage::TYPE_TO_FUTURE);
            $timeMessage->setContentMsg($request->request->get('content'));
            $timeMessage->setCreatedAtMsg(new \DateTime());
            $timeMessage->setIdUser($userId);
            
            // Handle goal relationship (route param or form field)
            $selectedGoalId = $goalId ?: (int) $request->request->get('goal_id');
            if ($selectedGoalId) {
                $goal = $entityManager->getRepository(Goal::class)->find($selectedGoalId);
                if ($goal) {
                    $timeMessage->setGoal($goal);
                }
            }
            
            // Handle delivery date
            $deliveryOption = $request->request->get('delivery_option');
            $customDate = $request->request->get('custom_delivery_date');
            
            $deliveryDate = $this->calculateDeliveryDate($deliveryOption, $customDate);
            $timeMessage->setDeliveryDateMsg($deliveryDate);
            
            // Handle video upload
            /** @var UploadedFile $videoFile */
            $videoFile = $request->files->get('video_file');
            
            if ($videoFile) {
                $originalFilename = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$videoFile->guessExtension();
                
                try {
                    $videoFile->move(
                        $this->getParameter('videos_directory'),
                        $newFilename
                    );
                    $timeMessage->setVideoPathMsg('/uploads/videos/'.$newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Failed to upload video');
                }
            }
            
            $entityManager->persist($timeMessage);
            $entityManager->flush();
            
            $this->addFlash('success', 'Your letter to your future self has been saved.');
            
            return $this->redirectToRoute('app_time_message_index');
        }
        
        // Goal currently has no user relation in mapping; load available goals for selection.
        $goals = $entityManager->getRepository(Goal::class)->findAll();
        
        return $this->render('time_message/new.html.twig', [
            'type' => 'future',
            'goalId' => $goalId,
            'goals' => $goals
        ]);
    }

    #[Route('/new/past/{goalId?}', name: 'app_time_message_new_past')]
    public function newPast(Request $request, EntityManagerInterface $entityManager, 
                            TimeMessageRepository $timeMessageRepository, ?int $goalId = null): Response
    {
        $userId = $this->getCurrentUserId();
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }
        
        if ($request->isMethod('POST')) {
            $timeMessage = new TimeMessage();
            $timeMessage->setTitleMsg($request->request->get('title'));
            $timeMessage->setMessageTypeG(TimeMessage::TYPE_TO_PAST);
            $timeMessage->setContentMsg($request->request->get('content'));
            $timeMessage->setCreatedAtMsg(new \DateTime());
            $timeMessage->setIdUser($userId);
            
            // Handle goal relationship (route param or form field)
            $selectedGoalId = $goalId ?: (int) $request->request->get('goal_id');
            if ($selectedGoalId) {
                $goal = $entityManager->getRepository(Goal::class)->find($selectedGoalId);
                if ($goal) {
                    $timeMessage->setGoal($goal);
                }
            }
            
            $replyTo = $request->request->get('reply_to');
            if ($replyTo) {
                $timeMessage->setParentMessageId((int)$replyTo);
            }
            
            $entityManager->persist($timeMessage);
            $entityManager->flush();
            
            $this->addFlash('success', 'Your letter to your past self has been saved.');
            
            return $this->redirectToRoute('app_time_message_index');
        }
        
        // Get future messages to reply to
        $futureMessages = $timeMessageRepository->findByUserAndType($userId, TimeMessage::TYPE_TO_FUTURE);
        $goals = $entityManager->getRepository(Goal::class)->findAll();
        
        return $this->render('time_message/new.html.twig', [
            'type' => 'past',
            'goalId' => $goalId,
            'future_messages' => $futureMessages,
            'goals' => $goals
        ]);
    }

    #[Route('/show/{id}', name: 'app_time_message_show')]
    public function show(int $id, TimeMessageRepository $timeMessageRepository, 
                         EntityManagerInterface $entityManager): Response
    {
        $userId = $this->getCurrentUserId();
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }
        
        $message = $timeMessageRepository->find($id);
        
        if (!$message || $message->getIdUser() !== $userId) {
            throw $this->createNotFoundException('Message not found');
        }
        
        // If it's a future message being viewed for first time after delivery
        if ($message->getMessageTypeG() === TimeMessage::TYPE_TO_FUTURE 
            && !$message->isDeliveredMsg() 
            && $message->isReadyForDelivery()) {
            $message->markAsDelivered();
            $entityManager->flush();
            
            $this->addFlash('success', 'A message from your past self has arrived.');
        }
        
        // Get replies if any
        $replies = $timeMessageRepository->findBy([
            'parentMessageId' => $id,
            'idUser' => $userId,
        ]);
        
        return $this->render('time_message/show.html.twig', [
            'message' => $message,
            'replies' => $replies
        ]);
    }

    #[Route('/reply/{id}', name: 'app_time_message_reply')]
    public function reply(int $id, Request $request, EntityManagerInterface $entityManager,
                          TimeMessageRepository $timeMessageRepository): Response
    {
        $userId = $this->getCurrentUserId();
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }
        
        $originalMessage = $timeMessageRepository->find($id);
        
        if (!$originalMessage || $originalMessage->getIdUser() !== $userId) {
            throw $this->createNotFoundException('Message not found');
        }
        
        if ($request->isMethod('POST')) {
            $reply = new TimeMessage();
            $reply->setTitleMsg('Re: ' . $originalMessage->getTitleMsg());
            $reply->setMessageTypeG(TimeMessage::TYPE_TO_PAST);
            $reply->setContentMsg($request->request->get('content'));
            $reply->setCreatedAtMsg(new \DateTime());
            $reply->setIdUser($userId);
            $reply->setGoal($originalMessage->getGoal());
            $reply->setParentMessageId($id);
            
            $entityManager->persist($reply);
            $entityManager->flush();
            
            $this->addFlash('success', 'Your reply has been saved!');
            
            return $this->redirectToRoute('app_time_message_show', ['id' => $id]);
        }
        
        return $this->render('time_message/reply.html.twig', [
            'original_message' => $originalMessage
        ]);
    }

    private function calculateDeliveryDate(?string $option, ?string $customDate): \DateTime
    {
        $date = new \DateTime();
        
        switch ($option ?? '1month') {
            case '1month':
                $date->modify('+1 month');
                break;
            case '3months':
                $date->modify('+3 months');
                break;
            case '6months':
                $date->modify('+6 months');
                break;
            case '1year':
                $date->modify('+1 year');
                break;
            case 'custom':
                if ($customDate) {
                    $date = new \DateTime($customDate);
                }
                break;
            default:
                $date->modify('+1 month');
        }
        
        return $date;
    }
}
