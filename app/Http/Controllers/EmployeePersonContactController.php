<?php

namespace App\Http\Controllers;

use App\EmployeePersonContact;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeePersonContactController extends Controller
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
    | Add/Edit Contact Person
    | 
    |--------------------------------------------------------------------------
    */

    public function addContact(Employee $id)
    {
        $Contact = $this->getContactDetail($id->id);

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

        return view('/employee/add-contact', [
            'id'                =>      $id->id,
            'contact_person'    =>      $contact_person,
            'contact_number'    =>      $contact_number, 
            'address'           =>      $address,
            'relationship'      =>      $relationship
        ]);

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Person to Contact Details successfully saved!');
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Save Contact
    | 
    |--------------------------------------------------------------------------
    */

    public function saveContact(Employee $id)
    {
        $Contact = $this->getContactDetail($id->id);

        request()->validate([
            'contact_person'    =>      'required',
            'contact_number'    =>      'required',
            'relationship'      =>      'required',
            'address'           =>      'required'
        ]);

        $contact_person         =       request('contact_person');
        $contact_number         =       request('contact_number');
        $address                =       request('address');
        $relationship           =       request('relationship');

        if($Contact == null)
        {
            DB::insert('insert into employee_person_contacts (
                employee_id,
                contact_person,
                contact_number,
                address,
                relationship
                ) values (?, ?, ?, ?, ?)', 
                [
                    $id->id,
                    $contact_person,
                    $contact_number,
                    $address,
                    $relationship
                ]);
        }
        else
        {
            EmployeePersonContact::where('employee_id', '=', $id->id)
                ->update([
                    'contact_person' => $contact_person,
                    'contact_number' => $contact_number,
                    'address' => $address,
                    'relationship' => $relationship
                ]);            
        }

        return redirect()->action('EmployeeController@viewEmployee', $id->id)->with('success', 'Person To Contact Details successfully saved!');
    }

    /*
    |--------------------------------------------------------------------------
    |
    | Fetch Contact Detail From Database
    | 
    |--------------------------------------------------------------------------
    */

    public function getContactDetail($id)
    {
        $Contact = EmployeePersonContact::where('employee_id', $id)
        ->first();

        return $Contact;
    }
}
