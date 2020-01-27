<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | View Position Page
    |--------------------------------------------------------------------------
    */    

    public function indexPosition()
    {
    	return view('employee.position');
    }

    /*
    |--------------------------------------------------------------------------
    | Save Position Information
    |--------------------------------------------------------------------------
    */ 

    public function savePosition()
    {
    	request()->validate([
    		'position' 		=> 	'required'			
        ]);
        
    	$data = Position::create(request([
			'position'
        ]));
        
        return redirect()->action('PositionController@indexPosition')->with('success', 'New Position successfully saved!');
    }
}
