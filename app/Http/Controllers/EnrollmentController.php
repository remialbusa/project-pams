<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    function admission(){
        return view('auth.admission');
    }
}