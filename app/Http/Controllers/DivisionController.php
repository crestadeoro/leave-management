<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{
    public function indexDivision()
    {
        return view('employee.division');
    }

    public function saveDivision()
    {
    	request()->validate([
    		'division' 		=> 	'required'			
        ]);
        
    	$data = Division::create(request([
			'division'
        ]));
        
        return redirect()->action('DivisionController@indexDivision')->with('success', 'New Division/Project successfully saved!');        
    }
}
