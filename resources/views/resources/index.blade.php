@extends('layouts.app')

@section('title', 'Resources - UrbanGreen')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Resources for {{ $garden->name }}</h1>
        <a href="{{ route('gardens.resources.create', $garden) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Add New Resource
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($resources as $resource)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $resource->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ ucfirst($resource->type) }}</p>
                        </div>
                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-800">
                            Qty: {{ $resource->quantity }}
                        </span>
                    </div>
                    
                    <p class="mt-4 text-gray-600">{{ $resource->description }}</p>
                    
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('gardens.resources.edit', [$garden, $resource]) }}" class="text-sm text-green-600 hover:text-green-800">Edit</a>
                        <form action="{{ route('gardens.resources.destroy', [$garden, $resource]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this resource?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500">No resources added yet.</p>
                <a href="{{ route('gardens.resources.create', $garden) }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Add Your First Resource
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection 