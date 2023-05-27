<?php

use App\Http\Controllers\PolicyAndTermController;
use App\Http\Controllers\Web\PhotoController;
use App\Http\Controllers\Web\SharingController;
use App\Http\Controllers\Web\StoryController;
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

Route::get('/cms/{any?}', function () {
    return view('app');
})->where('any', '.*');


Route::get('/cms/{any}', function ($any) {
    return redirect('/cms/{$any}');
});

Route::get('home', [StoryController::class, 'index'])->name('home');

Route::get('photo/{photo?}', [PhotoController::class, 'index'])->name('photo');
Route::get('story/{story?}', [StoryController::class, 'index'])->name('story');

Route::get('share/redirect', [SharingController::class, 'redirect'])->name('share.redirect');
Route::get('share/callback', [SharingController::class, 'callback'])->name('share.callback');
Route::get('policy', [PolicyAndTermController::class, 'policy']);
Route::get('term', [PolicyAndTermController::class, 'term']);
