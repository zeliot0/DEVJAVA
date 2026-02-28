<?php

namespace App\EventSubscriber;

use App\Entity\Goal;
use App\Entity\Risk;
use App\Service\AISuccessAnalyzer;
use App\Service\AIRiskAnalyzer;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;

class AIEntitySubscriber implements EventSubscriber
{
    private AISuccessAnalyzer $successAnalyzer;
    private AIRiskAnalyzer $riskAnalyzer;

    public function __construct(AISuccessAnalyzer $successAnalyzer, AIRiskAnalyzer $riskAnalyzer)
    {
        $this->successAnalyzer = $successAnalyzer;
        $this->riskAnalyzer = $riskAnalyzer;
    }

    public function getSubscribedEvents()
    {
        return ['postPersist', 'postUpdate'];
    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $this->handle($args);
    }

    public function postUpdate(LifecycleEventArgs $args): void
    {
        $this->handle($args);
    }

    private function handle(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        $em = $args->getObjectManager();

        if ($entity instanceof Goal) {
            $res = $this->successAnalyzer->analyze($entity);
            $entity->setAiSuccessScore($res['successScore'] ?? null);
            $entity->setAiSuccessAdvice($res['advice'] ?? null);
            $em->persist($entity);
            $em->flush();
        }

        if ($entity instanceof Risk) {
            $res = $this->riskAnalyzer->analyze($entity);
            $entity->setAiRiskScore($res['riskScore'] ?? null);
            $entity->setAiCategory($res['category'] ?? $entity->getAiCategory());
            $entity->setAiMitigationPlan($res['mitigation'] ?? null);
            $em->persist($entity);
            $em->flush();
        }
    }
}
