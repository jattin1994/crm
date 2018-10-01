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

Route::get('/', 'AgentAuth\LoginController@showLoginForm')->name('index');

Route::group(['prefix' => 'agent','as'=>'agent.'], function () {
  Route::get('/login', 'AgentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AgentAuth\LoginController@login');
  Route::get('/logout', 'AgentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AgentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AgentAuth\RegisterController@register');
  Route::get('/success', 'AgentAuth\RegisterController@success')->name('success');
  Route::get('/verifyemail/{id}', 'AgentAuth\LoginController@verifyemail')->name('verifyemail');

  Route::post('/password/email', 'AgentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');  
  Route::get('/password/reset', 'AgentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');

  Route::post('/password/reset', 'AgentAuth\ResetPasswordController@reset')->name('password.setpassword');
  Route::get('/password/reset/{token}', 'AgentAuth\ResetPasswordController@showResetForm');


});

Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register')->name('register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});


  //Register
Route::get('/agent/referralregister/{name}/{lastname}/{email}/{compensation}/{username}/{usertype}/{override}', 'AgentAuth\RegisterController@showRegistrationForm')->name('referralregister');

Route::get('/agent/referralregister/{name}/{lastname}/{email}/{compensation}/{username}/{usertype}', 'AgentAuth\RegisterController@showRegistrationForm')->name('referralregister');


