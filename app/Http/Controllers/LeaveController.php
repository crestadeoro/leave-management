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
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

    public function indexLeave(Employee $id)

    {

        $Employee = $this->getEmployeeDetail($id->id);



        return view('employee.leave.add-leave', [

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

    | Save Employee Leave

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

    | Edit Employee Leave Page

    |--------------------------------------------------------------------------

    */      



    public function editLeave(Leave $id)

    {

        $Leave = $this->getEmployeeLeave($id->id);

                          

        $EmployeeName = strtoupper($Leave->lastname.', '.$Leave->firstname.' '.$Leave->middlename);               



        return view('employee.leave.edit-leave', [

            'Leave' => $Leave,

            'EmployeeName' => $EmployeeName

        ]);       

    }



    /*

    |--------------------------------------------------------------------------

    | Update Employee Leave

    |--------------------------------------------------------------------------

    */



    public function updateLeave(Leave $id)

    {

        $Leave = $this->getEmployeeLeave($id->id);



        request()->validate([

            'date_from' 		=> 	'required',

            'date_to' 		    => 	'required',

            'category' 		    => 	'required'

        ]);

        

        $id->update(request([

            'date_from',

            'date_to',

            'category'

        ]));



        return redirect()->action('EmployeeController@viewEmployee', $Leave->employee_id)->with('success', 'Employee Leave successfully updated!');

    }



    /*

    |--------------------------------------------------------------------------

    | Fetch Individual Employee Leave

    |--------------------------------------------------------------------------

    */    

    public function getEmployeeLeave($id)

    {

        $Leave = DB::table('leaves')

                        ->join('employees', 'employees.id', '=', 'leaves.employee_id')

                        ->where('leaves.id', '=', $id)

                        ->where('leaves.category', '!=', 'deleted')

                        ->select(

                            'employees.firstname',

                            'employees.middlename',

                            'employees.lastname',

                            'leaves.id',

                            'leaves.employee_id',

                            'leaves.date_from',

                            'leaves.date_to',

                            'leaves.category'

                        )->first();



        return $Leave;

    }



    /*

    |--------------------------------------------------------------------------

    | Leave Summary Page

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

    public function deleteLeave(Leave $id){
        
        Leave::where('id', $id->id)
                ->update(['category' => 'deleted']);

        return redirect()->action('EmployeeController@viewEmployee', $id->employee_id)->with('success', 'Employee Leave successfully deleted!');

    }

}

