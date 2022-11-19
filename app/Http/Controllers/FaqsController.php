<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
 
class FaqsController extends Controller
{
    function faqsStudent()
    {
        $faqs = Faqs::all();
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
            return back()->with('fail', 'failed inserting data');
        }
        
        
    }
    function deleteFaqs($id){
        $faqs = Faqs::find($id);
        $faqs->delete();
        return redirect('staff/admin/system-configuration/faqs');
    }

    function editFaqs($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $faqs = Faqs::find($id);
        return view('admin.edit-faqs', $data, ['faqs'=>$faqs]);
    }

    function faqsUpdate(Request $request){
        //validate info
        $request->validate([
            'categories' => 'required',
            'questions' => 'required',
            'answer' => 'required'
        ]);

        //update data
        $faqs = Faqs::find($request->id);
        $faqs->categories = $request->categories;
        $faqs->questions = $request->questions;
        $faqs->answer = $request->answer;
        $save = $faqs->update();

        if($save){
            return redirect('staff/admin/system-configuration/faqs');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
    }



}
