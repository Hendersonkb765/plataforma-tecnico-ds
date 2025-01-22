<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Services\Google\GoogleClient;
use App\Services\Google\Sheets\GoogleSheets;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/atividades', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/atividades/criar', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/atividades', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/atividades/{activity}', [ActivityController::class, 'show'])->name('activities.show');
    Route::get('/atividades/{activity}/editar', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/atividades/{activity}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/atividades/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sheets',function(){

    $googleClient = new GoogleSheets();
    dd($googleClient->get('1m4xCNdmm49HyZKklIR94zHO9mHld-qC6tNBgPHmvmGc'));
});

require __DIR__.'/auth.php';
