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
Route::get('/employee/edit-employee/{id}', 'EmployeeController@editEmployee');
Route::patch('/employee/update-employee/{id}', 'EmployeeController@updateEmployee');
Route::post('/employee/remove-duplicate/{id}', 'EmployeeController@removeDuplicateEmployee');

/*
|--------------------------------------------------------------------------
| Position
|--------------------------------------------------------------------------
*/

Route::get('/position/position', 'PositionController@indexPosition');
Route::post('/position/save-position', 'PositionController@savePosition');
Route::get('/position/edit-position/{id}', 'PositionController@editPosition');
Route::patch('/position/update-position/{id}', 'PositionController@updatePosition');

/*
|--------------------------------------------------------------------------
| Division
|--------------------------------------------------------------------------
*/

Route::get('/division/division', 'DivisionController@indexDivision');
Route::post('/division/save-division', 'DivisionController@saveDivision');
Route::get('/division/edit-division/{id}', 'DivisionController@editDivision');
Route::patch('/division/update-division/{id}', 'DivisionController@updateDivision');

/*
|--------------------------------------------------------------------------
| Leave
|--------------------------------------------------------------------------
*/

Route::get('/employee/leave/add-leave/{id}', 'LeaveController@indexLeave');
Route::post('/employee/leave/save-leave/{id}', 'LeaveController@saveLeave');
Route::get('/employee/leave/edit-leave/{id}', 'LeaveController@editLeave');
Route::patch('/employee/leave/update-leave/{id}', 'LeaveController@updateLeave');

/*
|--------------------------------------------------------------------------
| Leave Summary
|--------------------------------------------------------------------------
*/

Route::get('/leave-summary', 'LeaveController@summaryLeave');

/*
|--------------------------------------------------------------------------
| Report
|--------------------------------------------------------------------------
*/

Route::get('/report/master-list', 'ReportController@employeeReport');