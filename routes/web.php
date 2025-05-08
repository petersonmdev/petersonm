<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
    Route::get('app', function () {
        return view('dashboard.home');
    })->name('dashboard.home');

	Route::get('billing', function () {
		return view('dashboard.billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('dashboard.profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('dashboard.rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('dashboard.laravel-examples.user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('dashboard.tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('dashboard.virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('dashboard.static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('dashboard.static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard.home');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('/', function() {
    return view('site.home');
})->name('site.home');

Route::get('/sobre-mim', function() {
    return view('site.about');
})->name('site.about');

Route::get('/portfolio', function() {
    return view('site.portfolio');
})->name('site.portfolio');

Route::get('/servicos', function() {
    return view('site.service');
})->name('site.service');

Route::get('/contato', function() {
    return view('site.contact');
})->name('site.contact');

Route::get('/termo-e-condicoes', function() {
    return view('site.terms');
})->name('site.terms');

Route::get('/politica-de-privacidade', function() {
    return view('site.privacy');
})->name('site.privacy');

//Route::get('/app', [\App\Http\Controllers\AuthController::class, 'index'])->name('dashboard.home');
