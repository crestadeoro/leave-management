<?php

namespace App\Http\Controllers;

use App\Ppe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;

class PpeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    /*

    |--------------------------------------------------------------------------

    | Add PPE Page

    |--------------------------------------------------------------------------

    */

    public function indexPpe(Employee $id)

    {

        $Employee = $this->getEmployeeDetail($id->id);



        return view('employee.ppe.add-ppe', [

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

    | Save PPE Details From Database

    |--------------------------------------------------------------------------

    */    

    public function SavePpe(Employee $id)
    {
        request()->validate([

            'quantity' 		        => 	'required',

            'date_issued' 		    => 	'required',

            'item' 		            => 	'required'

        ]);

        
    	DB::table('ppes')->insert([

            'employee_id' => $id->id,

            'quantity' => request('quantity'),

            'date_issued' => request('date_issued'),

            'item' => request('item'),

        ]);

        
        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee PPE successfully saved!');
    }

    /*

    |--------------------------------------------------------------------------

    | Edit PPE Page

    |--------------------------------------------------------------------------

    */

    public function editPpe(Ppe $id)

    {

        $Ppe = $this->getEmployeePpe($id->id);

                          

        $EmployeeName = strtoupper($Ppe->lastname.', '.$Ppe->firstname.' '.$Ppe->middlename);               



        return view('employee.ppe.edit-ppe', [

            'Ppe' => $Ppe,

            'EmployeeName' => $EmployeeName

        ]);       

    }

    /*

    |--------------------------------------------------------------------------

    | Update Employee PPE

    |--------------------------------------------------------------------------

    */



    public function updatePpe(Ppe $id)

    {

        $Ppe = $this->getEmployeePpe($id->id);



        request()->validate([

            'quantity' 		        => 	'required',

            'date_issued' 		    => 	'required',

            'item' 		            => 	'required'

        ]);

        

        $id->update(request([

            'quantity',

            'date_issued',

            'item'

        ]));



        return redirect()->action('EmployeeController@viewEmployee', $Ppe->employee_id)->with('success', 'Employee PPE successfully updated!');

    }    

    /*

    |--------------------------------------------------------------------------

    | Fetch Individual Employee PPE

    |--------------------------------------------------------------------------

    */    



    public function getEmployeePpe($id)

    {

        $Ppe = DB::table('ppes')

                        ->join('employees', 'employees.id', '=', 'ppes.employee_id')

                        ->where('ppes.id', '=', $id)

                        ->select(

                            'employees.firstname',

                            'employees.middlename',

                            'employees.lastname',

                            'ppes.id',

                            'ppes.employee_id',

                            'ppes.item',

                            'ppes.quantity',

                            'ppes.date_issued'

                        )->first();



        return $Ppe;

    }
}
