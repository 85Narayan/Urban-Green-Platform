<?php

namespace App\Providers;

use App\Models\Garden;
use App\Models\GardenImage;
use App\Models\Event;
use App\Policies\GardenPolicy;
use App\Policies\GardenImagePolicy;
use App\Policies\EventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Garden::class => GardenPolicy::class,
        GardenImage::class => GardenImagePolicy::class,
        Event::class => EventPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
} 