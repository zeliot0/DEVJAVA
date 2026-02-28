<?php

namespace App\Controller;

use App\Entity\TimeMessage;
use App\Form\TimeMessageType;
use App\Repository\TimeMessageRepository;
use App\Repository\GoalRepository;
use App\Service\TimeTravelerAiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/time-message')]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class TimeMessageController extends AbstractController
{
    private GoalRepository $goalRepository;
    
    public function __construct(GoalRepository $goalRepository)
    {
        $this->goalRepository = $goalRepository;
    }

    #[Route('/', name: 'app_time_message_index')]
    public function index(TimeMessageRepository $repository): Response
    {
        $user = $this->getUser();
        
        // Check if user is logged in
        if (!$user) {
            throw $this->createAccessDeniedException('User not logged in');
        }
        
        if ($this->isGranted('ROLE_ADMIN')) {
            $messages = $repository->findBy([], ['createdAtMsg' => 'DESC']);
        } else {
            // Use getId() instead of getIdUser() because your User entity uses getId()
            $messages = $repository->findByUserId($user->getId());
        }
        
        $delivered = [];
        $upcoming = [];
        $aiResponses = [];
        
        foreach ($messages as $message) {
            if ($message->getMessageTypeG() === 'future' || $message->getMessageTypeG() === 'past') {
                if ($message->isIsDeliveredMsg()) {
                    $delivered[] = $message;
                } else {
                    $upcoming[] = $message;
                }
            }
            
            // Find AI responses
            if ($message->getParentMessageId()) {
                $aiResponses[$message->getParentMessageId()] = $message;
            }
        }
        
        return $this->render('time_message/index.html.twig', [
            'delivered' => $delivered,
            'upcoming' => $upcoming,
            'aiResponses' => $aiResponses
        ]);
    }

    #[Route('/new/{type}', name: 'app_time_message_new')]
    public function new(
        Request $request, 
        string $type, 
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        TimeTravelerAiService $aiService
    ): Response {
        if ($response = $this->denyAdminTimeMessageWriteAccess()) {
            return $response;
        }

        if (!in_array($type, ['past', 'future'])) {
            throw $this->createNotFoundException('Invalid message type');
        }

        $user = $this->getUser();
        
        if (!$user) {
            throw $this->createAccessDeniedException('User not logged in');
        }
        
        $timeMessage = new TimeMessage();
        $timeMessage->setMessageTypeG($type);
        // Use getId() instead of getIdUser()
        $timeMessage->setIdUser($user->getId());
        $timeMessage->setTitleMsg($type === 'future' ? 'Letter to Future Self' : 'Letter to Past Self');
        
        if ($type === 'future') {
            $timeMessage->setDeliveryDateMsg(new \DateTime('+1 year'));
        }

        $form = $this->createForm(TimeMessageType::class, $timeMessage, [
            'type' => $type
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            // Handle video upload
            $videoFile = $form->get('video')->getData();
            if ($videoFile) {
                $originalFilename = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$videoFile->guessExtension();
                
                try {
                    $videoFile->move(
                        $this->getParameter('videos_directory'),
                        $newFilename
                    );
                    $timeMessage->setVideoPathMsg($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('time_message_error', 'Could not upload video file.');
                }
            }

            // Save the original message
            $entityManager->persist($timeMessage);
            $entityManager->flush();

            // FOR FUTURE MESSAGES: CALL THE EXTERNAL AI API
            if ($type === 'future') {
                $mood = $form->get('moodAtCreation')->getData();
                
                // Get goal title if a goal was selected
                $goalTitle = null;
                $goalId = $request->get('goal_id');
                if ($goalId) {
                    $goal = $this->goalRepository->find($goalId);
                    // Use getTitleGoa() instead of getTitle()
                    $goalTitle = $goal ? $goal->getTitleGoa() : null;
                    $timeMessage->setIdG($goalId);
                    $entityManager->flush();
                }

                // 🌟🌟🌟 THIS IS THE EXTERNAL API CALL 🌟🌟🌟
                $aiResponse = $aiService->generateFutureSelfResponse(
                    $timeMessage->getContentMsg(),
                    $goalTitle,
                    $mood
                );

                // Create AI response message (linked via parent_message_id)
                $aiMessage = new TimeMessage();
                $aiMessage->setMessageTypeG('ai_response');
                $aiMessage->setTitleMsg('🤖 Response from Your Future Self');
                $aiMessage->setContentMsg($aiResponse);
                // Use getId() instead of getIdUser()
                $aiMessage->setIdUser($user->getId());
                $aiMessage->setParentMessageId($timeMessage->getIdTimeMessage());
                $aiMessage->setDeliveryDateMsg($timeMessage->getDeliveryDateMsg());
                $aiMessage->setCreatedAtMsg(new \DateTime());
                $aiMessage->setIsDeliveredMsg(false);
                
                $entityManager->persist($aiMessage);
                $entityManager->flush();
                
                $this->addFlash('time_message_success', '✨ Your message has been sent to the future! The AI has generated a response from your future self.');
            } else {
                $this->addFlash('time_message_success', '📝 Your letter to the past has been saved.');
            }
            
            return $this->redirectToRoute('app_time_message_show', ['id' => $timeMessage->getIdTimeMessage()]);
        }

        // Get ALL goals since your Goal entity doesn't have user relationship
        // If you want to filter by user, you'll need to add a user_id field to Goal entity
        $goals = $this->goalRepository->findAll();

        return $this->render('time_message/new.html.twig', [
            'form' => $form->createView(),
            'type' => $type,
            'goals' => $goals
        ]);
    }

    #[Route('/{id}', name: 'app_time_message_show')]
    public function show(TimeMessage $timeMessage, TimeMessageRepository $repository): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            throw $this->createAccessDeniedException('User not logged in');
        }
        
        // Use getId() for comparison
        if (!$this->isGranted('ROLE_ADMIN') && $timeMessage->getIdUser() !== $user->getId()) {
            throw $this->createAccessDeniedException('You do not have access to this message');
        }

        // Get AI response if this is a parent message
        $aiResponse = null;
        if ($timeMessage->getMessageTypeG() === 'future') {
            $aiResponse = $repository->findOneBy(['parentMessageId' => $timeMessage->getIdTimeMessage()]);
        }

        // Get the linked goal if exists
        $goal = null;
        if ($timeMessage->getIdG()) {
            $goal = $this->goalRepository->find($timeMessage->getIdG());
        }

        return $this->render('time_message/show.html.twig', [
            'message' => $timeMessage,
            'aiResponse' => $aiResponse,
            'goal' => $goal
        ]);
    }

    #[Route('/{id}/delete', name: 'app_time_message_delete', methods: ['POST'])]
    public function delete(Request $request, TimeMessage $timeMessage, EntityManagerInterface $entityManager): Response
    {
        if ($response = $this->denyAdminTimeMessageWriteAccess()) {
            return $response;
        }

        $user = $this->getUser();
        
        if (!$user) {
            throw $this->createAccessDeniedException('User not logged in');
        }
        
        // Use getId() for comparison
        if ($timeMessage->getIdUser() !== $user->getId()) {
            throw $this->createAccessDeniedException('You do not have permission to delete this message');
        }

        if ($this->isCsrfTokenValid('delete'.$timeMessage->getIdTimeMessage(), $request->request->get('_token'))) {
            // Delete associated AI response
            $aiResponse = $entityManager->getRepository(TimeMessage::class)
                ->findOneBy(['parentMessageId' => $timeMessage->getIdTimeMessage()]);
            
            if ($aiResponse) {
                $entityManager->remove($aiResponse);
            }
            
            $entityManager->remove($timeMessage);
            $entityManager->flush();
            
            $this->addFlash('time_message_success', 'Time message deleted.');
        }

        return $this->redirectToRoute('app_time_message_index');
    }

    #[Route('/api/reflection-prompt/{mood}', name: 'app_time_message_prompt')]
    public function getReflectionPrompt(string $mood, TimeTravelerAiService $aiService): Response
    {
        $prompt = $aiService->generateReflectionPrompt($mood);
        
        return $this->json(['prompt' => $prompt]);
    }

    private function denyAdminTimeMessageWriteAccess(): ?Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('warning', 'Mode admin: Time Message est en lecture seule (visualisation uniquement).');
            return $this->redirectToRoute('app_time_message_index');
        }

        return null;
    }
}
