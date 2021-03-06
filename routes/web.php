<?php

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['web'])->group(function (){
    Route::redirect('/', '/admin');
    Route::prefix('admin')->group(function (){
        Route::get('/','DashboardController@index')->name('dashboard');
        Route::resources([
            'companies'=> 'CompanyController',
            'employees'=>'EmployeeController'
        ]);
        Auth::routes();
    });
});
//Route::get('/home', 'HomeController@index')->name('home');
