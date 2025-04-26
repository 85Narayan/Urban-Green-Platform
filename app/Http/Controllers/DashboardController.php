<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $gardens = Garden::where('created_by', $user->id)->get();

        // Load upcoming events related to user's gardens
        $events = \App\Models\Event::whereIn('garden_id', $gardens->pluck('id'))
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->with('members')
            ->get();

        // Create a proper activity object
        $recentActivities = collect([
            (object)[
                'title' => 'Welcome to UrbanGreen',
                'description' => 'You have successfully joined our community!',
                'created_at' => Carbon::now(),
            ],
        ]);

        // Load recent resources for user's gardens
        $resources = \App\Models\Resource::whereIn('garden_id', $gardens->pluck('id'))
            ->latest()
            ->take(5)
            ->get();

        // Load recent blogs as gardening resources
        $blogs = \App\Models\Blog::latest()->take(5)->get();

        return view('dashboard', [
            'gardens' => $gardens,
            'recentActivities' => $recentActivities,
            'events' => $events,
            'resources' => $resources,
            'blogs' => $blogs,
        ]);
    }
} 