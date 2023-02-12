<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\Test2;
use App\Http\Livewire\Test;
use App\Models\Car;
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
Route::get('/', HomeController::class)->name('index');

Route::get('car/{id}', function ($car) {
    $car = Car::whereId($car)->with('tasks')->first();

    return view('car', compact('car'));
})->name('car');

Route::get('car/costs', function () {
    return view('costs');
})->name('costs');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/vk', [LoginController::class, 'redirectVkontakte'])->name('auth.vkontakte');
Route::get('auth/yandex', [LoginController::class, 'redirectYandex'])->name('auth.yandex');

Route::get('auth/vk/callback', [LoginController::class, 'signinVkontakte']);
Route::get('auth/yandex/callback', [LoginController::class, 'signinYandex']);
