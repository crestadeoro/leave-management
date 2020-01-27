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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Employee
|--------------------------------------------------------------------------
*/

Route::get('/employee/add-employee', 'EmployeeController@indexEmployee');
Route::post('/employee/save-employee', 'EmployeeController@saveEmployee');
Route::get('/employee/list-employee', 'EmployeeController@listEmployee');
Route::get('/employee/view-employee/{id}', 'EmployeeController@viewEmployee');

/*
|--------------------------------------------------------------------------
| Position
|--------------------------------------------------------------------------
*/

Route::get('/employee/position', 'PositionController@indexPosition');
Route::post('/employee/save-position', 'PositionController@savePosition');

/*
|--------------------------------------------------------------------------
| Division
|--------------------------------------------------------------------------
*/

Route::get('/employee/division', 'DivisionController@indexDivision');
Route::post('/employee/save-division', 'DivisionController@saveDivision');