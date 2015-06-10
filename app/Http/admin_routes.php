<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 10-06-2015
 * Time: 21:02
 */



Route::group(['prefix' => 'admin','middleware'=>['admin']],function(){

    Route::get('home','Admin\AdminController@index');
    Route::get('addManager','Admin\AdminController@addManager');

});