<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Position;
use App\Division;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Add Employee Page
    |--------------------------------------------------------------------------
    */

    public function indexEmployee()
    {
		$division = Division::all();
		$position = Position::all();
		
    	return view('employee.add-employee', [
			'Division' => $division,
			'Position' => $position
		]);
    }

    /*
    |--------------------------------------------------------------------------
    | Save Employee Details
    |--------------------------------------------------------------------------
    */

    public function saveEmployee()
    {
        request()->validate([
            'employee_id' 		=> 	'required',
            'firstname' 		=> 	'required',
            'lastname' 		    => 	'required',
            'birthday' 		    => 	'required',
            'date_hired' 		=> 	'required',
            'division' 		    => 	'required',
            'position' 		    => 	'required'		
        ]);
        
    	$data = Employee::create(request([
            'employee_id',
            'firstname',
            'middlename',
            'lastname',
            'birthday',
            'date_hired',
            'division',
            'position'
        ]));
        
        return redirect()->action('EmployeeController@indexEmployee')->with('success', 'New Employee successfully saved!');
    }

    /*
    |--------------------------------------------------------------------------
    | Employee List Page
    |--------------------------------------------------------------------------
    */    

    public function listEmployee()
    {
		$EmployeeDetail = DB::table('employees')
								->join('divisions', 'employees.id', '=', 'divisions.id')
								->join('positions', 'employees.id', '=', 'positions.id')
								->select(
                                    'employees.employee_id',
                                    'employees.firstname',
                                    'employees.middlename',
                                    'employees.lastname',
                                    'employees.birthday',
                                    'employees.date_hired',
                                    'employees.status',
                                    'divisions.division',
                                    'positions.position'
								)
								->get();
		
    	return view('employee/list-employee', [
    		'EmployeeDetail' => $EmployeeDetail
    	]);       
    }
}
