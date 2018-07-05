<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/artists','Api\ArtistController@index');
Route::get('/artistmonk','Api\ArtistController@monk');
Route::get('/artist/{id}','Api\ArtistController@show');

Route::post('/posts/{page}','Api\PostController@index');
Route::get('/post/{id}','Api\PostController@show');

//User

Route::post('/clientuser','Api\ClientUserController@store');

Route::post('/phoneregister','Api\PhoneregisterController@index');

//Like

Route::post('/post/like','Api\LikeController@like');
Route::post('/post/unlike','Api\LikeController@unlike');

//Comment

Route::post('/comment','Api\CommentController@comment');
Route::post('/post/comment','Api\CommentController@post_comment');
Route::post('/post/comment/delete','Api\CommentController@comment_delete');

//Pagoda

Route::get('/pagoda/{page}','Api\PagodaController@index');

//Notification

Route::get('/notification','Api\FullmonController@index');

//Member

Route::get('/member/{id}','Api\ClientUserController@member');
