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
use App\Models\Program;
use App\Models\Scheduling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ThesisManagementController extends Controller
{
    #Student Thesis Directory
    function studentThesisDirectory()
    {
        if (session()->has('LoggedUser')) {
            $student = StudentUser::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }

        $thesis = Thesis::all();     
        return view('student.dashboard.thesismanagement.student-thesis-directory', $data, ['thesis' => $thesis]);
    }

    

    #Student View Thesis in Directory
    function viewStudentThesis($id)
    {
        if (session()->has('LoggedUser')) {
            $student = StudentUser::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        $thesis = Thesis::find($id);
        return view('student.view-thesis-pdf', $data, ['thesis'=>$thesis]);
    }

    #Student Thesis Schedule
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

    #OGS Admin Thesis Directory
    function thesisDirectory()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }  
        $thesis = Thesis::all();
        return view('ogs.thesis-management.thesis-directory', $data, ['thesis' => $thesis]);
    }

    #OGS Admin Insert Thesis Directory
    function thesisSave(Request $request){

        //validate info
        $request->validate([
            'thesis_title' => 'required',
            'thesis_author' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048'
        ]);

        //insert data
        $thesis = new Thesis();
        $thesis -> thesis_title = $request->thesis_title;
        $thesis -> thesis_author = $request->thesis_author;

        $file = $request->file;
        
        $filename=$file->getClientOriginalName();
        $request->file->move('assets',$filename);

        $thesis->file= $filename;

        $save = $thesis->save();

        if ($save) {
            return back()->with('success', 'thesis inserted successfuly');
        } else {
            return back()->with('fail', 'failed inserting thesis data');
        }
    }

    #Admin OGS View Thesis in Directory
    function viewAdminThesis($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $thesis = Thesis::find($id);
        return view('ogs.view-thesis-pdf', $data, ['thesis'=>$thesis]);
    }

    #OGS Admin Thesis Edit
    function thesisEdit($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $thesis = Thesis::find($id);
        return view('ogs.edit-thesis', $data, ['thesis'=>$thesis]);
    }

    #OGS Admin Update Thesis
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

    #OGS Admin Thesis Delete
    function thesisDelete($id){
        $thesisDatas = Thesis::find($id);
        $thesisDatas->delete();
        return redirect('staff/admin/thesis-directory');
    }
    
    #OGS Admin Thesis Scheduling
    function thesisScheduling()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = StudentUser::all();
        return view('ogs.thesis-management.thesis-scheduling', $data, ['student'=>$student]);
    }


    function schedulingThesis($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = StudentUser::find($id);
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        $subjects = Subject::all();
        $programs = Program::all();
        return view('admin.defense-scheduling', $data, ['student'=>$student,'firstPeriod'=>$firstPeriod,'secondPeriod'=>$secondPeriod,'thirdPeriod'=>$thirdPeriod,'programs'=>$programs,'subjects'=>$subjects]);
    }

    



    function setSchedule(Request $request)
    {
        $request->validate([
            'member_1' => 'required',
            'member_2' => 'required',
            'member_3' => 'required',
            'panelist_1' => 'required',
            'panelist_2' => 'required',
            'panelist_3' => 'required',
            'adviser' => 'required',
            'date' => 'required',
            'time' => 'required',
            'venue' => 'required',
            'link' => 'required',
        ]);

        $student = StudentUser::find($request->id);
        $student->title = $request->title;
        $student->member_1 = $request->member_1;
        $student->member_2 = $request->member_2;
        $student->member_3 = $request->member_3;
        $student->panelist_1 = $request->panelist_1;
        $student->panelist_2 = $request->panelist_2;
        $student->panelist_3 = $request->panelist_3;
        $student->adviser = $request->adviser;
        $student->date = $request->date;
        $student->time = $request->time;
        $student->venue = $request->venue;
        $student->link = $request->link;
        
        $save = $student->save();

        if($save){
            return back()->with('success', 'Succesfully inserted scheduling data');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    

    

    

    
}
