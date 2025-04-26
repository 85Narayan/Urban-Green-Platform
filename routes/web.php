<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GardenMemberController;
use App\Http\Controllers\EventController;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact page
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Garden routes
    Route::resource('gardens', GardenController::class);
    
    // Resource routes
    Route::resource('gardens.resources', ResourceController::class)->shallow();

    // Garden Member Management
    Route::post('/gardens/{garden}/members/join', [GardenMemberController::class, 'join'])->name('gardens.members.join');
    Route::delete('/gardens/{garden}/members/{user}', [GardenMemberController::class, 'remove'])->name('gardens.members.remove');

    // Event routes
    Route::get('/gardens/{garden}/events/create', [EventController::class, 'create'])->name('gardens.events.create');
    Route::post('/gardens/{garden}/events', [EventController::class, 'store'])->name('gardens.events.store');
    Route::post('/events/{event}/join', [EventController::class, 'join'])->name('events.join');
    Route::post('/events/{event}/unjoin', [EventController::class, 'unjoin'])->name('events.unjoin');

    Route::resource('blogs', \App\Http\Controllers\BlogController::class);

});

require __DIR__.'/auth.php';
