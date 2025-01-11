<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
// routes/web.php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/ex', function () {
    return view('example');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/chat', [ProfileController::class, 'index'])->name('home');
    Route::get('/{recipientId}/chat', [MessageController::class, 'showMessages'])->name('chat');
    Route::get('/home', [HomeController::class, 'getRecentMessages'])->name('chat');
    Route::post('/p', [MessageController::class, 'sendMessage']);
});
