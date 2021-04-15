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
Route::get('/employee/update-status/{id}/{status}', 'EmployeeController@updateEmployeeStatus');
Route::get('/employee/payroll/add-payroll-detail/{id}', 'EmployeeController@addPayrollDetail');
Route::post('/employee/payroll/save-payroll-detail/{id}', 'EmployeeController@savePayrollDetail');

Route::get('/employee/edit-other/{id}', 'EmployeeController@editOther');
Route::post('/employee/save-other/{id}', 'EmployeeController@saveOther');

/*
|--------------------------------------------------------------------------
| Employee Relative Details
|--------------------------------------------------------------------------
*/
Route::get('/employee/employee-relative/{id}', 'EmployeeRelativeDetailController@indexRelative');
Route::post('/employee/save-relative/{id}', 'EmployeeRelativeDetailController@saveRelative');

/*
|--------------------------------------------------------------------------
| Employee Dependent Details
|--------------------------------------------------------------------------
*/
Route::get('/employee/employee-dependent/{id}', 'EmployeeDependentDetailController@indexDependent');
Route::post('/employee/save-dependent/{id}', 'EmployeeDependentDetailController@saveDependent');\
Route::get('/employee/edit-dependent/{id}', 'EmployeeDependentDetailController@editDependent');
Route::post('/employee/update-dependent/{id}', 'EmployeeDependentDetailController@updateDependent');
Route::get('/employee/delete-dependent/{id}', 'EmployeeDependentDetailController@deleteDependent');

/*
|--------------------------------------------------------------------------
| Employee Person to Contact Details
|--------------------------------------------------------------------------
*/
Route::get('/employee/add-contact/{id}', 'EmployeePersonContactController@addContact');
Route::post('/employee/save-contact/{id}', 'EmployeePersonContactController@saveContact');

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
Route::get('/employee/leave/delete-leave/{id}', 'LeaveController@deleteLeave');

/*
|--------------------------------------------------------------------------
| PPE
|--------------------------------------------------------------------------
*/

Route::get('/employee/ppe/add-ppe/{id}', 'PpeController@indexPpe');
Route::post('/employee/ppe/save-ppe/{id}', 'PpeController@savePpe');
Route::get('/employee/ppe/edit-ppe/{id}', 'PpeController@editPpe');
Route::patch('/employee/ppe/update-ppe/{id}', 'PpeController@updatePpe');

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
Route::get('/report/leave', 'ReportController@employeeLeave');

/*
|--------------------------------------------------------------------------
| Setting
|--------------------------------------------------------------------------
*/

Route::get('/setting/user/add-user', 'SettingController@settingAddUser');
Route::post('/setting/user/save-user', 'SettingController@settingSaveUser');