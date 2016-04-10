<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 20-02-2016
 * Time: 23:46
 */

//API Routes for General Operations
Route::group(['prefix'=>'api/general'],function(){
    Route::get('/basic-site-constants','WebApi\General\BasicSiteController@getBasicSiteConstants');
    Route::get('/list-of-sports','WebApi\General\BasicSiteController@getListOfSports');
});

//API Routes for Managers
Route::group(['prefix'=>'api/manager','middleware'=>['auth_manager']],function(){

    Route::get('/profile','WebApi\Manager\ManagerProfileController@getProfileData');
    Route::post('/updateProfile','WebApi\Manager\ManagerProfileController@updateProfile');
    Route::post('/updateCareerHistory','WebApi\Manager\ManagerCareerHistoryController@updateCareerHistory');
    Route::get('/getCareerHistory','WebApi\Manager\ManagerCareerHistoryController@getCareerHistory');

});