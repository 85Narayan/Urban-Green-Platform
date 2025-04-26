<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;
use App\Models\Garden;
use Illuminate\Auth\Access\Response;

class ResourcePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Resource $resource): bool
    {
        return $resource->garden->members()->where('user_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Garden $garden): bool
    {
        return $garden->members()
            ->where('user_id', $user->id)
            ->whereIn('role', ['admin', 'member'])
            ->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Resource $resource): bool
    {
        return $resource->garden->members()
            ->where('user_id', $user->id)
            ->whereIn('role', ['admin', 'member'])
            ->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Resource $resource): bool
    {
        return $resource->garden->members()
            ->where('user_id', $user->id)
            ->whereIn('role', ['admin', 'member'])
            ->exists();
    }

    /**
     * Determine whether the user can save the resource.
     */
    public function save(User $user, Resource $resource): bool
    {
        return $resource->garden->members()->where('user_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can unsave the resource.
     */
    public function unsave(User $user, Resource $resource): bool
    {
        return $resource->garden->members()->where('user_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can manage resource availability.
     */
    public function manageAvailability(User $user, Resource $resource): bool
    {
        return $resource->garden->members()
            ->where('user_id', $user->id)
            ->whereIn('role', ['admin', 'member'])
            ->exists();
    }
} 