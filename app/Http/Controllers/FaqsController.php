<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqsController extends Controller
{
    function faqsStudent(){
        return view('auth.faqs-student');
    }

    function test(){
        return view('others.index');
    }
}
