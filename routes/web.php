<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserInfoController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    if(auth()->user())
        return redirect('/dashboard');

    return redirect('login');
})->name('login');

Route::post('/store-user-infos', [UserInfoController::class, 'index'])->name('user-info.store');
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-infos', [UserInfoController::class, 'getAllUserData'])->name('user-info');
    Route::get('user-infos/{id}/delete',[UserInfoController::class, 'deleteUserInfo']);
});


