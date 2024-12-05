<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GestionUtilisateursController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\MonProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Auth::routes();

// Route pour le tableau de bord de l'administrateur
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route pour le tableau de bord du client
Route::get('/employe/dashboard', [EmployeController::class, 'dashboard'])->name('employe.dashboard');

// Route pour le tableau de bord principal
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Route pour afficher le profil de l'utilisateur
Route::get('/mon-profile', [MonProfileController::class, 'showProfile'])->name('mon-profile');

// Route pour le calendrier
Route::get('/calendrier', [CalendrierController::class, 'calendrier'])->name('calendrier');

// Route pour les notifications
Route::get('/notifications', [NotificationsController::class, 'notifications'])->name('notifications');

// Routes pour la connexion et la déconnexion
Route::get('se-connecter', [AuthController::class, 'showSignInForm'])->name('se-connecter');
Route::post('se-connecter', [AuthController::class, 'signIn']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Routes pour la gestion des utilisateurs
Route::post('/add-user', [UserController::class, 'store'])->name('add-user');
Route::get('/gestion-utilisateurs', [UserController::class, 'index'])->name('gestion-utilisateurs');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('update-user');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes pour les documents
Route::resource('documents', DocumentController::class);
Route::get('documents/{filename}', function ($filename) {
    $path = storage_path('app/documents/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('documents.show');


Route::get('/employe/{id}', [EmployeController::class, 'showDetails'])->name('employe.details');
