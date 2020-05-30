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
//            'employee_id' 		=> 	'required',
            'firstname' 		=> 	'required',
            'lastname' 		    => 	'required',
//            'birthday' 		    => 	'required',
            'address' 		    => 	'required',
            'gender' 		    => 	'required',
            'date_hired' 		=> 	'required',
            'division' 		    => 	'required',
            'position' 		    => 	'required',
//            'sss' 		        => 	'required',
//            'philhealth' 		=> 	'required',
//            'hdmf' 		        => 	'required',
//            'tin' 		        => 	'required',
            'status'            =>  'required'
        ]);
        
    	$data = Employee::create(request([
            'employee_id',
            'firstname',
            'middlename',
            'lastname',
            'birthday',
            'gender',
            'address',
            'contact_number',
            'date_hired',
            'division',
            'position',
            'sss',
            'philhealth',
            'hdmf',
            'tin',
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
                                ->orderBy('employees.lastname', 'asc')
                                ->where('employees.status', '!=', 'resigned')
                                ->where('employees.status', '!=', 'removed')
								->select(
                                    'employees.id',
                                    'employees.employee_id',
                                    'employees.firstname',
                                    'employees.middlename',
                                    'employees.lastname',
                                    'employees.birthday',
                                    'employees.contact_number',
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

        $Age = $this->ageCalculator($id->birthday);
        
        return view('employee/view-employee', [
            'Employee' => $Employee,
            'Leave' => $Leave,
            'Age' => $Age
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
//              'employee_id' 		=> 	'required',
                'firstname' 		=> 	'required',
                'lastname' 		    => 	'required',
//               'birthday' 		    => 	'required',
                'address' 		    => 	'required',
                'gender' 		    => 	'required',
                'date_hired' 		=> 	'required',
                'division' 		    => 	'required',
                'position' 		    => 	'required',
//              'sss' 		        => 	'required',
//              'philhealth' 		=> 	'required',
//              'hdmf' 		        => 	'required',
//              'tin' 		        => 	'required',
                'status'            =>  'required'
        ]);

        $id->update(request([
            'employee_id',
            'firstname',
            'middlename',
            'lastname',
            'birthday',
            'gender',
            'address',
            'contact_number',
            'date_hired',
            'division',
            'position',
            'sss',
            'philhealth',
            'hdmf',
            'tin',
            'status'         
        ]));

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee Detail successfully updated!');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Employee Status
    |--------------------------------------------------------------------------
    */

    public function updateEmployeeStatus(Employee $id, $status)
    {
        if($status == 'resigned')
        {
            $EmployeeStatus = Employee::where('id', $id->id)
                                    ->update(['status' => $status]);                       

            return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee Status successfully updated!');
        } 
        else
        {
            $EmployeeStatus = Employee::where('id', $id->id)
                                    ->update(['status' => $status]);                        

            return redirect()->action('EmployeeController@listEmployee')->with('success', 'Employee successfully removed!');                        
        }
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
                                    'employees.address',
                                    'employees.gender',
                                    'employees.contact_number',
                                    'employees.date_hired',
                                    'employees.sss',
                                    'employees.philhealth',
                                    'employees.hdmf',
                                    'employees.tin',
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
                                ->orderBy('date_from', 'desc')
                                ->where('employee_id', '=', $id)
								->select(
                                    'id',
                                    'date_from',
                                    'date_to',
                                    'category'
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

	/*
	|---------------------------------------------------
	| Client Age Calculator
	|---------------------------------------------------
	*/
    public function ageCalculator($age)
    {	
		return $age = Carbon::parse($age)->age;
	}    
}
