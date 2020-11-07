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
