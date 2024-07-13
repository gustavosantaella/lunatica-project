<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix('/customers')->as("customers.")->group(function ($r) {
    Route::get("/", [CustomerController::class, "index"])->name("index");
    Route::get("/create", [CustomerController::class, "index"])->name("create");
    Route::get("/edit", [CustomerController::class, "index"])->name("create");
    Route::get("/update", [CustomerController::class, "index"])->name("create");
    Route::get("/destroy", [CustomerController::class, "index"])->name("create");
});


Route::prefix('/products')->as("products.")->group(function ($r) {
    Route::get("/", [ProductController::class, "index"])->name("index");
    Route::get("/create", [ProductController::class, "index"])->name("create");
    Route::get("/edit", [ProductController::class, "index"])->name("create");
    Route::get("/update", [ProductController::class, "index"])->name("create");
    Route::get("/destroy", [ProductController::class, "index"])->name("create");
});

Route::prefix('/users')->as("users.")->group(function ($r) {
    Route::get("/", [UserController::class, "index"])->name("index");
    Route::get("/create", [UserController::class, "index"])->name("create");
    Route::get("/edit", [UserController::class, "index"])->name("create");
    Route::get("/update", [UserController::class, "index"])->name("create");
    Route::get("/destroy", [UserController::class, "index"])->name("create");
});


Route::prefix('/sales')->as("sales.")->group(function ($r) {
    Route::get("/", [SaleController::class, "index"])->name("index");
    Route::get("/create", [SaleController::class, "index"])->name("create");
    Route::get("/edit", [SaleController::class, "index"])->name("create");
    Route::get("/update", [SaleController::class, "index"])->name("create");
    Route::get("/destroy", [SaleController::class, "index"])->name("create");
});
