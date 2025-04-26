<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Garden - UrbanGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .form-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .form-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .input-field {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }
        .input-field:focus {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }
        .input-field.error {
            border-color: #ef4444;
        }
        .btn-primary {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(5, 150, 105, 0.2);
        }
        .btn-secondary {
            background: #f3f4f6;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: #e5e7eb;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Create New Garden</h1>
                <p class="text-gray-600">Start your urban gardening journey</p>
            </div>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Back to Dashboard</span>
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                <h3 class="font-bold mb-2">Please fix the following errors:</h3>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-2xl mx-auto">
            <div class="form-card p-6">
                <form action="{{ route('gardens.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data" id="gardenForm">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Garden Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('name') error @enderror" 
                                placeholder="Enter garden name" required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Garden Image</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex-1">
                                    <input type="file" name="image" id="image" accept="image/*"
                                        class="hidden" onchange="updateImagePreview(this)">
                                    <label for="image" class="input-field w-full px-4 py-2 rounded-lg cursor-pointer flex items-center justify-center space-x-2 hover:bg-gray-50 @error('image') error @enderror">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-gray-600">Choose an image</span>
                                    </label>
                                </div>
                                <div id="imagePreview" class="hidden w-20 h-20 rounded-lg bg-gray-100 flex items-center justify-center overflow-hidden">
                                    <img src="" alt="Preview" class="w-full h-full object-cover">
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                            <input type="text" name="address" value="{{ old('address') }}" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('address') error @enderror" 
                                placeholder="Enter street address" required>
                            @error('address')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                            <input type="text" name="city" value="{{ old('city') }}" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('city') error @enderror" 
                                placeholder="Enter city" required>
                            @error('city')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                            <input type="text" name="state" value="{{ old('state') }}" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('state') error @enderror" 
                                placeholder="Enter state" required>
                            @error('state')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="4" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('description') error @enderror" 
                                placeholder="Describe your garden (plants, features, etc.)" required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Size (in square meters)</label>
                            <input type="number" name="size" value="{{ old('size') }}" min="1" step="0.01" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('size') error @enderror" 
                                placeholder="Enter garden size" required>
                            @error('size')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Garden Type</label>
                            <select name="type" 
                                class="input-field w-full px-4 py-2 rounded-lg focus:outline-none @error('type') error @enderror" 
                                required>
                                <option value="">Select garden type</option>
                                <option value="vegetable" {{ old('type') == 'vegetable' ? 'selected' : '' }}>Vegetable Garden</option>
                                <option value="flower" {{ old('type') == 'flower' ? 'selected' : '' }}>Flower Garden</option>
                                <option value="herb" {{ old('type') == 'herb' ? 'selected' : '' }}>Herb Garden</option>
                                <option value="mixed" {{ old('type') == 'mixed' ? 'selected' : '' }}>Mixed Garden</option>
                                <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('type')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-6">
                        <a href="{{ route('dashboard') }}" class="btn-secondary px-6 py-2 text-gray-700 rounded-lg">
                            Cancel
                        </a>
                        <button type="submit" class="btn-primary px-6 py-2 text-white rounded-lg">
                            Create Garden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateImagePreview(input) {
            const preview = document.getElementById('imagePreview');
            const previewImg = preview.querySelector('img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                previewImg.src = '';
                preview.classList.add('hidden');
            }
        }

        // Log form submission
        document.getElementById('gardenForm').addEventListener('submit', function() {
            console.log('Form submitted');
            const formData = new FormData(this);
            for (let [key, value] of formData.entries()) {
                console.log(key, value);
            }
        });
    </script>
</body>
</html> 