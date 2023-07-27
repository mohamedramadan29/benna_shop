<?php

namespace App\Providers;

use App\interface\Doctors\DoctorRepoInterface;
use App\interface\Sections\SectionRepoInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Sections\SectionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepoInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepoInterface::class, DoctorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
