<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('dashboard', [BookController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);

Route::get('books', [BookController::class, 'index'])->name('books');
Route::get('book/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('create/book', [BookController::class, 'create'])->name('book.create')->middleware(['auth']);
Route::post('book', [BookController::class, 'store'])->name('book.store')->middleware(['auth']);
Route::get('book/edit/{id}', [BookController::class, 'edit'])->name('book.edit')->middleware(['auth']);
Route::put('book/update', [BookController::class, 'update'])->name('book.update')->middleware(['auth']);
Route::delete('book/delete/{id}', [BookController::class, 'destory'])->name('book.destory')->middleware(['auth']);

Route::post('comment',[CommentController::class,'store'])->name('comment.store');

require __DIR__.'/auth.php';
