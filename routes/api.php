<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('question','QuestionController');
Route::apiResource('category','CategoryController');
Route::apiResource('question/{question}/reply','ReplyController');

Route::post('like/{reply}','LikeController@likeIt');
Route::delete('like/{reply}','LikeController@unLikeIt');

Route::group([

  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {

  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('register', 'AuthController@signup');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');

});