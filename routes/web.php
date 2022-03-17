<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\User\UserDashboardComponents;
use App\Http\Livewire\Admin\AdminDashboardComponents;
use App\Http\Livewire\ProductComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class);

Route::get('/product/{slug}', ProductComponent::class)->name('product.details');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//for users
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponents::class)->name('user.dashboard');
});

//for admin

Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {

    Route::get('/admin/dashboard',AdminDashboardComponents::class)->name('admin.dashboard');
    
});

