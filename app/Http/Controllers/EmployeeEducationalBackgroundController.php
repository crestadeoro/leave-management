<?php

namespace App\Http\Controllers;

use App\EmployeeEducationalBackground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;

class EmployeeEducationalBackgroundController extends Controller
{
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

    /*
    |--------------------------------------------------------------------------
    | Add Employee Page
    |--------------------------------------------------------------------------
    */

    public function addEducation(Employee $id)
    {
        return view('/employee/employee-education', [
            'id' => $id->id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Save Employee Page
    |--------------------------------------------------------------------------
    */

    public function saveEducation(Employee $id)
    {
        request()->validate([
            'school_name' => 'required',
            'degree'    => 'required'
        ]);

        $school_name = request('school_name');
        $degree = request('degree');

        DB::insert('insert into employee_educational_backgrounds (employee_id, school_name, degree) values (?, ?, ?)', [$id->id, $school_name, $degree]);

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee Educational Backround Details successfully updated!');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Employee Educational Background Detail
    |--------------------------------------------------------------------------
    */

    public function deleteEducation(EmployeeEducationalBackground $id)
    {
        EmployeeEducationalBackground::where('id', $id->id)
                                    ->update([
                                        'is_active' => 'deleted'
                                    ]);

        return redirect()->action('EmployeeController@viewEmployee', $id->employee_id)->with('success', 'Employee Educational Backround Details successfully removed!');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Employee Educational Background Detail Page
    |--------------------------------------------------------------------------
    */

    public function editEducation(EmployeeEducationalBackground $id)
    {
        $education = EmployeeEducationalBackground::where('id', $id->id)->first();

        return view('/employee/edit-education', [
            'education' => $education
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Employee Educational Background Details
    |--------------------------------------------------------------------------
    */

    public function updateEducation(EmployeeEducationalBackground $id)
    {
        request()->validate([
            'school_name' => 'required',
            'degree'    => 'required'
        ]);

        $id->update(request([
            'school_name',
            'degree'
        ]));

        return redirect()->action('EmployeeController@viewEmployee', $id->employee_id)->with('success', 'Employee Educational Backround Details successfully updated!');
    }
}
