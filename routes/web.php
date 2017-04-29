<?php


//home
Route::get('/home', ['uses'=>'\CareerBind\Http\Controllers\HomeController@index','as'=>'home']);
Route::get('/', ['uses'=>'\CareerBind\Http\Controllers\HomeController@index','as'=>'home1']);



//signup
Route::get('/signup', ['uses'=>'\CareerBind\Http\Controllers\AuthController@getSignup','as'=>'auth.signup','middleware'=>['guest']]);

Route::post('/signup', ['uses'=>'\CareerBind\Http\Controllers\AuthController@postSignup']);

//signin

Route::get('/signin', ['uses'=>'\CareerBind\Http\Controllers\AuthController@getSignin','as'=>'auth.signin','middleware'=>['guest']]);

Route::post('/signin', ['uses'=>'\CareerBind\Http\Controllers\AuthController@postSignin']);
//signout
Route::get('/signout', ['uses'=>'\CareerBind\Http\Controllers\AuthController@getSignout','as'=>'auth.signout']);
//search
Route::get('/search', ['uses'=>'\CareerBind\Http\Controllers\SearchController@getResults','as'=>'search.results']);

//profile
Route::get('/user/{username}', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@getProfile','as'=>'profile.index','middleware'=>['auth']]);

Route::get('/profile/edit', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@getEdit','as'=>'profile.edit'])->middleware('auth');
Route::post('/profile/edit', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@postEdit',]);
Route::get('/settings', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@settingsGet','as'=>'settings.get'])->middleware('auth');
Route::get('/password/edit', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@getPasswordEdit','as'=>'password.edit'])->middleware('auth');
Route::post('/password/edit', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@postPasswordEdit',]);
//friends
Route::get('/friends', ['uses'=>'\CareerBind\Http\Controllers\FriendsController@getIndex','as'=>'friends.index','middleware'=>['auth']]);
Route::get('/friends/add/{username}', ['uses'=>'\CareerBind\Http\Controllers\FriendsController@getAdd','as'=>'friends.add','middleware'=>['auth']]);
Route::get('/friends/accept/{username}', ['uses'=>'\CareerBind\Http\Controllers\FriendsController@getAccept','as'=>'friends.accept','middleware'=>['auth']]);
Route::get('/friends/delete/{username}', ['uses'=>'\CareerBind\Http\Controllers\FriendsController@getDelete','as'=>'friends.delete','middleware'=>['auth']]);
//statuses
Route::post('/status', ['uses'=>'\CareerBind\Http\Controllers\StatusController@postStatus','as'=>'status.post','middleware'=>['auth']]);
Route::post('/status/{statusId}/reply', ['uses'=>'\CareerBind\Http\Controllers\StatusController@postReply','as'=>'status.reply','middleware'=>['auth']]);
Route::get('/status/{statusId}/like', ['uses'=>'\CareerBind\Http\Controllers\StatusController@getLike','as'=>'status.like','middleware'=>['auth']]);
Route::get('/resumes/{username}', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@viewResume','as'=>'resume.view'])->middleware('auth');
Route::get('/resume/edit', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@getResume','as'=>'resume.edit'])->middleware('auth');
Route::post('/resume/edit', ['uses'=>'\CareerBind\Http\Controllers\ProfileController@postResume',]);

