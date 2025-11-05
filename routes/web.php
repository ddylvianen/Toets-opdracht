<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeverancierController;

// Homepagina
Route::get('/', function () {
    return redirect('magazijn');
})->name('home');

// Magazijn overzicht
Route::get('/magazijn', [MagazijnController::class, 'index'])->name('magazijn.index');

// Leveringsinformatie (controleert voorraad en verwachte levering)
Route::get('/magazijn/{id}/levering', [MagazijnController::class, 'showLeveringInfo'])->name('magazijn.levering');

// Allergeneninformatie
Route::get('/magazijn/{id}/allergenen', [MagazijnController::class, 'showAllergenenInfo'])->name('magazijn.allergenen');

// Alle allergenen
Route::get('/allergeen', [AllergeenController::class, 'index'])->name('allergeen.index');

// Formulier voor nieuw allergeen
Route::get('/allergeen/create', [AllergeenController::class, 'create'])->name('allergeen.create');

// Opslaan van nieuw allergeen
Route::post('/allergeen', [AllergeenController::class, 'store'])->name('allergeen.store');

// Verwijderen van allergeen
Route::delete('/allergeen/{id}', [AllergeenController::class, 'destroy'])->name('allergeen.destroy');

// Bewerken van allergeen
Route::get('/allergeen/{id}/edit', [AllergeenController::class, 'edit'])->name('allergeen.edit');

// Updaten van allergeen
Route::put('/allergeen/{id}', [AllergeenController::class, 'update'])->name('allergeen.update');

// Tonen van allergeen details
Route::get('/allergeen/{id}', [AllergeenController::class, 'show'])->name('allergeen.show');

// Tonen van leveranciers
Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leverancier.index');

// Tonen van producten info
Route::get('/producten/{id}', [LeverancierController::class,'show'])->name('leverancier.producteninfo');
// Dashboard (met auth middleware)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Settings routes (alleen voor ingelogde gebruikers)
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
