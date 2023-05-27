<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\FileController;
use App\Http\Controllers\API\PhotoController;
use App\Http\Controllers\API\StoryController;
use App\Http\Controllers\API\SharingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    Route::middleware('auth:admins')->group(function () {
        Route::delete('logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('profile', [AuthController::class, 'me'])->name('admin.me');
    });
});

Route::middleware('auth:admins')->group(function () {
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('photos', PhotoController::class)->except('store');
    Route::apiResource('stories', StoryController::class)->except('store');
    Route::apiResource('banners', BannerController::class);
    Route::get('total_selected_banners', [BannerController::class, 'total_selected'])->name('banners.total_selected');
    Route::post('files', [FileController::class, 'store']);
});

Route::post('photos', [PhotoController::class, 'store'])->name('photos.create');
Route::post('stories', [StoryController::class, 'store'])->name('stories.create');
Route::post('share', [SharingController::class, 'store'])->name('share');
Route::get('share', [SharingController::class, 'check']);
