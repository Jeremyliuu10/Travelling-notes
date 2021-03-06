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
use App\Travel;
use Illuminate\Support\Facades\View;

Route::get('/', function (){
    return view('welcome');
});

Route::resource('travels', 'TravelController')->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create','TravelController@create')->middleware('auth');
Route::get('/delete','TravelController@delete');
Route::resource('users', 'UserController')->middleware('auth');

Route::get('/search','TravelController@search');

Route::get('/comments','CommentController@store');
Route::get('/refresh_comments','CommentController@show');

Route::get('/likes','LikeController@store');
Route::get('/no_like','LikeController@unlike');
Route::get('/fullsearch','TravelController@search2');

Route::resource('users', 'UserController')->middleware('auth');

