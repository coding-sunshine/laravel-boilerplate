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

Route::group(['middleware' => ['under-construction'],'prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('guest.welcome');

    Auth::routes(['verify' => true]);

    Route::middleware(['verified', 'auth', 'permitted'])->name('auth.')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        // Should go under super admin
        Route::get('/apm', '\Done\LaravelAPM\ApmController@index')->name('apm');
        // Test only permitted to superadmin and on local environment now
        Route::any('/test/{function?}', 'TestController@index')->name('test')->middleware('local');
    });
});
