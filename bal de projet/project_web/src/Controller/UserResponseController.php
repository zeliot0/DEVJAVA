<?php

namespace App\Controller;

use App\Entity\Theme;
use App\Entity\UserResponse;
use App\Entity\Question;
use App\Form\UserResponseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

class UserResponseController extends AbstractController
{
   
    #[Route('/question/{id}/answer', name: 'app_user_answer')]
    public function answer(
        Question $question,
        Request $request,
        EntityManagerInterface $em
    ): Response {

        $today = new \DateTime('today');

        $existing = $em->getRepository(UserResponse::class)->findOneBy([
            'question' => $question,
            'date' => $today,
        ]);

        if ($existing) {
            $this->addFlash('warning', 'Vous avez déjà répondu aujourd’hui.');
            return $this->redirectToRoute('app_theme_answer', [
                'id' => $question->getTheme()->getIdT(),
            ]);
        }

        $response = new UserResponse();
        $response->setQuestion($question);
        $response->setDate(new \DateTime());
        $response->setCreatedAt(new \DateTimeImmutable());

        $form = $this->createForm(UserResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($response);
            $em->flush();

            return $this->redirectToRoute('app_theme_rapport', [
                'id' => $question->getTheme()->getIdT(),
            ]);
        }

        return $this->render('user_response/answer.html.twig', [
            'form' => $form->createView(),
            'question' => $question,
        ]);
    }

    
    #[Route('/theme/{id}/answer', name: 'app_theme_answer', methods: ['GET', 'POST'])]
public function answerByTheme(
    Theme $theme,
    Request $request,
    EntityManagerInterface $em
): Response {

    $today = new \DateTime('today');


    if ($request->isMethod('POST')) {

        foreach ($theme->getQuestions() as $question) {

            $value = $request->request->get('q' . $question->getId());

            if ($value === null || $value === '') {
                continue;
            }

            $existing = $em->getRepository(UserResponse::class)->findOneBy([
                'question' => $question,
                'date' => $today,
            ]);

            if ($existing) {
                continue;
            }

            $response = new UserResponse();
            $response->setQuestion($question);
            $response->setValeur((string) $value);
            $response->setDate(new \DateTime());
            $response->setCreatedAt(new \DateTimeImmutable());

            $em->persist($response);
        }

        $em->flush();

        return $this->redirectToRoute('app_theme_rapport', [
            'id' => $theme->getIdT(),
        ]);
    }

  
    
    $responsesToday = $em->getRepository(UserResponse::class)
        ->createQueryBuilder('r')
        ->join('r.question', 'q')
        ->where('q.theme = :theme')
        ->andWhere('r.date = :today')
        ->setParameter('theme', $theme)
        ->setParameter('today', $today)
        ->getQuery()
        ->getResult();

    
    $answers = [];
    foreach ($responsesToday as $r) {
        $answers[$r->getQuestion()->getId()] = $r;
    }

    return $this->render('question/user/question/answer_by_theme.html.twig', [
        'theme' => $theme,
        'questions' => $theme->getQuestions(),
        'answers' => $answers, // 🔥 الجديد
    ]);
}

   
    #[Route('/theme/{id}/rapport', name: 'app_theme_rapport')]
    public function themeRapport(
        Theme $theme,
        EntityManagerInterface $em
    ): Response {

        $responses = $em->getRepository(UserResponse::class)
            ->createQueryBuilder('r')
            ->join('r.question', 'q')
            ->where('q.theme = :theme')
            ->setParameter('theme', $theme)
            ->orderBy('r.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        $details = [];

        foreach ($responses as $r) {

            $q = $r->getQuestion();
            $value = $r->getValeur();
            $ideal = $q->getValeurIdeale();

            
            $ok = null;
            $advice = 'Merci pour ton partage 💬';

            
            if ($q->getTypeReponse() === 'number' && $ideal !== null) {
                $ok = (float) $value >= (float) $ideal;
                $advice = $ok
                    ? 'Objectif atteint ✅'
                    : 'Essaie de te rapprocher de l’objectif ⚠️';
            }

            
            if ($q->getTypeReponse() === 'boolean') {
                $ok = $value === '1';
                $advice = $ok
                    ? 'Bonne habitude 👍'
                    : 'Peut avoir un impact négatif ⚠️';
            }

            $details[] = [
                'question' => $q->getTexte(),
                'type' => $q->getTypeReponse(),
                'value' => $value,
                'ideal' => $ideal,
                'unite' => $q->getUnite(),
                'ok' => $ok,          
                'advice' => $advice,
                'date' => $r->getCreatedAt(),
            ];
        }

        return $this->render('user_response/rapport.twig', [
            'theme' => $theme,
            'details' => $details,
        ]);
    }
    
#[Route('/theme/{id}/rapport/pdf', name: 'app_theme_rapport_pdf')]
public function themeRapportPdf(
    Theme $theme,
    EntityManagerInterface $em
): Response {
    if (!class_exists(Dompdf::class) || !class_exists(Options::class)) {
        $this->addFlash('error', 'PDF: dompdf/dompdf n\'est pas installe. Execute: composer require dompdf/dompdf');
        return $this->redirectToRoute('app_theme_rapport', ['id' => $theme->getIdT()]);
    }

   
    $responses = $em->getRepository(UserResponse::class)
        ->createQueryBuilder('r')
        ->join('r.question', 'q')
        ->where('q.theme = :theme')
        ->setParameter('theme', $theme)
        ->orderBy('r.createdAt', 'DESC')
        ->getQuery()
        ->getResult();

    $details = [];

    foreach ($responses as $r) {

        $q = $r->getQuestion();
        $value = $r->getValeur();
        $ideal = $q->getValeurIdeale();

        $ok = null;
        $advice = 'Merci pour ton partage 💬';

        if ($q->getTypeReponse() === 'number' && $ideal !== null) {
            $ok = (float) $value >= (float) $ideal;
            $advice = $ok
                ? 'Objectif atteint ✅'
                : 'Essaie de te rapprocher de l’objectif ⚠️';
        }

        if ($q->getTypeReponse() === 'boolean') {
            $ok = $value === '1';
            $advice = $ok
                ? 'Bonne habitude 👍'
                : 'Peut avoir un impact négatif ⚠️';
        }

        $details[] = [
            'question' => $q->getTexte(),
            'type' => $q->getTypeReponse(),
            'value' => $value,
            'ideal' => $ideal,
            'unite' => $q->getUnite(),
            'ok' => $ok,
            'advice' => $advice,
            'date' => $r->getCreatedAt(),
        ];
    }

   
    $options = new Options();
    $options->set('defaultFont', 'DejaVu Sans');

    $dompdf = new Dompdf($options);

    $html = $this->renderView('user_response/rapport_pdf.html.twig', [
        'theme' => $theme,
        'details' => $details,
    ]);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    
    $pdfContent = $dompdf->output();

    return new Response(
        $pdfContent,
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="rapport-'.$theme->getNom().'.pdf"',
        ]
    );
}


}

