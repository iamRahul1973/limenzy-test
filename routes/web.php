<?php

use App\Http\Controllers\Admin\PackageController;
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

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::view('/packages/create', 'packages.create')->name('packages.create');
    Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');

    Route::post('/packages/{package}/add-coupon', [PackageController::class, 'syncCoupon'])
        ->name('packages.add-coupon');
});

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::view('/book-a-package', 'book-a-package')->name('book-a-package');
});

require __DIR__.'/auth.php';
