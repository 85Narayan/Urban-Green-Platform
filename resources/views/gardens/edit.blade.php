<!DOCTYPE html>
<html lang="en" class="scroll-smooth" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit {{ $garden->name }} - UrbanGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Section -->
        <div class="mb-12">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-green-500 mb-2">Edit Garden</h1>
                    <p class="text-gray-600 text-lg">Update your garden details below</p>
                </div>
                <a href="{{ route('gardens.show', $garden) }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors duration-300  ">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Garden
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-xl flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-xl shadow-sm">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="font-medium">Please fix the following errors:</h3>
                    </div>
                    <ul class="list-disc list-inside mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Form -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <form action="{{ route('gardens.update', $garden) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Garden Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Garden Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $garden->name) }}"
                                       class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300" placeholder="Enter garden name">
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description" id="description" rows="4"
                                          class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300"
                                          placeholder="Describe your garden">{{ old('description', $garden->description) }}</textarea>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $garden->address) }}"
                                       class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300" placeholder="Enter garden address">
                            </div>

                            <!-- Location -->
                            <div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                        <input type="text" name="city" id="city" value="{{ old('city', $garden->city) }}"
                                               class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300" placeholder="City">
                                    </div>
                                    <div>
                                        <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State</label>
                                        <input type="text" name="state" id="state" value="{{ old('state', $garden->state) }}"
                                               class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300" placeholder="State">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Size -->
                            <div>
                                <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Size (sq ft)</label>
                                <input type="number" name="size" id="size" step="0.01" value="{{ old('size', $garden->size) }}"
                                       class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300" placeholder="Enter garden size">
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                <select name="type" id="type"
                                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300">
                                    <option value="vegetable" {{ old('type', $garden->type) === 'vegetable' ? 'selected' : '' }}>Vegetable Garden</option>
                                    <option value="flower" {{ old('type', $garden->type) === 'flower' ? 'selected' : '' }}>Flower Garden</option>
                                    <option value="herb" {{ old('type', $garden->type) === 'herb' ? 'selected' : '' }}>Herb Garden</option>
                                    <option value="mixed" {{ old('type', $garden->type) === 'mixed' ? 'selected' : '' }}>Mixed Garden</option>
                                    <option value="other" {{ old('type', $garden->type) === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select name="status" id="status"
                                        class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 p-3 bg-white transition-all duration-300">
                                    <option value="active" {{ old('status', $garden->status) === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $garden->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Garden Image</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-2 file:border-gray-200 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition-all duration-300">
                                @if($garden->image)
                                    <div class="mt-4">
                                        <p class="text-sm text-gray-500 mb-2">Current Image:</p>
                                        <img src="{{ asset('storage/' . $garden->image) }}"
                                             alt="Current garden image"
                                             class="h-40 w-auto rounded-xl object-cover shadow-lg hover:shadow-xl transition-all duration-300">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-12 flex justify-end space-x-4">
                        <a href="{{ route('gardens.show', $garden) }}" class="px-6 py-3 bg-white text-gray-700 border-2 border-gray-200 rounded-xl hover:bg-gray-50 transition-all duration-300 font-medium shadow hover:shadow-md">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Update Garden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
