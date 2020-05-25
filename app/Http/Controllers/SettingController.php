<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingAddUser()
    {
        return view('setting/user/add-user');
    }
}
