<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'] , function() {
    Route::post('image-upload/{recipeid}', 'Api\UploadApiController@apiRecipeStore')->name('apiRecipeStore');
    Route::post('cause', 'Api\CauseApiController@apiCauseStore')->name('apiCauseStore');
    Route::get('fetchtags/{id}', 'Api\CauseApiController@fetchTags')->name('fetchTags');
    Route::get('fetchalltags', 'Api\CauseApiController@fetchAllTags')->name('fetchAllTags');
    Route::post('apiamountstore', 'Api\CauseApiController@apiAmountStore')->name('apiAmountStore');
});
