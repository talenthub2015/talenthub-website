<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 09-02-2016
 * Time: 23:12
 */

Route::group(['middleware' => ['auth_manager'],'prefix'=>'manager'],function(){

    Route::get('/','ManagerApp\ManagerProfileController@index');
});