<?php

use App\Http\Controllers\CoverController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

/* Cover */
Route::controller(CoverController::class)->group(function () {
    Route::get('/cover', 'index');
    });

    Route::get('', function() {
        return redirect('/login');
    });
    
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    /* Dashboard */
    Route::get('/', [DashboardController::class, 'index']);