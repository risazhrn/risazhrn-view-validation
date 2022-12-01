<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
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
route::get('/getAllCollections', [CollectionController::class, 'getAllCollections'])->middleware(['auth', 'verified'])->name('getAllCollection');
route::get('/getAllUser', [UserController::class, 'getAllUser'])->middleware(['auth', 'verified'])->name('getAllUser');

Route::get('user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user');
Route::get('userView/{user}', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('userView');
Route::get('userRegistration', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('userRegistration');
Route::post('userStore', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('userStore');

Route::get('koleksi', [CollectionController::class, 'index'])->middleware(['auth', 'verified'])->name('koleksi');
Route::get('koleksiView/{collection}', [CollectionController::class, 'show'])->name('koleksiView');
Route::get('koleksiTambah', [CollectionController::class, 'create'])->middleware(['auth', 'verified'])->name('koleksiTambah');
Route::post('koleksiStore', [CollectionController::class, 'store'])->middleware(['auth', 'verified'])->name('koleksiStore');
Route::put('koleksiUpdate/{collection}', [CollectionController::class, 'update'])->middleware(['auth', 'verified'])->name('koleksiUpdate');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
