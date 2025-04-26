<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Garden;
use App\Models\EventMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create(Garden $garden)
    {
        return view('events.create', compact('garden'));
    }

    public function store(Request $request, Garden $garden)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:event_date',
        ]);

        $event = new Event($validated);
        $event->garden_id = $garden->id;
        $event->save();

        return redirect()->route('gardens.show', $garden)->with('success', 'Event created successfully!');
    }

    public function join(Event $event)
    {
        $user = Auth::user();

        if ($event->members()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('status', 'You have already joined this event.');
        }

        $event->members()->create([
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('status', 'Successfully joined the event.');
    }

    public function unjoin(Event $event)
    {
        $user = Auth::user();

        $event->members()->where('user_id', $user->id)->delete();

        return redirect()->back()->with('status', 'You have left the event.');
    }
}
