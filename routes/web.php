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
Route::group(['prefix'=>'cate'],function(){
    Route::get('getAdd',['as'=>'getAdd','uses'=>'CategoryController@getAdd']);
    Route::post('postAdd',['as'=>'postAdd','uses'=>'CategoryController@postAdd']);
    Route::get('getList',['as'=>'getList','uses'=>'CategoryController@getList']);
    Route::get('getDelete/{id}',['as'=>'getDelete','uses'=>'CategoryController@getDelete']);
    Route::get('Edit/{id}',['as'=>'getEdit','uses'=>'CategoryController@getEdit']);
    Route::post('Edit/{id}',['as'=>'postEdit','uses'=>'CategoryController@postEdit']);
});
Route::group(['prefix'=>'product'],function(){
    Route::get('getAdd',['as'=>'getAddProduct','uses'=>'ProductController@getAdd']);
    Route::post('postAdd',['as'=>'postAddProduct','uses'=>'ProductController@postAdd']);
    Route::get('getList',['as'=>'getListProduct','uses'=>'ProductController@getList']);
    Route::get('getDelete/{id}',['as'=>'getDeleteProduct','uses'=>'ProductController@getDelete']);
    Route::get('Edit/{id}',['as'=>'getEditProduct','uses'=>'ProductController@getEdit']);
    Route::post('Edit/{id}',['as'=>'postEditProduct','uses'=>'ProductController@postEdit']);
    Route::get('delImg/{id}',['as'=>'getDelProduct','uses'=>'ProductController@delImg']);
});
Route::group(['prefix'=>'account'],function(){
    Route::post('postLoginAccount',['as'=>'postLoginAccount','uses'=>'AccountController@postLogin']);
    Route::post('postRegisterAccount',['as'=>'postRegisterAccount','uses'=>'AccountController@postRegister']);
    Route::get('ListAccount',['as'=>'listAccount','uses'=>'AccountController@getList']);
    Route::get('getLogout',['as'=>'getLogout','uses'=>'AccountController@getLogout']);
});
Route::get('index',['as'=>'getIndex','uses'=>'PageController@getIndex']);
Route::get('cart',['as'=>'getCart','uses'=>'PageController@getCart']);
Route::get('addCart/{id}',['as'=>'addCart','uses'=>'CartController@addCart']);
Route::get('deleteCart/{id}',['as'=>'deleteCart','uses'=>'CartController@removeCart']);
Route::get('getchiTiet/{id}',['as'=>'ChiTiet','uses'=>'PageController@getDetail']);
Route::get('getcart',['as'=>'getCart','uses'=>'CartController@getCart']);
Route::get('sendmail',['as'=>'sendMail','uses'=>'MailController@sendMail']);
Route::get('getSearch',['as'=>'getSearch','uses'=>'PageController@search']);
Route::get('check','PageController@topProduct');
Route::get('postOrder',['as'=>'postOrder','uses'=>'PageController@postOrder']);
Route::get('getChitietsanpham/{id}',['as'=>'getChitietsanpham','uses'=>'PageController@chiTietSanPham']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');