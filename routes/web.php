<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as'   => 'login.custom'
]);


Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/home', 'LiveController@index')->name('home');

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile/{slug}', [
        'uses' => 'UserProfileController@index',
        'as'   => 'profile'
    ]);

    Route::get('/profile/edit', [
        'uses' => 'UserProfileController@edit',
        'as'   => 'profile.edit'
    ]);

    Route::get('/news', [
        'uses' => 'NewsController@index',
        'as'   => 'news'
    ]);

   
    Route::get('/news/{slug}', 'NewsController@getSinglePost');
    
    
    Route::get('/movies', [
        'uses' => 'VideosController@index',
        'as'   => 'movies'
    ]);

    Route::get('/movies/{url}', [
        'uses' => 'VideosController@movie',
        'as'   => 'movie'
    ]);
    
    Route::get('/settings', [
        'uses' => 'HomeController@settings',
        'as'   => 'settings'
    ]);
});


Route::group(['prefix' => 'admin'], function() {

        Route::resource('/posts', 'AdminBlogController');
        Route::resource('/postscategory', 'AdminPostsCategoryController');
        Route::resource('/channelscategory', 'AdminChannelsCategoryController');

        Route::resource('/videos', 'AdminVideosController');
        Route::get('/channels/channel_data', 'AdminChannelsController@channelData');
        Route::resource('/channels', 'AdminChannelsController');
        Route::resource('/sliders', 'AdminSlidersController');



        Route::post('/get_channels', 'AdminChannelsController@getChannels');
        Route::post('/create_video', 'AdminChannelsController@createVideo');
        Route::post('/create_channel', 'AdminChannelsController@createChannel');









});

