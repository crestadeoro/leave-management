<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Position;
use App\Division;

class ReportController extends Controller
{
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
}
