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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Socalite Authentication google
Route::get('/google/redirect', 'Socialites\SocialAuthGoogleController@redirect');
Route::get('/call_back', 'Socialites\SocialAuthGoogleController@call_back');
// Socalite Authentication facebook
Route::get('/redirect', 'Socialites\SocialAuthFacebookController@redirect');
Route::get('/callback', 'Socialites\SocialAuthFacebookController@callback');


Route::get('/{vue_capture?}', function(){
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');