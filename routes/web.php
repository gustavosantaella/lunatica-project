<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

require __DIR__ . '/auth.php';

Route::prefix("/tienda")->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/carrito', [CartController::class, 'index'])->name('cart');
    Route::post('/carrito/store', [CarController::class, 'store'])->name('car.store');
    Route::put('/{carItem}', [CarController::class, 'update'])->name('car.update');
    Route::delete('/{carItem}', [CarController::class, 'destroy'])->name('car.destroy');
});

Route::prefix('/admin')->middleware(['auth'])->group(function () {

    Route::prefix('/customers')->as("customers.")->group(function ($r) {
        Route::get("/", [CustomerController::class, "index"])->name("index");
        Route::get("/create", [CustomerController::class, "create"])->name("create");
        Route::post("/store", [CustomerController::class, "store"])->name("store");
        Route::get("/edit/{customer}", [CustomerController::class, "edit"])->name("edit");
        Route::put("/update/{customer}", [CustomerController::class, "index"])->name("update");
        Route::delete("/destroy/{customer}", [CustomerController::class, "destroy"])->name("destroy");
    });


    Route::prefix('/products')->as("products.")->group(function ($r) {
        Route::get("/", [ProductController::class, "index"])->name("index");
        Route::get("/create", [ProductController::class, "create"])->name("create");
        Route::post("/store", [ProductController::class, "store"])->name("store");
        Route::get("/edit/{product}", [ProductController::class, "edit"])->name("edit");
        Route::put("/update/{product}", [ProductController::class, "update"])->name("update");
        Route::delete("/destroy/{product}", [ProductController::class, "destroy"])->name("destroy");
    });

    Route::resource('users', UserController::class);


    Route::prefix('/sales')->as("sales.")->group(function ($r) {
        Route::get("/", [SaleController::class, "index"])->name("index");
        Route::get("/create", [SaleController::class, "create"])->name("create");
        Route::post("/", [SaleController::class, "store"])->name("store");
        Route::get("/{sale}/edit", [SaleController::class, "edit"])->name("edit");
        Route::put("/{sale}", [SaleController::class, "update"])->name("update");
        Route::delete("/{sale}", [SaleController::class, "destroy"])->name("destroy");
    });
    Route::resource('discounts', DiscountController::class);
    Route::get('/cars', [CarController::class, 'index'])->name('admin.car.index');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


Route::get("/db/migrations", function(){
    Artisan::call('migrate:fresh --seed');
});
