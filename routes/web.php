<?php

use App\Http\Controllers\helpdeskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/helpdesk', [helpdeskController::class, 'helpdesk'])->name('helpdesk.index');


// Create
Route::post('/helpdesk', [helpdeskController::class, 'store'])->name('helpdesk.index');

// Display
Route::get('/show', [helpdeskController::class, 'show'])->name('helpdesk.show');

// Edit
Route::get('/edit', [helpdeskController::class, 'edit'])->name('helpdesk.edit');
Route::put('/update', [helpdeskController::class, 'update'])->name('helpdesk.update');

// Delete
Route::delete('/helpdesk/{helpdesk}', [helpdeskController::class, 'destroy'])->name('helpdesk.destroy');

//display,delete,edit
Route::get('/store', [helpdeskController::class, 'index'])->name('helpdesk.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
