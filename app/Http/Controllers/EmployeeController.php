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
            'position' 		    => 	'required',
            'status'            =>  'required'
        ]);
        
    	$data = Employee::create(request([
            'employee_id',
            'firstname',
            'middlename',
            'lastname',
            'birthday',
            'date_hired',
            'division',
            'position',
            'status'
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
								->join('divisions', 'employees.division', '=', 'divisions.id')
								->join('positions', 'employees.position', '=', 'positions.id')
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

        $Leave = $this->getEmployeeLeave($id->id);
        
        return view('employee/view-employee', [
            'Employee' => $Employee,
            'Leave' => $Leave
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Employee Page
    |--------------------------------------------------------------------------
    */

    public function editEmployee(Employee $id)
    {
        $Employee = $this->getEmployeeDetail($id->id);
        $Division = $this->getDivision();
        $Position = $this->getPosition();

        return view('employee/edit-employee', [
            'Employee' => $Employee,
            'Division' => $Division,
            'Position' => $Position
        ]);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Update Employee Detail
    |--------------------------------------------------------------------------
    */   
    
    public function updateEmployee(Employee $id)
    {
        request()->validate([
            'employee_id'       => 'required',
            'firstname'         => 'required',
            'middlename'        => 'required',
            'lastname'          => 'required',
            'birthday'          => 'required',
            'date_hired'        => 'required',
            'division'          => 'required',
            'position'          => 'required'
        ]);

        $id->update(request([
            'employee_id',
            'firstname',
            'middlename',
            'lastname',
            'birthday',
            'date_hired',
            'division',
            'position',
            'status'         
        ]));

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee Detail successfully updated!');
    }

    /*
    |--------------------------------------------------------------------------
    | Fetch Employee Detail From Database
    |--------------------------------------------------------------------------
    */
    
    public function getEmployeeDetail($id)
    {
		$Employee = DB::table('employees')
								->join('divisions', 'employees.division', '=', 'divisions.id')
                                ->join('positions', 'employees.position', '=', 'positions.id')
                                ->where('employees.id', '=', $id)
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
    | Fetch Employee Leave From Database
    |--------------------------------------------------------------------------
    */
    
    public function getEmployeeLeave($id)
    {
		$Leave = DB::table('leaves')
                                ->where('leaves.employee_id', '=', $id)
								->select(
                                    'leaves.date_from',
                                    'leaves.date_to',
                                    'leaves.category'
								)
                                ->get();
                                
        return $Leave;
    }    

    /*
    |--------------------------------------------------------------------------
    | Fetch Division From Database
    |--------------------------------------------------------------------------
    */

    public function getDivision()
    {
        $Division = Division::orderBy('division', 'asc')->get();

        return $Division;
    }

    /*
    |--------------------------------------------------------------------------
    | Fetch Position From Database
    |--------------------------------------------------------------------------
    */

    public function getPosition()
    {
        $Position = Position::orderBy('position', 'asc')->get();

        return $Position;
    }
}
