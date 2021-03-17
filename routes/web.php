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
Route::get('admin/post', 'Admin\PostController@post')->name('admin.news.post');
Route::get('admin/post/fetch_data', 'Admin\PostController@fetch_data')->name('admin.news.postFetchData');;
Route::get('admin/post/post-create', 'Admin\PostController@postCreate')->name('admin.news.postCreate');
Route::post('admin/post/post-store', 'Admin\PostController@postStore')->name('admin.news.postStore');
Route::get('admin/post/post-show/{id}', 'Admin\PostController@postShow')->name('admin.news.postShow');
Route::get('admin/post/post-edit/{id}', 'Admin\PostController@postEdit')->name('admin.news.postEdit');
Route::post('admin/post/post-update/{id}', 'Admin\PostController@postUpdate')->name('admin.news.postUpdate');
Route::get('admin/post/post-destroy/{id}', 'Admin\PostController@postDestroy')->name('admin.news.postDestroy');

Route::get('admin/user-list', 'Admin\UserListController@userList')->name('admin.userList');
Route::get('admin/user-destroy/{id}', 'Admin\UserListController@userDestroy')->name('admin.userDestroy');

Route::get('admin/post-type', 'Admin\PostTypeController@postType')->name('admin.postType');
Route::post('admin/post-type/post-type-store', 'Admin\PostTypeController@postTypeStore')->name('admin.postType.postTypeStore');
Route::get('admin/post-type/post-type-edit', 'Admin\PostTypeController@postTypeEdit')->name('admin.postType.postTypeEdit');
Route::get('admin/post-type/post-type-update', 'Admin\PostTypeController@postTypeUpdate')->name('admin.postType.postTypeUpdate');
Route::get('admin/post-type/post-type-destroy', 'Admin\PostTypeController@postTypeDestroy')->name('admin.postTypeDestroy');

