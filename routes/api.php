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

Route::get('directions', function () {
    $from = request('from');
    $to = request('to');
    $key = "AIzaSyDIgQi3_cRoEo5cNbpd4Y_bqZclMbf--HU"; // env('GMAP_API_KEY');

    $query = http_build_query([
        'key' => $key,
        'origin' => $from,
        'destination' => $to,
        'mode' => 'driving',
        'language' => 'id'
    ]);

    $result = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?{$query}");

    return json_decode($result, true);
});