<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Theme;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question_index', methods: ['GET'])]
    public function index(QuestionRepository $questionRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('question/index.html.twig', [
            'questions' => $questionRepository->findAll(),
        ]);
    }

    #[Route('theme/{id}/question/new', name: 'app_question_new', methods: ['GET', 'POST'])]
    public function new(
        Theme $theme,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $question = new Question();
        $question->setTheme($theme);

        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('app_questions_by_theme', [
                'id' => $theme->getIdT(),
            ]);
        }

        return $this->render('question/admin/question/new.html.twig', [
            'form' => $form,
            'theme' => $theme,
        ]);
    }

    #[Route('/question/{id}/edit', name: 'app_question_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Question $question, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_questions_by_theme', [
                'id' => $question->getTheme()->getIdT(),
            ]);
        }

        return $this->render('question/edit.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }

    #[Route('/question/{id}', name: 'app_question_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Question $question,
        EntityManagerInterface $entityManager
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $theme = $question->getTheme();

        if ($this->isCsrfTokenValid('delete' . $question->getId(), $request->request->get('_token'))) {
            $entityManager->remove($question);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_questions_by_theme', [
            'id' => $theme->getIdT(),
        ]);
    }

    #[Route('/theme/{id}/questions', name: 'app_questions_by_theme')]
    public function byTheme(Theme $theme, QuestionRepository $questionRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('question/admin/question/by_theme.html.twig', [
            'theme' => $theme,
            'questions' => $questionRepository->findBy(['theme' => $theme]),
        ]);
    }

    #[Route('/theme/{id}/answer-preview', name: 'app_theme_answer_preview')]
    public function answerByTheme(
        Theme $theme,
        QuestionRepository $questionRepository
    ): Response {
        return $this->render('question/user/question/answer_by_theme.html.twig', [
            'theme' => $theme,
            'questions' => $questionRepository->findBy([
                'theme' => $theme,
                'actif' => true,
            ]),
        ]);
    }
}
