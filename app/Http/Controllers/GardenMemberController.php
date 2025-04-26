<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GardenMemberController extends Controller
{
    /**
     * Join a garden/community plot.
     */
    public function join(Request $request, Garden $garden)
    {
        $user = Auth::user();

        // Check if user is already a member
        if ($garden->members()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('status', 'You are already a member of this community plot.');
        }

        // Add user as member using addMember method
        $garden->addMember($user);

        return redirect()->back()->with('status', 'Successfully joined the community plot.');
    }

    /**
     * Remove a member from a garden/community plot.
     */
    public function remove(Garden $garden, $userId)
    {
        $user = Auth::user();

        // Authorization check can be added here

        $garden->removeMember($user);

        return redirect()->back()->with('status', 'Member removed successfully.');
    }
}
