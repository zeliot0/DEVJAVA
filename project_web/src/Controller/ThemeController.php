<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Form\ThemeType;
use App\Repository\ThemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/theme')]
class ThemeController extends AbstractController
{
   
  #[Route('/', name: 'app_theme_index')]
public function index(
    Request $request,
    ThemeRepository $themeRepository
): Response {
    $search = $request->query->get('q');

    
    if ($search) {
        $themes = $themeRepository->searchByName($search);
    } else {
        $themes = $themeRepository->findAll();
    }

    
    foreach ($themes as $theme) {
        $questions = $theme->getQuestions();
        $total = count($questions);

        $completed = 0;
        foreach ($questions as $question) {
            
            if (method_exists($question, 'isCompleted') && $question->isCompleted()) {
                $completed++;
            }
        }

        $progress = $total > 0 ? round(($completed / $total) * 100) : 0;

        
        $theme->totalQuestions = $total;
        $theme->completedQuestions = $completed;
        $theme->progress = $progress;
    }

   
    if ($request->isXmlHttpRequest()) {
        return $this->render('theme/_themes_list.html.twig', [
            'themes' => $themes,
        ]);
    }

    
    return $this->render('theme/index.html.twig', [
        'themes' => $themes,
        'search' => $search,
    ]);
}




  
   #[Route('/new', name: 'app_theme_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
   
    $theme = new Theme();
    $theme->setActif(true); 

    $form = $this->createForm(ThemeType::class, $theme);
    $form->handleRequest($request);

    
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($theme);
        $entityManager->flush();

        $this->addFlash('success', 'Thème créé avec succès');

        return $this->redirectToRoute('app_theme_index');
    }

    
    return $this->render('theme/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

   
    #[Route('/{id}/show', name: 'app_theme_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Theme $theme): Response
    {
        return $this->render('theme/show.html.twig', [
            'theme' => $theme,
        ]);
    }

 
    #[Route('/{id}/edit', name: 'app_theme_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Theme $theme,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ThemeType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Thème modifié avec succès');

            return $this->redirectToRoute('app_theme_index');
        }

        return $this->render('theme/edit.html.twig', [
            'form' => $form->createView(),
            'theme' => $theme,
        ]);
    }

    
    #[Route('/{id}/delete', name: 'app_theme_delete', requirements: ['id' => '\d+'], methods: ['POST'])]
public function delete(
    Request $request,
    Theme $theme,
    EntityManagerInterface $entityManager
): Response {
    if ($this->isCsrfTokenValid('delete'.$theme->getIdT(), $request->request->get('_token'))) {
        $entityManager->remove($theme);
        $entityManager->flush();

        $this->addFlash('success', 'Thème supprimé');
    }

    return $this->redirectToRoute('app_theme_index');
}

    #[Route('/user/theme', name: 'user_theme_index')]
public function userThemes(): Response
{
    return $this->redirectToRoute('app_conscience_index');
}
#[Route('/theme/assistant', name: 'app_theme_assistant', methods: ['POST'])]
public function themeAssistant(
    Request $request,
    ThemeRepository $themeRepo
): JsonResponse {

    $msg = strtolower(json_decode($request->getContent(), true)['message'] ?? '');

    $themes = $themeRepo->findAll();

    $reply = "فهمتك 👍";

    if (str_contains($msg, 'شنو') || str_contains($msg, 'quoi')) {
        $active = array_filter($themes, fn($t) => $t->isActif());
        $reply = "عندك " . count($active) . " themes actifs. ركّز على اللي عندهم أقل أسئلة.";
    }

    if (str_contains($msg, 'نركّز') || str_contains($msg, 'focus')) {
        $reply = "أنصحك تبدأ بـ theme priority عالية وعدد أسئلة قليل 💡";
    }

    if (str_contains($msg, 'مهمل')) {
        $reply = "الـ themes inactive محتاجة مراجعة أو حذف ✍️";
    }

    return new JsonResponse([
        'reply' => $reply
    ]);
}
}
