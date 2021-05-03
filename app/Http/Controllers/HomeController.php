<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = $this->getBirthday();

        return view('home', [
            'employee' => $employee
        ]);
    }

    public function getBirthday()
    {
		$employee = DB::table('employees')

								->join('divisions', 'employees.division', '=', 'divisions.id')

								->select(

                                    'employees.firstname',

                                    'employees.lastname',

                                    'employees.birthday',

                                    'divisions.division'
								)

                                ->get();

        return $employee;
    }
}
