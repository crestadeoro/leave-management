<?php



namespace App\Http\Controllers;



use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;



class SettingController extends Controller

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

    public function settingAddUser()

    {

        return view('setting/user/add-user');

    }



    public function settingSaveUser(Request $request)

    {

        request()->validate([

            'name' => ['required', 'string', 'max:255'],

            'username' => ['required', 'string', 'max:255', 'unique:users'],

            'division' => ['required', 'string', 'max:255'],

            'password' => ['required', 'string', 'min:8', 'confirmed']

        ]);



        //$password = Hash::make($request->password);

        

        $data = User::create(request([

            'name',

            'username',

            'division',

            'password' => Hash::make('password')

        ]));



        return redirect()->action('SettingController@settingAddUser')->with('success', 'New User successfully added!');

    }

}

