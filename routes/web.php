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

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login','Auth\LoginController@login');
//
// Route::post('/register','Auth\RegisterController@create');

Route::group(['middleware'=>'admin'],function (){

    Route::get('/admin/post','PostController@index');
    Route::get('/admin/post/create','PostController@create');
    Route::post('/admin/post/create','PostController@store');
    Route::get('/admin/post/edit/{id}','PostController@edit');
    Route::post('/admin/post/edit/{id}','PostController@update');
    Route::get('/admin/post/delete/{id}','PostController@delete');
    Route::get('/admin/post/detail/{id}','PostController@detail');

    Route::get('/admin/cate','CateController@index');
    Route::post('/admin/cate','CateController@create');
    Route::get('/admin/cate/delete/{id}','CateController@delete');
    Route::post('/admin/cate/edit/{id}','CateController@edit');

    Route::get('/admin/artist','ArtistController@index');
    Route::get('/admin/artist/create','ArtistController@create');
    Route::post('/admin/artist/create','ArtistController@store');
    Route::get('/admin/artist/edit/{id}','ArtistController@edit');
    Route::post('/admin/artist/edit/{id}','ArtistController@update');
    Route::get('/admin/artist/delete/{id}','ArtistController@delete');

    Route::get('/admin/user','UserController@index');
    Route::get('/admin/user/edit/{id}','UserController@edit');
    Route::post('/admin/user/edit/{id}','UserController@update');
    Route::get('/admin/user/delete/{id}','UserController@delete');
    Route::get('/admin/user/register','UserController@register');
    Route::get('/admin/user/resetpassword/{id}','UserController@resetpassword');
    Route::post('/admin/user/resetpassword/{id}','UserController@reset');

    Route::post('/admin/user/register','UserController@register_user');

    Route::get('/admin/post/publish/{id}','PostController@publish');
    Route::get('/admin/post/unpublish/{id}','PostController@unpublish');

    Route::get('/admin/postanalyst','AnalystController@index');

    Route::get('/admin/post/comment','CommentController@index');
    Route::get('/admin/comment/delete/{id}','CommentController@delete');

    Route::get('/admin/client_user','ClientUserController@index');
    Route::get('/admin/clientuser/edit/{id}','ClientUserController@edit');
    Route::post('/admin/clientuser/edit/{id}','ClientUserController@update');
    Route::get('/admin/clientuser/delete/{id}','ClientUserController@delete');

    Route::get('/admin','AdminController@index');

    Route::get('/admin/fullmon','FullmonController@index');
    Route::get('/admin/fullmon/create','FullmonController@create');
    Route::post('/admin/fullmon/create','FullmonController@store');
    Route::get('/admin/fullmon/edit/{id}','FullmonController@edit');
    Route::post('/admin/fullmon/edit/{id}','FullmonController@update');
    Route::get('/admin/fullmon/{id}/delete','FullmonController@delete');

    Route::get('/admin/advertise','AdvertiseController@index');
    Route::get('/admin/advertise/create','AdvertiseController@create');
    Route::post('/admin/advertise/create','AdvertiseController@store');
    Route::get('/admin/advertise/edit/{id}','AdvertiseController@edit');
    Route::post('/admin/advertise/edit/{id}','AdvertiseController@update');
    Route::get('/admin/advertise/{id}/delete','AdvertiseController@delete');

    Route::get('/admin/pagoda','PagodaController@index');
    Route::get('/admin/pagoda/create','PagodaController@create');
    Route::post('/admin/pagoda/create','PagodaController@store');
    Route::get('/admin/pagoda/edit/{id}','PagodaController@edit');
    Route::post('/admin/pagoda/edit/{id}','PagodaController@update');
    Route::get('/admin/pagoda/delete/{id}','PagodaController@delete');

    Route::get('/admin/member','DonationController@index');
    Route::get('/admin/member/{id}','DonationController@detail');
    Route::get('/admin/member/donation/{id}','DonationController@donation');
    Route::post('/admin/member/newDonation','DonationController@store');
    Route::get('/admin/member/donation/delete/{id}','DonationController@delete');
    Route::get('/admin/member/donation/update/{id}','DonationController@edit');
  Route::post('/admin/member/donation/update/{id}','DonationController@update');


});





Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return redirect('/');
});
