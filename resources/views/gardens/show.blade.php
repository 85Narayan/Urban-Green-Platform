<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $garden->name }} - UrbanGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .garden-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .garden-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Garden Header -->
        <div class="relative rounded-xl overflow-hidden h-64 mb-8">
            <img src="{{ $garden->image ? asset('storage/' . $garden->image) : 'https://source.unsplash.com/random/1200x400/?garden' }}" 
                 alt="{{ $garden->name }}" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
                <h1 class="text-4xl font-bold text-white mb-2">{{ $garden->name }}</h1>
                <p class="text-white text-opacity-90">{{ $garden->description }}</p>
            </div>
        </div>

        <!-- Garden Details -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Left Column - Details -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Garden Details</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="text-gray-800">{{ $garden->address }}, {{ $garden->city }}, {{ $garden->state }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Size</p>
                            <p class="text-gray-800">{{ $garden->size }} sq ft</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Type</p>
                            <p class="text-gray-800">{{ ucfirst($garden->type) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-gray-800">{{ ucfirst($garden->status) }}</p>
                        </div>
                    </div>
                </div>

                @if(Auth::id() === $garden->created_by)
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Manage Garden</h2>
                        <div class="space-x-2">
                            <a href="{{ route('gardens.edit', $garden) }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit Garden
                            </a>
                            <form action="{{ route('gardens.destroy', $garden) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this garden?')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete Garden
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column - Members -->
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Members</h2>
                    <div class="space-y-4">
                        @foreach($garden->members as $member)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $member->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ ucfirst($member->role) }}</p>
                                </div>
                            </div>
                            @if(Auth::id() === $garden->created_by && $member->user_id !== Auth::id())
                            <form action="{{ route('gardens.members.remove', [$garden, $member->user_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    Remove
                                </button>
                            </form>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    @if(!$garden->isMember(Auth::user()))
                    <form action="{{ route('gardens.members.join', $garden) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Join Community
                        </button>
                    </form>
                    @endif
                </div>

                <!-- Events Section -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Events</h2>
                        @if(Auth::id() === $garden->created_by)
                        <a href="{{ route('gardens.events.create', $garden) }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Event
                        </a>
                        @endif
                    </div>
                    @if($garden->events->isEmpty())
                        <p class="text-gray-500">No events available.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($garden->events as $event)
                            <div class="border rounded p-4 flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $event->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $event->description }}</p>
                                    <p class="text-sm text-gray-500">Date: {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y H:i') }}</p>
                                    @if($event->end_date)
                                    <p class="text-sm text-gray-500">End: {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y H:i') }}</p>
                                    @endif
                                </div>
                                <div>
                                    @php
                                        $joined = $event->members ? $event->members->contains('user_id', Auth::id()) : false;
                                    @endphp
                                    @if($joined)
                                    <form action="{{ route('events.unjoin', $event) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Leave</button>
                                    </form>
                                    @else
                                    <form action="{{ route('events.join', $event) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Join</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html> 