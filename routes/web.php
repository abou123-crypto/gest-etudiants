<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StatistiquesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Routes pour les étudiants
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('/etudiant/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::post('/etudiant/update/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/delete/{etudiant}', [EtudiantController::class, 'delete'])->name('etudiant.destroy');

// Routes pour les évaluations - utilisation d’un resource controller (CRUD complet)
Route::resource('evaluations', EvaluationController::class);

// Routes pour les notes
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

// Routes pour les statistiques
Route::get('/statistiques', [StatistiquesController::class, 'index'])->name('statistiques.index');
