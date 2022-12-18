<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TrashedNoteController;
use Illuminate\Support\Facades\Route;

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

//can only be accessed by logged in users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//maakt alle crud routes
Route::resource('/notes', NoteController::class)->middleware(['auth']); 

Route::get('/trashed',[TrashedNoteController::class, 'index'])->middleware('auth')->name('trashed.index');

Route::get('/trashed/{note}',[TrashedNoteController::class, 'show'])->withTrashed()->middleware('auth')->name('trashed.show');

require __DIR__.'/auth.php';
