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
//BLOG
Route::get('/','Blog@index')->name('Blog');
//Route::get('/create','Blog@create')->middleware('auth');
//Route::post('/create','Blog@store')->name('AddPost');
Route::get('/post/{id}','Blog@show')->name('ShowPost');
//Osoba uzupełnianie brakującychi nformacji
Route::get('Uzytkownik/informacje/uzupelnianie','Person@create')->name('FillInformation')->middleware('auth','CheckPersonInfo');;
Route::post('Uzytkownik/informacje/uzupelnianie','Person@store')->name('DoFillInformation');
//Obwód ciała
Route::get('Uzytkownik/informacje/uzupelnianie/strona/2','Girts@create')->middleware('auth','CheckPersonInfo')->name('Girts');
Route::post('Uzytkownik/informacje/uzupelnianie/strona/2','Girts@store')->name('DoGirts');
//Osoba wyświetlanie informacje o użytkowniku
Route::get('Uzytkownik','Person@index')->name('UserInformation')->middleware('CheckPersonInfo');
//Tworzenie zjedzonych produktów przez użytkownika
Route::get('Uzytkownik/zjedzone','EatedProducts@create')->middleware('auth')->name('Eated');
Route::post('Uzytkownik/zjedzone','EatedProducts@store')->name('DoEated');
Route::get('Uzytkownik/zjedzone/lista','EatedProducts@index')->middleware('auth')->name('EatedList');
///Produkty
Route::get('Produkty','Products@main')->name('main')->middleware('CheckPersonInfo','auth');
Route::get('Produkty/lista','Products@index')->name('PLista');
Route::get('Produkty/skasuj/{id}','Products@destroy');
Route::get('Produkty/dodaj','Products@create')->name('FormAdd')->middleware('auth');
Route::post('Produkty/dodaj','Products@store')->name('add')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
