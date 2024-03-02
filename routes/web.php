<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;


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

//Index page
Route::get('/', [FilmController::class, 'index'])->name('film.index');

Route::prefix('film')->group(function () {
    //Show create page
    Route::get('create', [FilmController::class, 'create'])->name('film.create');
    //Store film
    Route::post('store', [FilmController::class, 'store'])->name('film.store');
    //Publish film
    Route::patch('{film}', [FilmController::class, 'publish'])->name('film.publish');
    //Show edit page
    Route::get('{film}/edit', [FilmController::class, 'edit'])->name('film.edit');
    //Update film
    Route::post('{film}', [FilmController::class, 'update'])->name('film.update');
    //Destroy film
    Route::delete('{film}', [FilmController::class, 'destroy'])->name('film.destroy');
});

Route::prefix('api')->group(function () {
    //Get all films
    Route::get('/films', [\App\Http\Controllers\Api\FilmController::class, 'index'])->name('api.films.index');
    //Get single film
    Route::get('/films/{id}', [\App\Http\Controllers\Api\FilmController::class, 'show'])->name('api.films.show');
    //Get all genres
    Route::get('/genres', [\App\Http\Controllers\Api\GenreController::class, 'index'])->name('api.genres.index');
    //Get films from single genre
    Route::get('/genres/{film}', [\App\Http\Controllers\Api\GenreController::class, 'films'])
        ->name('api.genres.films');
});

