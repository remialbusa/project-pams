<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqsController extends Controller
{
    function faqsStudent()
    {
        $faqs = faqs::all();
        return view('auth.faqs-student',['faqs'=>$faqs]);
    }


    function saveFaqs(Request $request)
    {
        //validate info
        $request->validate([
            'categories' => 'required',
            'questions' => 'required',
            'answer' => 'required',
        ]);

        //insert admin data
        $faqs = new Faqs();
        $faqs->categories = $request->categories;
        $faqs->questions = $request->questions;
        $faqs->answer = $request->answer;
        $save = $faqs->save();

        if ($save) {
            return redirect('staff/admin/system-configuration/faqs');
        } else {
            return back()->with('fail', 'failed inserting admin data');
        }
    }
    function deleteFaqs($id){
        $faqs = faqs::find($id);
        $faqs->delete();
        return redirect('staff/admin/system-configuration/faqs');
    }
}
