<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [MainController::class, 'viewLanding'])->name('landing');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [MainController::class, 'viewDashboard'])->name('dashboard');

    //SHOP
    Route::get('/shop', [ShopController::class, 'viewIndex'])->name('shop.index');
    Route::get('/cart', [ShopController::class, 'viewCart'])->name('shop.cart');
    Route::get('/detail/{id}', [ShopController::class, 'viewDetail'])->name('shop.detail');
    Route::get('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('shop.add.to.cart');
    Route::get('/add-multiple-to-cart/{quantity}/{id}', [ShopController::class, 'addMultipleToCart'])->name('shop.add.multiple.to.cart');
    Route::patch('/update-cart', [ShopController::class, 'update'])->name('shop.update.cart');
    Route::delete('/remove-from-cart', [ShopController::class, 'remove'])->name('shop.remove.from.cart');
    //STRIPE
    Route::get('/pay/stripe', [ShopController::class, 'viewStripeGateway'])->name('shop.stripe.view');
    Route::post('/pay/stripe', [ShopController::class, 'postStripePayment'])->name('shop.stripe.post');
});

require __DIR__.'/auth.php';
