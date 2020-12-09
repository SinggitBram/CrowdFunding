<?php

// use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });





Route::post('register', 'Auth\RegisterController');
Route::post('verification', 'Auth\VerificationOtpController');
Route::post('regenerate-otp', 'Auth\RegenerateOtpController');
Route::post('update-password', 'Auth\UpdatePasswordController');
Route::post('login', 'Auth\LoginController');


Route::middleware(['veriLoginMiddleware'])->group(function () {
    Route::get('profile/get-profile', 'ProfileController@show');
    Route::post('profile/update-profile', 'ProfileController@update');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'campaign',
], function () {
    Route::get('random/{count}', 'CampaignController@random');
    Route::post('store', 'CampaignController@store');
    Route::get('/', 'CampaignController@index');
    Route::get('/{id}', 'CampaignController@detail');
    Route::get('/search/{keyword}', 'CampaignController@search');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'blog',
], function () {
    Route::get('random/{count}', 'BlogController@random');
    Route::post('store', 'BlogController@store');
    // Route::get('/', 'BlogController@index');
    // Route::get('/{id}','BlogController@detail');
});
