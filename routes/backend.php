<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServicesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        //////////////////////////////////////  User Dashboard ///////////////////// 
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        /////////////////////////////////////// end User Dashboard ////////////////////

        /////////////////////////////////////// Admin Dashboard
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        // Logout From Admin
        Route::post('logout/admin', [AdminController::class, 'destroy'])->middleware('auth:admin')
            ->name('logout.admin');
        /////////////////////////////////////// end Admin Dashboard ////////////////////// 

        ///////////////////////////////// START SECTIONS/////////////////////////

        Route::middleware(['auth:admin'])->group(function () {
            Route::resource('sections', SectionController::class);
            //////////////////////////////// END SECTIONS /////////////////
            ///////////////////////////////// START Doctors /////////////////////////
            Route::resource('doctors', DoctorController::class);
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');
            //////////////////////////////// END Doctors /////////////////
            //////////////////////////////// START SERVICES  /////////////////
            Route::resource('service',  ServicesController::class);

            ////////////////// START GROUP SERVICES  //////////
            Route::view('add_group_services','livewire.GroupService.include-create')->name('group_services');
            //////////////////////////////// END  SERVICES  /////////////////
        });
    }
);


    /*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
