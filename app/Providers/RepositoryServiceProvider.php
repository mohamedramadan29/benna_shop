<?php

namespace App\Providers;

use App\interface\Doctors\DoctorRepoInterface;
use App\interface\Insurance\InsuranceRepoInterface;
use App\interface\Sections\SectionRepoInterface;
use App\interface\Services\ServiceRepInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Insurance\InsuranceRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Services\ServicesRepository;
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
        $this->app->bind(ServiceRepInterface::class, ServicesRepository::class);
        $this->app->bind(InsuranceRepoInterface::class, InsuranceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
