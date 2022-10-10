<?php
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // unauthenticated routess

    Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
    });

    // autheneticated routes
    Route::middleware(['role:admin'])->group(function () { 
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // categories
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('categories/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');

        // Products
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('products/update', [ProductController::class, 'update'])->name('products.update');
        Route::post('products/delete', [ProductController::class, 'delete'])->name('products.delete');



    });
    


});