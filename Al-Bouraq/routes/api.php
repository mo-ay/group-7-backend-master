<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
 * @Param #username #password
 * @return token
 */
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
/*
 * needs to move under middleware
 */
// families major info table apis
Route::resource('/families-major','FamiliesMajorInfoController');
Route::get('/families-major/{type}/{param}','FamiliesMajorInfoController@search');

Route::post('/families-major-edit', 'FamilyDonationHistoryController@edit');
Route::resource('/exceptional','ExceptionalFamiliesController');
Route::resource('/houseneed','HouseNeedsController');
Route::resource('/donations','DonationsController');
Route::resource('/house-type','HouseTypesController');

//FamiliesNgoRelationsController

   
//Children Info CRUD Routes
Route::resource('/children-info','ChildrenInfoController');

// husband status table apis
Route::resource('/husband-status','HusbandStatusesController');

//assign husband status to family
Route::resource('/fhstatuses','FamiliesHusbandStatusesController');

//familiesExclusiveInfo table
Route::resource('/fei','FamiliesExclusiveInfoController');
//familiesExclusiveInfo get by ID
Route::get('/fei/{id}','FamiliesExclusiveInfoController@show');

//NgoInfoInfo table
Route::resource('/ngo','NgoInfoController');
//NgoInfoInfo get by ID
//Route::get('/ngo/{id}','NgoInfoController@show');

//familyTypes table
Route::resource('/familyTypes','FamiliesTypesController');

//destroyFamilyAppointment
Route::Delete('/Delete-Appointment/{nextAppointment}/{id}','FamiliesMajorInfoController@destroyFamilyAppointment');
Route::post('/Appointment', 'AppointmentsController@store');
Route::post('/ngoInfo', 'FamiliesNgoRelationsController@store');
Route::post('/donation-history', 'FamilyDonationHistoryController@store');

Route::group(['middleware' => ['jwt.verify']], function() {

});

