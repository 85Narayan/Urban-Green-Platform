<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Garden;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Post $post): bool
    {
        return true;
    }

    public function create(User $user, Garden $garden): bool
    {
        return $garden->members()->where('user_id', $user->id)->exists();
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id || 
               $post->garden->owner_id === $user->id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id || 
               $post->garden->owner_id === $user->id;
    }
} 