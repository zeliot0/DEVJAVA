<?php

namespace App\Security\Voter;

use App\Entity\PhoenixGoal;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PhoenixGoalVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, [self::VIEW, self::EDIT, self::DELETE])
            && $subject instanceof PhoenixGoal;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        
        if (!$user instanceof User) {
            return false;
        }

        /** @var PhoenixGoal $phoenixGoal */
        $phoenixGoal = $subject;

        return match($attribute) {
            self::VIEW => $this->canView($phoenixGoal, $user),
            self::EDIT => $this->canEdit($phoenixGoal, $user),
            self::DELETE => $this->canDelete($phoenixGoal, $user),
            default => false,
        };
    }

    private function canView(PhoenixGoal $phoenixGoal, User $user): bool
    {
        // Users can view their own phoenix goals
        if ($phoenixGoal->getOriginalGoal()->getUser() === $user) {
            return true;
        }
        
        // Admin can view all
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return true;
        }
        
        return false;
    }

    private function canEdit(PhoenixGoal $phoenixGoal, User $user): bool
    {
        // Only the owner can edit
        return $phoenixGoal->getOriginalGoal()->getUser() === $user;
    }

    private function canDelete(PhoenixGoal $phoenixGoal, User $user): bool
    {
        // Only admin can delete phoenix records
        return in_array('ROLE_ADMIN', $user->getRoles());
    }
}