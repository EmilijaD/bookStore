<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
 * Code example - multiple choices for returning view and data within
 * */

/*Route::get('/', function () {
//    return view('pages.welcome');
    $people = ['Taylor', 'Matt', 'Jeffrey'];

//    return View::make();
//    return view('pages.welcome', ['people' => $people]);
//    return view('pages.welcome', compact('people'));
//    return view('pages.welcome')->with('people', $people)->with(...);
//    return view('pages.welcome')->withPeople($people);

    return view('pages.welcome', [
        'people' => $people
    ]);
});*/

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');

//Route::get('cards', 'CardsController@index');
//Route::get('cards/{card}', 'CardsController@show');

Route::get('books', 'BookController@index');
Route::get('books/category/{category}', 'BookController@getBooksFromCategory');
Route::get('books/search', 'BookController@searchBooks');
Route::get('books/add', 'BookController@addBookGet');
Route::post('books/add', 'BookController@addBookPost');

/*login and register*/
//Route::post('/password/email', function () {
//    return view('emails.password');});
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::group(['middleware' => ['auth']], function()
{
//    Route::get('cards', 'CardsController@index');
//    Route::get('cards/{card}', 'CardsController@show');
});


Route::group(['middleware' => ['web']], function () {
    //
});
