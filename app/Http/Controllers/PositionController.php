<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $Position = Position::all();

    	return view('position.position', [
            'Position' => $Position
        ]);
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

    /*
    |--------------------------------------------------------------------------
    | Edit Position Page
    |--------------------------------------------------------------------------
    */    

    public function editPosition(Position $id)
    {
        $Position = DB::table('positions')
                            ->where('id', '=', $id->id)
                            ->select(
                                'id',
                                'position'
                            )->first();
        
        return view('position.edit-position', [
            'Position' => $Position
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Position Information
    |--------------------------------------------------------------------------
    */    

    public function updatePosition(Position $id)
    {
        request()->validate([
    		'position' 		=> 	'required'			
        ]);

        $id->update(request([
            'position'
        ]));

        return redirect()->action('PositionController@indexPosition')->with('success', 'Position successfully updated!'); 
    }    
}
