<?php

namespace App\Http\Controllers;

use App\EmployeeDependentDetail;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeDependentDetailController extends Controller
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
    |
    | Add Dependent Page
    | 
    |--------------------------------------------------------------------------
    */

    public function indexDependent(Employee $id)
    {
        return view('/employee/employee-dependent', [
            'id' => $id->id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Save Dependent Page
    | 
    |--------------------------------------------------------------------------
    */

    public function saveDependent(Employee $id)
    {
        request()->validate([
            'dependent_name'        => 'required',
            'dependent_birthdate'   =>  'required'
        ]);

        $name = request('dependent_name');
        $birthdate = request('dependent_birthdate'); 

        DB::insert('insert into employee_dependent_details (employee_id, dependent_name, dependent_birthdate) values (?, ?, ?)', [$id->id, $name, $birthdate]);

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee Dependent Detail successfully updated!');
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Edit Dependent Page
    | 
    |--------------------------------------------------------------------------
    */

    public function editDependent(EmployeeDependentDetail $id)
    {
        $dependent = EmployeeDependentDetail::where('id', $id->id)->first();

        return view('/employee/edit-dependent', [
            'dependent' => $dependent
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Update Dependent Page
    | 
    |--------------------------------------------------------------------------
    */

    public function updateDependent(EmployeeDependentDetail $id)
    {
        request()->validate([
            'dependent_name'        => 'required',
            'dependent_birthdate'   => 'required'
        ]);

        $id->update(request([
            'dependent_name',
            'dependent_birthdate'
        ]));

        return redirect()->action('EmployeeController@viewEmployee', $id->employee_id)->with('success', 'Employee Dependent Detail successfully updated!');
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Delete Dependent Page
    | 
    |--------------------------------------------------------------------------
    */

    public function deleteDependent(EmployeeDependentDetail $id)
    {
        EmployeeDependentDetail::where('id', $id->id)->update([
            'is_active' => 'deleted'
        ]);

        return redirect()->action('EmployeeController@viewEmployee', $id->employee_id)->with('success', 'Employee Dependent Detail successfully deleted!');
    }
}
