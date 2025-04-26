<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user, Event $event): bool
    {
        // Anyone can view public events
        if ($event->is_public) {
            return true;
        }

        // Only garden members can view private events
        return $user && $event->garden->hasMember($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Event $event): bool
    {
        // Anyone can view public events
        if ($event->is_public) {
            return true;
        }

        // Only garden members can view private events
        return $user && $event->garden->hasMember($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Event $event): bool
    {
        // Only garden members can create events
        return $event->garden->hasMember($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Event $event): bool
    {
        // Only the event creator, garden creator, or garden admins can update
        return $user->id === $event->user_id || 
               $user->id === $event->garden->creator_id || 
               $event->garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Event $event): bool
    {
        // Only the event creator, garden creator, or garden admins can delete
        return $user->id === $event->user_id || 
               $user->id === $event->garden->creator_id || 
               $event->garden->getMemberRole($user) === 'admin';
    }

    /**
     * Determine whether the user can attend the event.
     */
    public function attend(User $user, Event $event): bool
    {
        // Can't attend if already attending
        if ($event->isAttending($user)) {
            return false;
        }

        // Can't attend if event is full
        if ($event->is_full) {
            return false;
        }

        // Must be a member of the garden to attend
        return $event->garden->hasMember($user);
    }

    /**
     * Determine whether the user can change their attendance status.
     */
    public function changeAttendance(User $user, Event $event): bool
    {
        // Must be a member of the garden to change attendance
        return $event->garden->hasMember($user);
    }

    /**
     * Determine whether the user can manage attendees.
     */
    public function manageAttendees(User $user, Event $event): bool
    {
        // Only the event creator, garden creator, or garden admins can manage attendees
        return $user->id === $event->user_id || 
               $user->id === $event->garden->creator_id || 
               $event->garden->getMemberRole($user) === 'admin';
    }
} 