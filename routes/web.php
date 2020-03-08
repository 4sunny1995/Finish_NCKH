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

// Auth::routes();
Route::group(['prefix' => 'user'], function () {
    Route::get('login','UserController@index')->name('user.login');
    Route::get('register','UserControlelr@create')->name('user.register');
    Route::post('login','UserController@checking');
    Route::get('profile','UserController@show')->name('user.profile');
    Route::get('logout','UserController@logout')->name('user.logout');
    Route::post('changePassword/{id}','UserController@update')->name('user.changePassword');
});
Route::group(['prefix' => 'topic'], function () {
    Route::post('create','TopicController@store')->name('topic.store');
    Route::post('update','TopicController@update')->name('topic.update');
});

Route::group(['prefix' => 'customer'], function () {
    Route::post('update','CustomerController@update')->name('customer.update');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('login','Admin\AdminController@loginForm')->name('admin.login');
    Route::post('login','Admin\AdminController@checking');
    Route::get('dashboard','Admin\AdminController@index')->name('admin.dashboard');
    Route::get('logout','Admin\AdminController@logout')->name('admin.logout');
    Route::get('createUser','Admin\AccountManagementController@create')->name('admin.user.create');
    Route::post('createUser','Admin\AccountManagementController@store');
    Route::get('danhsachUser','Admin\AccountManagementController@index')->name("admin.user.all");
    Route::get('xoaUser/{id}','Admin\AccountManagementController@destroy');
    Route::get('chitiet/{id}','Admin\AccountManagementController@show')->name('admin.chitiet');
    Route::post('/user/capnhat','Admin\AccountManagementController@update');
    Route::get('/capquyenUser/{id}','Admin\PermissionManagementController@up');
    Route::get('/xoaquyenUser/{id}','Admin\PermissionManagementController@down');
    Route::get('/chitietdetai/{id}','Admin\TopicManagementController@show')->name('admin.chitietdetai');
    Route::get('searchUser','LiveSearchController@AdminSearchUser');
    Route::get('searchTopic','LiveSearchController@AdminSearchTopic');
    Route::group(['prefix' => 'topic'], function() {
        Route::get('/','Admin\TopicManagementController@index')->name('admin.topic');
        Route::get('users/{id}','Admin\TopicManagementController@show');
        Route::get('create','Admin\TopicManagementController@create')->name('admin.topic.create');
        Route::post('create','Admin\TopicManagementController@store')->name('admin.topic.store');
        Route::post('capnhat','Admin\TopicManagementController@update');
        Route::get('delete/{id}','Admin\TopicManagementController@destroy')->name('admin.topc.destroy');
    });
    
});Route::group(['prefix' => 'excel'], function () {
    Route::group(['prefix' => 'import'], function () {
        Route::get('user','Excel\IEUserController@importExportView')->name('excel.import.user');
        Route::post('user','Excel\IEUserController@import');
        Route::get('topic','Excel\IETopicController@importExportView')->name('excel.import.topic');
        Route::post('topic','Excel\IETopicController@import');
        Route::get('customer','Excel\IECustomerController@importExportView')->name('excel.import.customer');
        Route::post('customer','Excel\IECustomerController@import');
    });
    Route::group(['prefix' => 'export'], function () {
        Route::get('user','Excel\IEUserController@export')->name('export.user');
        Route::get('topic','Excel\IETopicController@export')->name('export.topic');
        Route::get('customer','Excel\IECustomerController@export')->name('export.customer');
    });
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');


Route::get('/user/searchTopic','LiveSearchController@UserSearchTopic');

// Route::get('/admin/searchTopic','LiveSearchController@adminsearchTopic');
// AdminSearchTopic
