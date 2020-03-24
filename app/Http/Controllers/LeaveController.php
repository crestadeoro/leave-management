<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Leave;
use App\Position;
use App\Division;

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

    /*
    |--------------------------------------------------------------------------
    | Leave Summary
    |--------------------------------------------------------------------------
    */

    public function summaryLeave()
    {
        $LeaveSummary = $this->getLeaveSummary();

        //dd($LeaveSummary);

        return view('employee.leave-summary', [
            'LeaveSummary' => $LeaveSummary
        ]);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Fetch Leave Summary
    |--------------------------------------------------------------------------
    */   

    public function getLeaveSummary()
    {
		$LeaveSummary = DB::table('employees')
								->join('divisions', 'employees.division', '=', 'divisions.id')
                                ->join('positions', 'employees.position', '=', 'positions.id')
                                ->join('leaves', 'employees.id', '=', 'leaves.employee_id')
                                ->where('leaves.category', '=', 'paid')
                                ->whereBetween('leaves.date_from', array('2020-01-01', '2020-03-15'))
                                ->whereBetween('leaves.date_to', array('2020-01-01', '2020-03-15'))
								->select(
                                    'employees.firstname',
                                    'employees.middlename',
                                    'employees.lastname',
                                    'divisions.division',
                                    'positions.position',
                                    'leaves.date_from',
                                    'leaves.date_to',
                                    'leaves.category'
								)
                                ->get();
                                
        return $LeaveSummary;
    }
}
