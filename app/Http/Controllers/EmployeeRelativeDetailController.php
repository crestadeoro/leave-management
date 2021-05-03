<?php

namespace App\Http\Controllers;

use App\EmployeeRelativeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;

class EmployeeRelativeDetailController extends Controller
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
    | Employee Relative Detail
    | 
    |--------------------------------------------------------------------------
    */    

    public function indexRelative(Employee $id)
    {
        $Relative = $this->getRelativeDetail($id->id);
        
        if($Relative == null)
        {
            $MotherMaidenName = "";
            $MotherOccupation = "";
            $MotherCompany = "";
            $MotherContactNumber = "";
            
            $FatherName = "";
            $FatherOccupation = "";
            $FatherCompany = "";
            $FatherContactNumber = "";

            $SpouseName = "";
            $SpouseOccupation = "";
            $SpouseCompany = "";
            $SpouseContactNumber = "";
        }
        else
        {
            $MotherMaidenName = $Relative->mother_maiden_name;
            $MotherOccupation = $Relative->mother_occupation;
            $MotherCompany = $Relative->mother_name_of_company;
            $MotherContactNumber = $Relative->mother_contact_number;
            
            $FatherName = $Relative->father_name;
            $FatherOccupation = $Relative->father_occupation;
            $FatherCompany = $Relative->father_name_of_company;
            $FatherContactNumber = $Relative->father_contact_number;

            $SpouseName = $Relative->spouse_name;
            $SpouseOccupation = $Relative->spouse_occupation;
            $SpouseCompany = $Relative->spouse_name_of_company;
            $SpouseContactNumber = $Relative->spouse_contact_number;
        }

        return view('/employee/employee-relative', [
            
            'id' => $id->id,

            'MotherMaidenName' => $MotherMaidenName,

            'MotherOccupation' => $MotherOccupation,

            'MotherCompany' => $MotherCompany,

            'MotherContactNumber' => $MotherContactNumber,

            'FatherName' => $FatherName,

            'FatherOccupation' => $FatherOccupation,

            'FatherCompany' => $FatherCompany,

            'FatherContactNumber' => $FatherContactNumber,

            'SpouseName' => $SpouseName,

            'SpouseOccupation' => $SpouseOccupation,

            'SpouseCompany' => $SpouseCompany,  
            
            'SpouseContactNumber' => $SpouseContactNumber,

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Save Relative Detail
    | 
    |--------------------------------------------------------------------------
    */ 

    public function saveRelative(Employee $id)
    {
        $Relative = $this->getRelativeDetail($id->id);

        request()->validate([
            'mother_maiden_name' => 'required',
            'mother_occupation' => 'required',
            'mother_name_of_company' => 'required',
            //'mother_contact_number' => 'required',
            'father_name' => 'required',
            'father_occupation' => 'required',
            'father_name_of_company' => 'required',
            //'father_contact_number' => 'required',
            //'spouse_name' => 'required',
            //'spouse_occupation' => 'required',
            //'spouse_name_of_company' => 'required',
            //'spouse_contact_number' => 'required'
        ]);

        $mother_maiden_name         =   request('mother_maiden_name');
        $mother_occupation          =   request('mother_occupation');
        $mother_name_of_company     =   request('mother_name_of_company');
        $mother_contact_number      =   request('mother_contact_number');
        $father_name                =   request('father_name');
        $father_occupation          =   request('father_occupation');
        $father_name_of_company     =   request('father_name_of_company');
        $father_contact_number      =   request('father_contact_number');
        $spouse_name                =   request('spouse_name');
        $spouse_occupation          =   request('spouse_occupation');
        $spouse_name_of_company     =   request('spouse_name_of_company');
        $spouse_contact_number      =   request('spouse_contact_number');

        if($Relative == null)
        {
            DB::insert('insert into employee_relative_details (
                employee_id,
                mother_maiden_name,
                mother_occupation,
                mother_name_of_company,
                mother_contact_number,
                father_name,
                father_occupation,
                father_name_of_company,
                father_contact_number,
                spouse_name,
                spouse_occupation,
                spouse_name_of_company,
                spouse_contact_number
                ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                [
                    $id->id,
                    $mother_maiden_name,
                    $mother_occupation,
                    $mother_name_of_company,
                    $mother_contact_number,
                    $father_name,
                    $father_occupation,
                    $father_name_of_company,
                    $father_contact_number,
                    $spouse_name,
                    $spouse_occupation,
                    $spouse_name_of_company,
                    $spouse_contact_number,
                ]);
        }
        else
        {
            EmployeeRelativeDetail::where('employee_id', '=', $id->id)
                ->update([
                    'mother_maiden_name' => $mother_maiden_name,
                    'mother_occupation' => $mother_occupation,
                    'mother_name_of_company' => $mother_name_of_company,
                    'mother_contact_number' => $mother_contact_number,
                    'father_name' => $father_name,
                    'father_occupation' => $father_occupation,
                    'father_name_of_company' => $father_name_of_company,
                    'father_contact_number' => $father_contact_number,
                    'spouse_name' => $spouse_name,
                    'spouse_occupation' => $spouse_occupation,
                    'spouse_name_of_company' => $spouse_name_of_company,
                    'spouse_contact_number' => $spouse_contact_number
                ]);
        }

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Relative Details successfully saved!');
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Fetch Relative Detail
    | 
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
                            'mother_contact_number',
                            'father_name',
                            'father_occupation',
                            'father_name_of_company',
                            'father_contact_number',
                            'spouse_name',
                            'spouse_occupation',
                            'spouse_name_of_company',
                            'spouse_contact_number'
                        )
                        ->first();

        return $Relative;
    }
}
