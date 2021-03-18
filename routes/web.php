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
    return view('Admin.post');
});
Route::group(['prefix' => 'admin/post'],function() {
    Route::get('index', 'Admin\PostController@post')->name('admin.news.post');
    Route::get('fetch_data', 'Admin\PostController@fetch_data')->name('admin.news.postFetchData');;
    Route::get('post-create', 'Admin\PostController@postCreate')->name('admin.news.postCreate');
    Route::post('post-store', 'Admin\PostController@postStore')->name('admin.news.postStore');
    Route::get('post-show/{id}', 'Admin\PostController@postShow')->name('admin.news.postShow');
    Route::get('post-edit/{id}', 'Admin\PostController@postEdit')->name('admin.news.postEdit');
    Route::post('post-update/{id}', 'Admin\PostController@postUpdate')->name('admin.news.postUpdate');
    Route::get('post-destroy/{id}', 'Admin\PostController@postDestroy')->name('admin.news.postDestroy');
});

Route::group(['prefix' => 'admin/category'],function() {
    Route::get('index', 'Admin\CategoryController@category')->name('admin.category');
    Route::post('category-store', 'Admin\CategoryController@categoryStore')->name('admin.category.categoryStore');
    Route::get('category-edit/{id}', 'Admin\CategoryController@categoryEdit')->name('admin.category.categoryEdit');
    Route::get('category-update/{id}', 'Admin\CategoryController@categoryUpdate')->name('admin.category.categoryUpdate');
    Route::get('category-destroy/{id}', 'Admin\CategoryController@categoryDestroy')->name('admin.category.categoryDestroy');
});

Route::group(['prefix' => 'admin/post-type'],function() {
    Route::get('index', 'Admin\PostTypeController@postType')->name('admin.postType');
    Route::post('post-type-store', 'Admin\PostTypeController@postTypeStore')->name('admin.postType.postTypeStore');
    Route::get('post-type-edit/{id}', 'Admin\PostTypeController@postTypeEdit')->name('admin.postType.postTypeEdit');
    Route::get('post-type-update/{id}', 'Admin\PostTypeController@postTypeUpdate')->name('admin.postType.postTypeUpdate');
    Route::get('post-type-destroy/{id}', 'Admin\PostTypeController@postTypeDestroy')->name('admin.postType.postTypeDestroy');
});

Route::get('admin/user-list', 'Admin\UserListController@userList')->name('admin.userList');
Route::get('admin/user-destroy/{id}', 'Admin\UserListController@userDestroy')->name('admin.userDestroy');

Route::get('page/home', 'Page\HomeController@home')->name('page.home');
Route::get('page/index', 'Page\HomeController@index')->name('page.index');

Route::get('ajax/get-category/{category_id}','HomeController@getCategory')->name('page.getCategory');