<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use App\Models\Garden;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Comment $comment): bool
    {
        return true;
    }

    public function create(User $user, Garden $garden): bool
    {
        return $garden->members()->where('user_id', $user->id)->exists();
    }

    public function update(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id || 
               $comment->garden->owner_id === $user->id;
    }

    public function delete(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id || 
               $comment->garden->owner_id === $user->id;
    }
} 