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
//

Route::group(['middleware'=>'locale'],function(){

Route::post('/locale','LocalizationController@index');
Route::get('/', function () {
//    return view('welcome');
    return redirect('/registeration');
});
//Route::get('/', function () {
//    return view('LandingPage');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'LangController@userProfile')->name('home');

    Route::get('/registeration', 'Auth\RegisterController@registerFrom');
Route::get('verifyEmail', 'Auth\RegisterController@verifyEmail')->name('verifyEmail');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@SendEmailDone')->name('SendEmailDone');

//Prfoile

Route::get('profile/{username}', 'ProfileController@profile');
Route::get('settings', 'ProfileController@settings');
Route::get('test', 'ProfileController@test');
Route::get('/settings/{id}','ProfileController@editPersonal');
Route::post('/settings/{id}','ProfileController@updatePersonal');
Route::get('editprofile','ProfileController@editProfile');
Route::post('editprofile','ProfileController@updateProfile');
//Route::post('changepassword1', 'ProfileController@cahngepassowrd');

//Posts

Route::get('/posts','PostController@posts');
Route::post('/post','PostController@store');
Route::post('/addpost','PostController@store');
Route::get('/image','PostController@image');
Route::post('/image1','PostController@image1');



    Route::resource("users",'UserController');
/////////////API Route
    Route::get('editProfile1', 'Api\Profile\ProfileController@editProfile');
    Route::patch('updateProfile', 'Api\Profile\ProfileController@updateProfile');
    Route::post('doSearch', 'Api\Profile\ProfileController@doSearch');

    Route::get('editPersonal', 'Api\Profile\ProfileController@editPersonal');
    Route::patch('updatePersonal', 'Api\Profile\ProfileController@updatePersonal');
    Route::get('langs', 'Api\Profile\ProfileController@lang');
    Route::patch('changePassword', 'Api\Profile\ProfileController@cahngePassowrd');


    Route::get('/friends/{user_id}', 'FriendCotroller@getIndex');
//Route::get('view', 'FriendCotroller@getIndex');
    Route::get('/friends/add/{username}', 'FriendCotroller@getAdd');
    Route::get('/friends/accept/{username}', 'FriendCotroller@getAccept');
    Route::get('/friends/reject/{username}', 'FriendCotroller@getReject');
    Route::get('/friends/cancel/{username}', 'FriendCotroller@getCancel');
//Route::get('/friends/cancel/{name}', 'FriendCotroller@cancelRequset');
    Route::post('friends/delete/{username}', 'FriendCotroller@deleteFriend');


});