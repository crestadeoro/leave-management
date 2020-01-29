<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{
    public function indexDivision()
    {
        $Division = Division::all();

        return view('employee.division', [
            'Division' => $Division
        ]);
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
