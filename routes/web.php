<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('/sections', \App\Http\Controllers\SectionController::class);
    Route::resource('/branches', \App\Http\Controllers\BranchController::class);
    Route::resource('/themes', \App\Http\Controllers\ThemeController::class);
    Route::resource('/messages', \App\Http\Controllers\MessageController::class);



    Route::get('sections/{section}/branches', [\App\Http\Controllers\SectionController::class, 'branches'])->name('sections.branches');
    Route::get('sections/{section}/branches_except/{branch}', [\App\Http\Controllers\SectionController::class, 'branch_except']);

    Route::get('branches/{branch}/them/create', [\App\Http\Controllers\BranchController::class, 'themeCreate'])->name('branches.them.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
