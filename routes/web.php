<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->group(function() {

	// Authentication Routes...
	Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin/login', 'Auth\LoginController@login');
	Route::post('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');

	// Registration Routes...
	Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('admin/register', 'Auth\RegisterController@register');

	// Password Reset Routes...
	Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

	Route::get('admin/home', 'HomeController@index')->name('admin.home');
});
