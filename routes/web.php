<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [RecipeController::class, 'index'])->name('home');

// Public recipe pages
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

Route::get('/recipes/create', [RecipeController::class, 'create'])
    ->middleware('auth')
    ->name('recipes.create');

Route::post('/recipes', [RecipeController::class, 'store'])
    ->middleware('auth')
    ->name('recipes.store');

Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])
    ->whereNumber('recipe')
    ->name('recipes.show');

// Auth-only edit routes
Route::middleware('auth')->group(function () {

    Route::get('/my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.mine');

    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});


require __DIR__.'/auth.php';
