<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 10-06-2015
 * Time: 21:02
 */



Route::group(['prefix' => 'admin','middleware'=>['admin']],function(){

    Route::get('home','Admin\AdminController@index');
    Route::get('viewManager/{name?}/{manager_type?}/{sport?}/{sport_gender?}/{state?}','Admin\AdminController@viewManagers');

    Route::get('addManager','Admin\AdminController@addManager');
    //Storing all the managers as provided in the input
    Route::post('addManagers','Admin\AdminController@storeManagers');
    //Searching Manager/Managers by submitting form
    Route::post('searchManagers','Admin\AdminController@searchManagers');

    Route::delete('deleteManager','Admin\AdminController@deleteManager');

});