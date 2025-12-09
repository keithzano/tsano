<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\UploadDocuments;
use App\Livewire\Admin\DriverApproval;
use App\Livewire\Admin\VehicleApproval;
use App\Livewire\Admin\AllTransactions;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Driver\AddVehicle;
use App\Livewire\Driver\VehicleList;
use App\Livewire\Driver\RequestFuel;
use App\Livewire\Driver\FuelHistory;
use App\Livewire\Driver\Dashboard as DriverDashboard;

Route::get('/', function () {
    return view('home');
});

// Redirect user to correct dashboard
Route::get('/dashboard', function () {
    return auth()->user()->isAdmin()
        ? redirect()->route('admin.dashboard')
        : redirect()->route('driver.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/driver-approval', DriverApproval::class)->name('driver-approval');
        Route::get('/vehicle-approval', VehicleApproval::class)->name('vehicle-approval');
        Route::get('/transactions', AllTransactions::class)->name('transactions');
    });

// Driver Routes
Route::middleware(['auth', 'driver'])
    ->prefix('driver')
    ->name('driver.')
    ->group(function () {
        Route::get('/dashboard', DriverDashboard::class)->name('dashboard');
        Route::get('/upload-documents', UploadDocuments::class)->name('upload-documents');
        Route::get('/vehicles', function () {
            return view('driver.vehicles');
        })->name('vehicles');
        Route::get('/fuel-history', FuelHistory::class)->name('fuel-history');

        // Requires approval
        Route::middleware(['approved.driver'])->group(function () {
            Route::get('/request-fuel', RequestFuel::class)->name('request-fuel');
        });
    });

require __DIR__ . '/auth.php';
