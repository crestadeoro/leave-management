<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Leave;

class LeaveController extends Controller
{
    public function indexLeave(Employee $id)
    {
        $Employee = $this->getEmployeeDetail($id->id);

        return view('employee.add-leave', [
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
                                ->where('employees.id', '=', $id)
								->select(
                                    'employees.id',
                                    'employees.firstname',
                                    'employees.middlename',
                                    'employees.lastname'
								)
                                ->first();
                                
        return $Employee;
    }
    
    /*
    |--------------------------------------------------------------------------
    | Save Employee Details
    |--------------------------------------------------------------------------
    */

    public function saveLeave(Employee $id)
    {
        request()->validate([
            'date_from' 		=> 	'required',
            'date_to' 		    => 	'required',
            'category' 		    => 	'required'
        ]);
        
    	DB::table('leaves')->insert([
            'employee_id' => $id->id,
            'date_from' => request('date_from'),
            'date_to' => request('date_to'),
            'category' => request('category'),
        ]);
        
        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee leave successfully saved!');
    }    
}
