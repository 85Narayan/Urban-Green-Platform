<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Profile Header -->
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-2xl font-semibold">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <p class="text-sm text-gray-500">{{ $user->location }}</p>
                        </div>
                    </div>

                    <!-- Profile Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Profile Information Form -->
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h2>
                                <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
                                    @csrf
                                    @method('patch')

                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                    </div>

                                    <div>
                                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                        <input type="text" name="location" id="location" value="{{ old('location', $user->location) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                        <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                    </div>

                                    <div>
                                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                        <textarea name="bio" id="bio" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">{{ old('bio', $user->bio) }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark focus:bg-primary-dark active:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150">
                                            Save Profile
                                        </button>

                                        @if (session('status') === 'profile-updated')
                                            <p class="text-sm text-green-600">Profile updated successfully.</p>
                                        @endif
                                    </div>
                                </form>
                            </div>

                            <!-- Password Update Form -->
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">Update Password</h2>
                                <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                                    @csrf
                                    @method('put')

                                    <div>
                                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                        <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                                    </div>

                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                                        <input type="password" name="password" id="password"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                                        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark focus:bg-primary-dark active:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150">
                                            Update Password
                                        </button>

                                        @if (session('status') === 'password-updated')
                                            <p class="text-sm text-green-600">Password updated successfully.</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- User Stats -->
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">Your Stats</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-sm text-gray-500">Experience Level</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ ucfirst($user->experience_level) }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-sm text-gray-500">Member Since</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ $user->created_at->format('M Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Skills -->
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">Your Skills</h2>
                                <div class="flex flex-wrap gap-2">
                                    @if($user->skills)
                                        @foreach(explode(',', $user->skills) as $skill)
                                            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">
                                                {{ trim($skill) }}
                                            </span>
                                        @endforeach
                                    @else
                                        <p class="text-gray-500">No skills added yet</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Delete Account -->
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900 mb-4">Delete Account</h2>
                                <p class="text-sm text-gray-600 mb-4">
                                    Once your account is deleted, all of its resources and data will be permanently deleted.
                                </p>
                                <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Delete Account
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
