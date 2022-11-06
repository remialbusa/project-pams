<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
}
