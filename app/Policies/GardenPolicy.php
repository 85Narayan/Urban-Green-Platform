<?php

namespace App\Policies;

use App\Models\Garden;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GardenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true; // Anyone can view public gardens
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Garden $garden): bool
    {
        // Anyone can view public gardens
        if ($garden->is_public) {
            return true;
        }

        // Only members can view private gardens
        return $user && $garden->hasMember($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Any authenticated user can create a garden
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Garden $garden): bool
    {
        // Only admins and the creator can update the garden
        return $user->id === $garden->creator_id || 
               $garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Garden $garden): bool
    {
        // Only the creator can delete the garden
        return $user->id === $garden->creator_id;
    }

    /**
     * Determine whether the user can join the garden.
     */
    public function join(User $user, Garden $garden): bool
    {
        // Can't join if already a member
        if ($garden->hasMember($user)) {
            return false;
        }

        // Can't join if garden is full
        if ($garden->isFull()) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can leave the garden.
     */
    public function leave(User $user, Garden $garden): bool
    {
        // Can't leave if not a member
        if (!$garden->hasMember($user)) {
            return false;
        }

        // Creator can't leave (must delete garden instead)
        if ($user->id === $garden->creator_id) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can manage members.
     */
    public function manageMembers(User $user, Garden $garden): bool
    {
        // Only admins and the creator can manage members
        return $user->id === $garden->creator_id || 
               $garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can create posts.
     */
    public function createPost(User $user, Garden $garden): bool
    {
        // Only members can create posts
        return $garden->hasMember($user);
    }

    /**
     * Determine whether the user can create events.
     */
    public function createEvent(User $user, Garden $garden): bool
    {
        // Only admins and the creator can create events
        return $user->id === $garden->creator_id || 
               $garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can manage resources.
     */
    public function manageResources(User $user, Garden $garden): bool
    {
        // Only admins and the creator can manage resources
        return $user->id === $garden->creator_id || 
               $garden->getMemberRole($user) === 'admin';
    }
} 