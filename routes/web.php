<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;

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

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::controller(LibraryController::class)->group(function () {
    Route::post('/books/create', 'create')->name('books.create');
    Route::get('/books', 'index')->name('books.index');
    Route::get('/books/show/{id}', 'show')->name('books.show');
    Route::get('/books/delete/{id}', 'delete')->name('books.delete');
    Route::put('/books/update/{id}', 'update')->name('books.update');
});

Route::get('/adminka', [LibraryController::class, 'adminka'])->name('adminka');
Route::get('/adminka/{id}/edit', [LibraryController::class, 'update'])->name('adminka.edit'); // Изменено
