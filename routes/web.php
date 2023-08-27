<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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
})->middleware('auth');

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);

});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::get('laptops', [LaptopController::class, 'index']);
    Route::get('laptop-add', [LaptopController::class, 'add']);
    Route::post('laptop-add', [LaptopController::class, 'store']);
    Route::get('laptop-edit/{slug}', [LaptopController::class, 'edit']);
    Route::post('laptop-edit/{slug}', [LaptopController::class, 'update']);
    Route::get('laptop-delete/{slug}', [LaptopController::class, 'delete']);
    Route::get('laptop-destroy/{slug}', [LaptopController::class, 'destroy']);
    Route::get('laptop-deleted', [LaptopController::class, 'deletedLaptop']);
    Route::get('laptop-restore/{slug}', [LaptopController::class, 'restore']);
    
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']);
    Route::post('category-add', [CategoryController::class, 'store']);
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
    Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('registered-users', [UserController::class, 'registeredUser']);
    Route::get('user-detail/{slug}', [UserController::class, 'show']);
    Route::get('user-approve/{slug}', [UserController::class, 'approve']);
    Route::get('user-ban/{slug}', [UserController::class, 'delete']);
    Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
    Route::get('user-banned', [UserController::class, 'bannedUser']);
    Route::get('user-restore/{slug}', [UserController::class, 'restore']);

    Route::get('rent-logs', [RentLogController::class, 'index']);
});