<?php
use App\Role;


Route::get('/', function () {
	//dd(auth()->user()->hasRole('admin'));
    return view('portada');
});

//ejemplo para permitir accesos.
Route::get('valida_rol/{id}', function ($id) {
    dd("Pudiste entrar ".$id);
    return view('portada');
})->middleware('auth', 'role:admin');

//Auth::routes();
//rutas dentro de Auth::routes();
    // Authentication Routes...
    Route::get('ingresar', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('ingresar', 'Auth\LoginController@login');
    Route::post('salir', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//fin rutas Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
