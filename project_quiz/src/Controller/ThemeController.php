<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Form\ThemeType;
use App\Repository\ThemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/theme')]
class ThemeController extends AbstractController
{
    /**
     * LISTE DES THEMES
     */
  #[Route('/', name: 'app_theme_index')]
public function index(
    Request $request,
    ThemeRepository $themeRepository
): Response {
    $search = $request->query->get('q');

    // 🔎 Search
    if ($search) {
        $themes = $themeRepository->searchByName($search);
    } else {
        $themes = $themeRepository->findAll();
    }

    // 🔥 PROGRESS / COMPLETION
    foreach ($themes as $theme) {
        $questions = $theme->getQuestions();
        $total = count($questions);

        $completed = 0;
        foreach ($questions as $question) {
            // ⚠️ بدّل isCompleted() إذا اسمها مختلف
            if (method_exists($question, 'isCompleted') && $question->isCompleted()) {
                $completed++;
            }
        }

        $progress = $total > 0 ? round(($completed / $total) * 100) : 0;

        // نضيفهم للـ Twig (dynamic properties)
        $theme->totalQuestions = $total;
        $theme->completedQuestions = $completed;
        $theme->progress = $progress;
    }

    // ⚡ AJAX response
    if ($request->isXmlHttpRequest()) {
        return $this->render('admin/theme/_themes_list.html.twig', [
            'themes' => $themes,
        ]);
    }

    // 🖥️ Normal page
    return $this->render('admin/theme/index.html.twig', [
        'themes' => $themes,
        'search' => $search,
    ]);
}




    /**
     * CREATION D'UN THEME
     */
   #[Route('/new', name: 'app_theme_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    // 1️⃣ إنشاء theme مرة وحدة
    $theme = new Theme();
    $theme->setActif(true); // valeur par défaut

    // 2️⃣ إنشاء الفورم مرة وحدة
    $form = $this->createForm(ThemeType::class, $theme);
    $form->handleRequest($request);

    // 3️⃣ حفظ إذا الفورم صحيح
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($theme);
        $entityManager->flush();

        $this->addFlash('success', 'Thème créé avec succès');

        return $this->redirectToRoute('app_theme_index');
    }

    // 4️⃣ عرض الصفحة
    return $this->render('admin/theme/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

    /**
     * AFFICHER UN THEME
     */
    #[Route('/{id}/show', name: 'app_theme_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Theme $theme): Response
    {
        return $this->render('admin/theme/form.html.twig', [
            'theme' => $theme,
        ]);
    }

    /**
     * MODIFIER UN THEME
     */
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

        return $this->render('admin/theme/edit.html.twig', [
            'form' => $form->createView(),
            'theme' => $theme,
        ]);
    }

    /**
     * SUPPRIMER UN THEME
     */
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
public function userThemes(ThemeRepository $repo): Response
{
    return $this->render('user/theme/index.html.twig', [
        'themes' => $repo->findBy(['actif' => true]),
    ]);
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