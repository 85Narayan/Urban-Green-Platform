<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanGreen Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .stat-card {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
        }
        .garden-card {
            background-size: cover;
            background-position: center;
            position: relative;
            min-height: 300px;
        }
        .garden-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.7));
            border-radius: 1rem;
        }
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background-color: #e5e7eb;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #059669 0%, #047857 100%);
            border-radius: 4px;
        }
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 0.5rem;
            min-width: 200px;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 50;
        }
        .profile-dropdown.show {
            display: block;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Main Content -->
    <div class="p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Welcome back, <span class="text-green-600">{{ Auth::user()->name }}</span>!</h1>
                <p class="text-gray-600">Here's what's happening with your gardens today.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <div class="relative">
                    <button onclick="toggleProfileDropdown()" class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="profileDropdown" class="profile-dropdown">
                        <div class="p-4 border-b border-gray-100">
                            <div>
                                <p class="font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="py-1">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>View Profile</span>
                                </div>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Logout</span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="stat-card card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-75">Total Gardens</p>
                        <h3 class="text-2xl font-bold">5</h3>
                        <p class="text-sm opacity-75 mt-1">+2 this month</p>
                    </div>
                    <div class="p-3 bg-white bg-opacity-20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="stat-card card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-75">Active Members</p>
                        <h3 class="text-2xl font-bold">24</h3>
                        <p class="text-sm opacity-75 mt-1">+5 this week</p>
                    </div>
                    <div class="p-3 bg-white bg-opacity-20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="stat-card card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-75">Upcoming Events</p>
                        <h3 class="text-2xl font-bold">3</h3>
                        <p class="text-sm opacity-75 mt-1">Next: Tomorrow</p>
                    </div>
                    <div class="p-3 bg-white bg-opacity-20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gardens Grid -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">My Community Plots</h2>
                <a href="{{ route('gardens.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    Create New Community Plot
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($gardens as $garden)
                <div class="garden-card card p-6 text-white relative group" style="background-image: url('{{ $garden->image ? asset('storage/' . $garden->image) : 'https://source.unsplash.com/random/800x600/?garden' }}')">
                    <a href="{{ route('gardens.show', $garden) }}" class="absolute inset-0 z-10"></a>
                    <div class="relative z-20 h-full flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $garden->name }}</h3>
                            <p class="text-sm opacity-90 mb-4">{{ $garden->description }}</p>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-white bg-opacity-20 rounded-full text-sm">{{ ucfirst($garden->type) }}</span>
                                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('gardens.show', $garden) }}" class="p-2 bg-blue-600 rounded-full hover:bg-blue-700 z-30" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('gardens.edit', $garden) }}" class="p-2 bg-green-600 rounded-full hover:bg-green-700 z-30" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('gardens.destroy', $garden) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-600 rounded-full hover:bg-red-700 z-30" onclick="return confirm('Are you sure you want to delete this community plot?')" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm">{{ $garden->city }}, {{ $garden->state }}</span>
                                <span class="text-sm">{{ $garden->size }} sq ft</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-600">No community plots found. Create your first community plot!</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events as $event)
                <div class="card p-6">
                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $event->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $event->description }}</p>
                            <p class="text-xs text-gray-500 mt-2">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y H:i') }}</p>
                            @php
                                $joined = $event->members ? $event->members->contains('user_id', Auth::id()) : false;
                            @endphp
                            @if($joined)
                            <form action="{{ route('events.unjoin', $event) }}" method="POST">
                                @csrf
                                <button class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm" type="submit">
                                    Leave Event
                                </button>
                            </form>
                            @else
                            <form action="{{ route('events.join', $event) }}" method="POST">
                                @csrf
                                <button class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm" type="submit">
                                    Join Event
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-600">No upcoming events.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Activity</h2>
            <div class="card p-6">
                <div class="space-y-4">
                    @forelse($recentActivities as $activity)
                    <div class="flex items-start space-x-4">
                        <div class="p-2 bg-green-100 rounded-full">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium">{{ $activity->title ?? 'Activity' }}</p>
                            <p class="text-sm text-gray-600">{{ $activity->description ?? 'No description available' }}</p>
                            <p class="text-xs text-gray-500">{{ $activity->created_at ? $activity->created_at->diffForHumans() : 'Just now' }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-600">No recent activity</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Community Stats -->
        <div class="mb-8">
            <div class="mt-8 mb-6 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Gardening Resources</h2>
                <a href="{{ route('blogs.create') }}" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    Add New Resource
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @forelse($blogs as $blog)
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-2">{{ $blog->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm">
                        Read More
                    </a>
                </div>
                @empty
                <p class="text-gray-600">No gardening resources found.</p>
                @endforelse
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Community Stats</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-4">Top Gardeners</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://source.unsplash.com/random/40x40/?portrait" alt="Profile" class="w-10 h-10 rounded-full">
                            <div class="flex-1">
                                <p class="font-medium">Sarah Johnson</p>
                                <p class="text-sm text-gray-600">5 gardens, 12 events</p>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Top Gardener</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <img src="https://source.unsplash.com/random/40x40/?portrait" alt="Profile" class="w-10 h-10 rounded-full">
                            <div class="flex-1">
                                <p class="font-medium">Mike Chen</p>
                                <p class="text-sm text-gray-600">3 gardens, 8 events</p>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                        </div>
                    </div>
                </div>
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-4">Community Growth</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">New Members</span>
                                <span class="text-sm font-medium">+15%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-bar-fill" style="width: 15%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">New Gardens</span>
                                <span class="text-sm font-medium">+8%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-bar-fill" style="width: 8%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Event Participation</span>
                                <span class="text-sm font-medium">+25%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-bar-fill" style="width: 25%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            const profileButton = document.querySelector('.relative button');
            
            if (!profileButton.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>
