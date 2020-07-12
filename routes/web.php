<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    try {
        Fitbit::activities()->activity()->getLifetimeStats();
    } catch (Exception $e) {
        return redirect(Fitbit::getAuthUri());
    }
    return view('welcome');
});

Route::get('/authorize', function () {
    $code = request()->input('code');
    Fitbit::setAuthorizationCode($code);
    try {
        dump('uno');
        Fitbit::activities()->activity()->getLifetimeStats();
    } catch (Exception $e) {
        dd('a la mierda');
    }
    return view('welcome');
});
