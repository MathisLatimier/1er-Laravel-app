<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


// // UserController@index
// // Afficher la liste des utilisateurs
// Route::get('/users', [UserController::class,'index'])->name('users.index');

// // UserController@create
// // Affiher le formulaire de création d'un utilisateur
// Route::get('/users/create', [UserController::class,'create'])->name('users.create');

// // UserController@store
// // Enregistrer un utilisateur
// Route::post('/users', [UserController::class,'store'])->name('users.store');

// // UserController@show
// // Afficher un utilisateur
// Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');

// // UserController@edit
// // Afficher le formulaire de modification d'un utilisateur
// Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');

// // UserController@update
// // Modifier un utilisateur
// Route::patch('/users/{user}', [UserController::class,'update'])->name('users.update');

// // UserController@destroy
// // Supprimer un utilisateur
// Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');

Route::resource('users', UserController::class);

Route::resource('articles', ArticleController::class);