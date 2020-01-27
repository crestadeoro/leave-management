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
        $Division = $this->getDivision();
        $Position = $this->getPosition();
		
    	return view('employee.add-employee', [
			'Division' => $Division,
			'Position' => $Position
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
                                    'employees.id',
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

    /*
    |--------------------------------------------------------------------------
    | View Employee Detail Page
    |--------------------------------------------------------------------------
    */

    public function viewEmployee(Employee $id)
    {
        $Employee = $this->getEmployeeDetail($id->id);
        
        return view('employee/view-employee', [
            'Employee' => $Employee
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Fetch Employee Detail From Database
    |--------------------------------------------------------------------------
    */
    
    public function getEmployeeDetail($id)
    {
		$Employee = DB::table('employees')
								->join('divisions', 'employees.id', '=', 'divisions.id')
								->join('positions', 'employees.id', '=', 'positions.id')
								->select(
                                    'employees.id',
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
                                ->first();
                                
        return $Employee;
    }

    /*
    |--------------------------------------------------------------------------
    | Fetch Division From Database
    |--------------------------------------------------------------------------
    */

    public function getDivision()
    {
        $Division = Division::all();

        return $Division;
    }

    /*
    |--------------------------------------------------------------------------
    | Fetch Position From Database
    |--------------------------------------------------------------------------
    */

    public function getPosition()
    {
        $Position = Position::all();

        return $Position;
    }
}
