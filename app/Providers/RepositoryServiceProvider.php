<?php

namespace App\Providers;

use App\interface\Amulance\AmulanceRepInterface;
use App\interface\Doctors\DoctorRepoInterface;
use App\interface\Finance\ReciptRepoInterface;
use App\interface\Insurance\InsuranceRepoInterface;
use App\Interface\Patients\PatientRepositoryInterface;
use App\interface\Sections\SectionRepoInterface;
use App\interface\Services\ServiceRepInterface;
use App\Repository\Amulance\AmulanceRepository;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Finance\ReciptRepository;
use App\Repository\Insurance\InsuranceRepository;
use App\Repository\Patients\PatientRepository;
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
        $this->app->bind(AmulanceRepInterface::class, AmulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReciptRepoInterface::class, ReciptRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
