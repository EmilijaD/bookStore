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

Route::get('cards', 'CardsController@index');
Route::get('cards/{card}', 'CardsController@show');

Route::get('books', 'BookController@index');

//// Authentication routes...
//Route::get('auth/login', 'PagesController@about');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
//
//Route::group(['middleware' => ['auth']], function()
//{
//
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
