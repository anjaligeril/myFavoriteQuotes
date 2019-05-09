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
/* show all quotes of user in their home page*/
Route::get('/home', 'quotesController@showQuotes')->name('home');

/*save the quotes to the database using the insertQuotes function in the QuotesController*/

Route::post('/addQuotes','quotesController@insertQuotes');

/*delete the unwanted quotes*/

Route::get('/deleteQuotes/{id}','quotesController@deleteQuotes');

/*update the quotes if needed*/

Route::post('/updateQuotes/{id}','quotesController@updateQuotes');

/*search any quote stored */

Route::post('/searchQuote','quotesController@searchQuotes');