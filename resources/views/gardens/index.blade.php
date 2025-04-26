@extends('layouts.app')

@section('title', 'Community Plots - UrbanGreen')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Community Plots</h1>
        <a href="{{ route('gardens.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
            Create New Community Plot
        </a>
    </div>

    @if($gardens->isEmpty())
        <p class="text-gray-600">No community plots found. Create your first community plot!</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($gardens as $garden)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $garden->name }}</h2>
                    <p class="text-gray-700 mb-4">{{ $garden->description }}</p>
                    <a href="{{ route('gardens.show', $garden) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
