<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;


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
// Users
Route::get('/', [ShopController::class, 'shops']);
Route::get('/search', [ShopController::class, 'search'])->name('shops.search');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shops.detail');
Route::get('/login',[AuthController::class,'loginShow']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'registerShow']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/done', [ReservationController::class, 'done']);
Route::get('/thanks', [AuthController::class, 'thanks']);

Route::group(['middleware'=>'auth:user'],function () {
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::post('/favorite/add/{shop_id}', [FavoriteController::class, 'add'])->name('favorite.add');
    Route::post('/favorite/delete/{shop_id}', [FavoriteController::class, 'delete'])->name('favorite.delete');
    Route::post('/reservation/{shop_id}', [ReservationController::class, 'add'])->name('reservation.add');
    Route::post('/reservation/delete/{id}', [ReservationController::class, 'delete'])->name('reservation.delete');
    Route::get('/reservation/update/{id}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::post('/update/{id}', [ReservationController::class, 'update'])->name('update');
});

// Admin/Owners
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login.index');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware'=>'auth:admin'],function () {
    Route::post('/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
Route::group(['middleware'=>'auth:owners'],function () {
    Route::get('/Owner', [OwnerController::class, 'index'])->name('owner.index');
    Route::post('owner/update', [OwnerController::class,'update'])->name('owner.update');
});

