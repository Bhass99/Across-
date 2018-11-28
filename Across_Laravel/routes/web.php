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

Route::get('/index', 'PagesController@index');
//Route::get( 'news/{id}', 'PagesController@news');
//Route::get('/users/index', 'UsersController@index');
//Route::get('/corerescources', 'PagesController@coreRescources');
//Route::get('/corerescources/faqs', 'PagesController@coreRescources2')->name('coreRescourcesfaqs');
//Route::get('/objection', 'PagesController@objection');
//Route::get('/understanding', 'PagesController@understanding');

Route::get('/', 'PagesController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/download/{id}', 'FileController@download');


//Route::post('/forgetPassword', 'Auth\LoginController@login');

Route::get('/forgetPassword', 'sendPassword@index')->name('forgetPassword');
Route::post('/sendPassword', 'sendPassword@sendPassword')->name('sendPassword');

Route::get('/sub_category/{parent_id}/{id}', 'PagesController@sub_category')->name('sub_category');
Route::get('/category/{id}', 'PagesController@showCategory')->name('showCategory');

Route::middleware('checkAuth')->group(function () {
    Route::get('/login', function () {
        return view('pages.index');
    });
});
Route::middleware('checkAdmin')->group(function () {

    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostsController');
    Route::resource('secondcategory', 'SecondCategoryController');
    Route::resource('categories', 'CategoriesController');

    Route::get('/admin', 'PagesController@admin');
    Route::get('/adminpages', 'AdminController@pages')->name('adminpages');
    Route::get('/adminusers', 'AdminController@users')->name('adminusers');
 //   Route::get('/adminsubcategory/{id}', 'AdminController@subcategory');
});
