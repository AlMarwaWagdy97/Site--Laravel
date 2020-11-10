<?php

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

Route::view('/', 'internal.home');
Route::view('about', 'internal.about')->middleware('test');

Route::get('contact-us', 'ContactFormController@create')->name('contact.create');
Route::post('contact-us','ContactFormController@store')->name('contact.store');

//Route::get('customers','CustomersController@index');
//Route::post('customers','CustomersController@store');
//Route::get('customers/create','CustomersController@create');
//Route::get('customers/{customer}','CustomersController@show');
//Route::get('customers/{customer}/edit','CustomersController@edit');
//Route::patch('customers/{customer}','CustomersController@update');
//Route::delete('customers/{customer}','CustomersController@destroy');

Route::resource('customers','CustomersController');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
