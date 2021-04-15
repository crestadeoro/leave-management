<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Employee;

use App\Position;

use App\Division;

use App\EmployeePersonContact;

use Carbon\Carbon;



class EmployeeController extends Controller

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

			'employee_id' 		=> 	'required|unique:employees',

            'firstname' 		=> 	'required',

            'lastname' 		    => 	'required',

            'birthday' 		    => 	'required',

            'address' 		    => 	'required',

            'gender' 		    => 	'required',
            
            'civil_status' 		=> 	'required',

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

            'civil_status',

            'email_address',

            'telephone_number',

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



        $Ppe = $this->getEmployeePpe($id->id);



        $Age = $this->ageCalculator($id->birthday);

        
        $Relative = $this->getRelativeDetail($id->id);


        $Dependent = $this->getDependentDetail($id->id);


        $Contact = $this->getContactDetail($id->id);
        
        if($Relative == null)
        {
            $MotherMaidenName = "";
            $MotherOccupation = "";
            $MotherCompany = "";
            
            $FatherName = "";
            $FatherOccupation = "";
            $FatherCompany = "";

            $SpouseName = "";
            $SpouseOccupation = "";
            $SpouseCompany = "";
        }    
        else
        {
            $MotherMaidenName = $Relative->mother_maiden_name;
            $MotherOccupation = $Relative->mother_occupation;
            $MotherCompany = $Relative->mother_name_of_company;
            
            $FatherName = $Relative->father_name;
            $FatherOccupation = $Relative->father_occupation;
            $FatherCompany = $Relative->father_name_of_company;

            $SpouseName = $Relative->spouse_name;
            $SpouseOccupation = $Relative->spouse_occupation;
            $SpouseCompany = $Relative->spouse_name_of_company;
        }

        if($Contact == null)
        {
            $contact_person = "";
            $contact_number = "";
            $address = "";
            $relationship = "";
        }
        else
        {
            $contact_person = $Contact->contact_person;
            $contact_number = $Contact->contact_number;
            $address = $Contact->address;
            $relationship = $Contact->relationship;
        }

        return view('employee/view-employee', [

            'Employee' => $Employee,

            'Leave' => $Leave,

            'Age' => $Age,

            'Ppe' => $Ppe,

            'MotherMaidenName' => $MotherMaidenName,

            'MotherOccupation' => $MotherOccupation,

            'MotherCompany' => $MotherCompany,

            'FatherName' => $FatherName,

            'FatherOccupation' => $FatherOccupation,

            'FatherCompany' => $FatherCompany,

            'SpouseName' => $SpouseName,

            'SpouseOccupation' => $SpouseOccupation,

            'SpouseCompany' => $SpouseCompany,

            'Dependents' => $Dependent,

            'contact_person'      => $contact_person,
            'contact_number'      => $contact_number,
            'address'      => $address,
            'relationship'      => $relationship

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

	             'employee_id' 		=> 	'required',

                'firstname' 		=> 	'required',

                'lastname' 		    => 	'required',

                'birthday' 		    => 	'required',

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

            'civil_status',

            'address',

            'email_address',

            'telephone_number',

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

            $timestamp = now();



            $EmployeeStatus = Employee::where('id', $id->id)

                                    ->update([

                                            'status' => $status,

                                            'status_updated_at' => $timestamp

                                            ]);                       

                                    

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

    | Add Employee Payroll Detail

    |--------------------------------------------------------------------------

    */    



    public function addPayrollDetail(Employee $id)

    {

        $Employee = $this->getEmployeeDetail($id->id);



        return view('employee.payroll.add-payroll-detail', [

            'Employee' => $Employee

        ]);

    }



    /*

    |--------------------------------------------------------------------------

    | Save Employee Payroll Detail

    |--------------------------------------------------------------------------

    */  

    

    public function savePayrollDetail(Employee $id)

    {

        $id->update(request([

            'bank_name',

            'bank_account',

            'basic_rate',

            'rata',

            'pera',

            'meal_allowance',

            'project_allowance'

        ]));

        

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Payroll Detail successfully updated!');

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

                                    'employees.civil_status',

                                    'employees.email_address',

                                    'employees.telephone_number',

                                    'employees.date_hired',

                                    'employees.sss',

                                    'employees.philhealth',

                                    'employees.hdmf',

                                    'employees.tin',
                                    
                                    'employees.place_of_birth',

                                    'employees.citizenship',

                                    'employees.religion',

                                    'employees.height',

                                    'employees.weight',

                                    'employees.blood_type',

                                    'employees.hair_color',

                                    'employees.status',

                                    'employees.status_updated_at',

                                    'employees.bank_name',

                                    'employees.bank_account',

                                    'employees.basic_rate',

                                    'employees.rata',

                                    'employees.pera',

                                    'employees.meal_allowance',

                                    'employees.project_allowance',

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

                                ->where('category', '!=', 'deleted')

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

    | Fetch Employee PPE From Database

    |--------------------------------------------------------------------------

    */

    

    public function getEmployeePpe($id)

    {

        $Ppe = DB::table('ppes')

                                ->orderBy('date_issued', 'desc')

                                ->where('employee_id', '=', $id)

								->select(

                                    'id',

                                    'quantity',

                                    'date_issued',

                                    'item'

								)

                                ->get();

                                

        return $Ppe;

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
    
    
    /*

    |--------------------------------------------------------------------------

    | Fetch Employee Relative Detail From Database

    |--------------------------------------------------------------------------

    */

    public function getRelativeDetail($id)
    {
        $Relative = DB::table('employee_relative_details')
                        ->where('employee_id', '=', $id)
                        ->select
                        (
                            'mother_maiden_name',
                            'mother_occupation',
                            'mother_name_of_company',
                            'father_name',
                            'father_occupation',
                            'father_name_of_company',
                            'spouse_name',
                            'spouse_occupation',
                            'spouse_name_of_company'
                        )
                        ->first();

        return $Relative;
    }

    /*

    |--------------------------------------------------------------------------

    | Fetch Employee Dependent Detail From Database

    |--------------------------------------------------------------------------

    */

    public function getDependentDetail($id)
    {
            $Dependent = DB::table('employee_dependent_details')
            ->where('employee_id', '=', $id)
            ->where('is_active', '!=', 'deleted')
            ->select
            (
                'id',
                'dependent_name',
                'dependent_birthdate'
            )
            ->get();

        return $Dependent;
    }

    /*

    |--------------------------------------------------------------------------

    | Fetch Person to contact detail

    |--------------------------------------------------------------------------

    */

    public function getContactDetail($id)
    {
        $Contact = EmployeePersonContact::where('employee_id', $id)
                    ->first();

        return $Contact;
    }

    /*

    |--------------------------------------------------------------------------

    | Edit Other Detail Page

    |--------------------------------------------------------------------------

    */

    public function editOther(Employee $id)
    {
        $other = $this->getOtherDetails($id->id);
        
        return view('/employee/edit-other', [
            'id' => $id->id,
            'other' => $other
        ]);
    }

    /*

    |--------------------------------------------------------------------------

    | Fetch Other Detail

    |--------------------------------------------------------------------------

    */

    public function getOtherDetails($id)
    {
        $other = Employee::where('id', $id)
                            ->select(
                                'place_of_birth',
                                'citizenship',
                                'religion',
                                'height',
                                'weight',
                                'blood_type',
                                'hair_color'
                            )
                            ->first();

        return $other;
    }

    /*

    |--------------------------------------------------------------------------

    | Save Other Detail

    |--------------------------------------------------------------------------

    */

    public function saveOther(Employee $id)
    {
        $id->update(request([
            'place_of_birth',
            'citizenship',
            'religion',
            'height',
            'weight',
            'blood_type',
            'hair_color'
        ]));

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Employee Other Detail successfully updated!');
    }
}

