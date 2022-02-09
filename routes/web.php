<?php

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

// Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

// Route::get('/app', 'AuthController@dashboard')->name('app.home');


// Route::get('listagem-usuarios', 'UserController@listUser');

// Route::group(['namespace'=> 'Form'], function() {
//     // VERBO GET
//     Route::get('usuarios', 'TestController@listAllUser')->name('users.listAll');
//     Route::get('usuarios/novo', 'TestController@formAddUser')->name('users.formAddUser');
//     Route::get('usuarios/editar/{user}', 'TestController@formEditUser')->name('users.formEditUser');
//     Route::get('usuarios/{user}', 'TestController@listUser')->name('users.list');


//     // VERBO POST
//     Route::post('usuarios/store', 'TestController@storeUser')->name('users.store');


//     // VERBO PUT/PATCH
//     Route::patch('usuarios/edit/{user}', 'TestController@edit')->name('users.edit');


//     // VERBO DELETE
//     Route::delete('usuarios/destroy/{user}', 'TestController@destroy')->name('users.destroy');

// });
Auth::routes();

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

// Route::get('/', 'HomeController@index')->name('site.home');
Route::get('/app', 'AuthController@index')->name('dashboard.home');
