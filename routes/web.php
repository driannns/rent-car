<?php

use App\Http\Controllers\Auth\RegisteredUserController;
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
    $user = DB::table('users')->get();
    $order = DB::table('orders')->where('status', 'Processing')->get();
    $order2 = DB::table('orders')->where('status', 'Done')->get();

    return view('dashboard', ['data' =>$data, 'user' => $user, 'order' => $order, 'order2' => $order2]);
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add_user', [RegisteredUserController::class, 'createByAdmin'])->name('add_user');
Route::post('/add_user', [RegisteredUserController::class, 'storeByAdmin'])->name('add_user');
Route::patch('/edit_user/{id}', [RegisteredUserController::class, 'editByAdmin'])->name('edit_user');
Route::delete('/destroy_user/{id}', [RegisteredUserController::class, 'deleteByAdmin'])->name('delete_user');

Route::get('/add_category', [CategoryController::class, 'create'])->name('car.create_category');
Route::post('/add_category', [CategoryController::class, 'store'])->name('car.create_category');
Route::get('/{id}/edit_category', [CategoryController::class, 'edit'])->name('edit_category');
Route::post('/{id}/edit_category', [CategoryController::class, 'update'])->name('edit_category');
Route::post('/{id}/delete_category', [CategoryController::class, 'destroy'])->name('delete_category');

Route::post('/add_car', [CarController::class, 'store'])->name('car.create');
Route::post('/search', [CarController::class, 'search'])->name('car.search');
Route::post('/search_category', [CategoryController::class, 'search'])->name('category.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rent', [UserController::class, 'index'])->name('rent.index');
    
    Route::get('/order', [UserController::class, 'order'])->name('order.index');
    Route::get('/history', [UserController::class, 'history'])->name('history.index');
    Route::post('/order', [UserController::class, 'store'])->name('order.store');
    Route::post('/{id}/delete_order', [UserController::class, 'destroy'])->name('order.destroy');
    Route::post('/{id}/delete_history', [UserController::class, 'destroy2'])->name('history.destroy');
    Route::get('/{id}/update_order', [UserController::class, 'update'])->name('order.update');

    Route::get('/category_list', [CategoryController::class, 'index'])->name('category');
    Route::get('/user_list', [UserController::class, 'list'])->name('user_list');


    Route::middleware('role:admin')->group(function () {
        Route::resource('/car', CarController::class);
    });
});

require __DIR__.'/auth.php';
