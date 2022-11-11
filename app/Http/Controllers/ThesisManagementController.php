<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\AdmissionOfficer;
use App\Models\StudentStatus;
use App\Models\Subject;
use App\Models\Thesis;
use App\Models\StudentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ThesisManagementController extends Controller
{
    function studentThesisDirectory()
    {
        if (session()->has('LoggedUser')) {
            $student = StudentUser::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }

        $thesis = Thesis::all();     
        return view('student.thesismanagement.student-thesis-directory', $data, ['thesis' => $thesis]);
    }

    function studentThesisSchedule()
    {
        if (session()->has('LoggedUser')) {
            $student = StudentUser::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        $student = StudentUser::all();
        $thesis = Thesis::all();     
        return view('student.dashboard.thesismanagement.student-thesis-schedule', $data, ['student'=>$student,'thesis' => $thesis]);
    }

    function thesisDirectory()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }  
        $thesis = Thesis::all();
        return view('admin.thesis-management.thesis-directory', $data, ['thesis' => $thesis]);
    }
    
    function thesisScheduling()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = StudentUser::all();  
        return view('admin.thesis-management.thesis-scheduling', $data, ['student'=>$student]);
    }

    function thesisDelete($id){
        $thesisDatas = Thesis::find($id);
        $thesisDatas->delete();
        return redirect('staff/admin/thesis-directory');
    }

    function thesisEdit($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $thesis = Thesis::find($id);
        return view('admin.edit-thesis', $data, ['thesis'=>$thesis]);
    }

    function thesisUpdate(Request $request){
        //validate info
        $request->validate([
            'thesis_title' => 'required',
            'thesis_author' => 'required'
        ]);

        //update data
        $thesis = Thesis::find($request->id);
        $thesis -> thesis_title = $request->thesis_title;
        $thesis -> thesis_author = $request->thesis_author;
        $save = $thesis->save();

        if($save){
            return redirect('staff/admin/thesis-directory');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    function thesisSave(Request $request){

        //validate info
        $request->validate([
            'thesis_title' => 'required',
            'thesis_author' => 'required'
        ]);

        //insert data
        $thesis = new Thesis();
        $thesis -> thesis_title = $request->thesis_title;
        $thesis -> thesis_author = $request->thesis_author;
        $save = $thesis->save();

        if ($save) {
            return back()->with('success', 'thesis inserted successfuly');
        } else {
            return back()->with('fail', 'failed inserting thesis data');
        }
    }
}
