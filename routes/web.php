<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $data = DB::table('cars')->orderBy('id', 'desc')->take(4)->get();
    return view('dashboard', ['data' =>$data]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add_category', [CategoryController::class, 'create'])->name('car.create_category');
Route::post('/add_category', [CategoryController::class, 'store'])->name('car.create_category');
Route::post('/add_car', [CarController::class, 'store'])->name('car.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rent', [UserController::class, 'index'])->name('rent.index');
    Route::get('/order', [UserController::class, 'order'])->name('order.index');

    Route::middleware('role:admin')->group(function () {
        Route::resource('/car', CarController::class);
    });
});

require __DIR__.'/auth.php';
