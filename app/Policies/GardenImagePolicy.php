<?php

namespace App\Policies;

use App\Models\GardenImage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GardenImagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user, GardenImage $image): bool
    {
        // Anyone can view images of public gardens
        if ($image->garden->is_public) {
            return true;
        }

        // Only members can view images of private gardens
        return $user && $image->garden->hasMember($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, GardenImage $image): bool
    {
        // Anyone can view images of public gardens
        if ($image->garden->is_public) {
            return true;
        }

        // Only members can view images of private gardens
        return $user && $image->garden->hasMember($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, GardenImage $image): bool
    {
        // Only members can upload images
        return $image->garden->hasMember($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GardenImage $image): bool
    {
        // Only the image owner, garden creator, or admins can update
        return $user->id === $image->user_id || 
               $user->id === $image->garden->creator_id || 
               $image->garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GardenImage $image): bool
    {
        // Only the image owner, garden creator, or admins can delete
        return $user->id === $image->user_id || 
               $user->id === $image->garden->creator_id || 
               $image->garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can like the image.
     */
    public function like(User $user, GardenImage $image): bool
    {
        // Can't like own image
        if ($user->id === $image->user_id) {
            return false;
        }

        // Must be a member of the garden to like images
        return $image->garden->hasMember($user);
    }

    /**
     * Determine whether the user can unlike the image.
     */
    public function unlike(User $user, GardenImage $image): bool
    {
        // Must have liked the image to unlike it
        return $image->isLikedBy($user);
    }

    /**
     * Determine whether the user can set the image as featured.
     */
    public function setFeatured(User $user, GardenImage $image): bool
    {
        // Only garden creator or admins can set featured images
        return $user->id === $image->garden->creator_id || 
               $image->garden->getMemberRole($user) === 'admin';
    }
} 