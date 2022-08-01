<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function loginAdmin (){
        return view('admin.login-admin');
    }
}
