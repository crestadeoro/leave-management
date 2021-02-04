<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Employee;

use App\Position;

use App\Division;

use App\Leave;



class ReportController extends Controller

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

    public function employeeReport()

    {

        $Employee = DB::table('employees')

                                ->join('divisions', 'employees.division', '=', 'divisions.id')

                                ->join('positions', 'employees.position', '=', 'positions.id')

                                ->orderBy('employees.lastname', 'asc')

                                ->where('employees.status', '!=', 'duplicate')

                                ->select(

                                    'employees.id',

                                    'employees.employee_id',

                                    'employees.firstname',

                                    'employees.middlename',

                                    'employees.lastname',

                                    'employees.birthday',

                                    'employees.date_hired',

                                    'employees.status',

                                    'employees.address',

                                    'employees.sss',

                                    'employees.philhealth',

                                    'employees.hdmf',

                                    'employees.tin',

                                    'divisions.division',

                                    'positions.position'

                                )

                                ->get();



        return view('report/master-list', [

            'Employee' => $Employee

        ]);

    }



    public function employeeLeave()

    {

        $Employee = DB::table('employees')

                                ->join('divisions', 'employees.division', '=', 'divisions.id')

                                ->join('positions', 'employees.position', '=', 'positions.id')

                                ->leftJoin('leaves', 'employees.id', '=', 'leaves.employee_id')

                                //->join('leaves', 'employees.id', '=', 'leaves.employee_id')

                                //->groupBy('leaves.employee_id')

                                ->orderBy('employees.lastname', 'asc')

                                ->where('employees.status', '!=', 'removed')

                                ->where('employees.status', '!=', 'resigned')

                                ->where('leaves.category', '!=', '')

                                ->select(

                                    'employees.employee_id AS emp_id',

                                    'employees.firstname',

                                    'employees.middlename',

                                    'employees.lastname',

                                    'employees.birthday',
                                    'employees.date_hired',

                                    'divisions.division',

                                    'positions.position',

                                    'leaves.date_from',

                                    'leaves.date_to',

                                    'leaves.category'

                                )

                                ->get();                             



        return view('report/leave', [

            'Employee' => $Employee

        ]);

    }

}

