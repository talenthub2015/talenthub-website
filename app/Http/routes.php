<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

include_once('admin_routes.php');

Route::get('/', 'WelcomeController@index');
Route::get('sign_up', 'WelcomeController@signUp');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Static Pages

Route::get("about",function(){
    return view('static.about_us');
});
Route::get("contact",function(){
    return view('static.contact_us');
});
Route::get('FAQ',function(){
    return view('static.FAQ');
});
Route::get('pro-process-help',function(){
    return view('static.professional_process_help');
});
Route::get('scholarship-process',function(){
    return view('static.scholarship_process');
});
Route::get('user-agreement',function(){
    return view('static.user_agreement');
});

//Only Accessed By Authenticated user
Route::group(['middleware' => ['auth']],function(){


    /////////////////////////////////////////////
    /////////   User Settings      //////////////
    ////////////////////////////////////////////

    Route::get('settings/privacy','SettingsController@privacySettings');
    Route::put('settings/privacy','SettingsController@updatePrivacySettings');

    Route::get('settings/general','SettingsController@generalSettings');
    Route::put('settings/general','SettingsController@updateGeneralSettings');

    /////////////////////////////////////////////
    /////////   User Settings      //////////////
    ////////////////////////////////////////////

    //Registering and completing Profile - For Talent and Managers
    Route::get('profile/edit','ProfileController@edit');
    Route::get('profile/editCV','ProfileController@editCV');
    Route::get('profile/completed','ProfileController@completed');
    Route::put('profile/edit/{id}','ProfileController@update');
    Route::put('profile/CV','ProfileController@updateCV');

    //Showing Own Profile - For Talent and Manager
    Route::get("profile","ProfileController@index");

    //Showing a user Profile - as viewed by other user
    Route::get("profile/{id}",'ProfileController@showUserProfile');
    Route::get('profile/{id}/evangelists','ProfileController@allEvangelists');

    //Getting and saving data from user's profile - For talent and manager
    Route::put('profile/uploadProfileImage','ProfileController@uploadImage');
    Route::put('profile/updateProfileData','ProfileController@updateProfileData');
    Route::put('profile/profileSummary','ProfileController@updateProfileSummary');

    //Show User CV - For Talent and Manager
    Route::get('profile/{id}/curriculumvitae','ProfileController@viewCV');
    //Videos Page
    Route::get('profile/{id}/videos','VideoController@index');
    Route::post('profile/videos','VideoController@store');
    //Images Page
    Route::get('profile/{id}/Images','ImageController@index');
    Route::post('profile/Images','ImageController@store');

    //Favoutires Page
    Route::get('profile/{id}/favourites','ProfileController@showFavourites');
    Route::get('profile/{id}/favouritedYou','ProfileController@showWhoFavouritedYou');

    //Database Page
    Route::get('database','DatabaseController@index');
    Route::get('database/talent-opportunities/{state?}/{institution_tye?}/{gender?}/{sport_type?}/{country?}','DatabaseController@talentOpportunities');

    //Searching Database for Opportunities
    Route::post('database/searchOpportunities','DatabaseController@searchOpportunities');

    //Talent Contacting Manager
    Route::post('database/contactManager','DatabaseController@contactManager');


    //Notification Read by a user
    Route::post('profile/notificationRead','ProfileController@notificationReadByUser');

    ///////////////////////
    //  Talent Pages    //
    //////////////////////
    Route::get('request-recommendation','RecommendationController@index');
    Route::post('request-recommendation','RecommendationController@request');

    //For Talents - Saving Awards, Endorsements and favouriting
    Route::put('profile/profileAwards','ProfileController@updateProfileAwards');
    Route::put('profile/endorseUser','ProfileController@endorseUser');
    Route::put('profile/favourite','ProfileController@favouriteUser');



    ///////////////////////
    //  Manager Pages   //
    //////////////////////




    //////////////////////
    /// Messages Pages //
    /////////////////////
    Route::get('messages','MessageController@index');
    Route::get('sentMessages','MessageController@sentMessages');
    Route::get('viewMessage/{message_id}',['as'=>'viewMessage', 'uses'=>'MessageController@viewMessage']);

    //Sending Message to a user
    Route::put('profile/sendMessage','MessageController@sendMessage');
    Route::post('reply-forward-Message','MessageController@replyOrForwardMessage');
    Route::put('moveTrash','MessageController@moveToTrash');




});

/////////////////////////////
//// User's Outside Site ////
////////////////////////////
Route::get('external/user/recommendation',"RecommendationController@recommendationForm");
Route::put('external/user/post-recommendation',"RecommendationController@saveRecommendation");