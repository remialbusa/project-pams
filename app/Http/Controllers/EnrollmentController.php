<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnrolledStudent;
use App\Models\PendingStudent;
use App\Models\Subject;
use App\Models\Program;
use App\Models\TechnicalForm;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class EnrollmentController extends Controller
{
    function admission(){
        $school_year = SchoolYear::all();
        return view('auth.admission', ['school_year'=>$school_year]);
    }
}