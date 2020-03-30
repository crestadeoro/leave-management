<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Division;

class DivisionController extends Controller
{
    public function indexDivision()
    {
        $Division = Division::all();

        return view('division.division', [
            'Division' => $Division
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Save Division Information
    |--------------------------------------------------------------------------
    */    

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

    /*
    |--------------------------------------------------------------------------
    | Edit Division Page
    |--------------------------------------------------------------------------
    */    

    public function editDivision(Division $id)
    {
        $Division = DB::table('divisions')
                            ->where('id', '=', $id->id)
                            ->select(
                                'id',
                                'division'
                            )->first();
        
        return view('division.edit-division', [
            'Division' => $Division
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Division Information
    |--------------------------------------------------------------------------
    */    

    public function updateDivision(Division $id)
    {
        request()->validate([
    		'division' 		=> 	'required'			
        ]);

        $id->update(request([
            'division'
        ]));

        return redirect()->action('DivisionController@indexDivision')->with('success', 'New Division/Project successfully updated!'); 
    }
}
