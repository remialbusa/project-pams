<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\AdmissionOfficer;
use Illuminate\Support\Facades\Hash;

class AdmissionOfficerController extends Controller
{
    function admissionOfficerMITView(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $studentList = Student::where('program', 'MIT')->get();
        $enrolledStudents = EnrolledStudent::where('program', 'MIT')->get();
        return view('course.mit-students', $data, ['students'=>$studentList, 'enrolled'=>$enrolledStudents]);
    }
    function admissionOfficerMSITView(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $studentList = Student::where('program', 'MSIT')->get();
        $enrolledStudents = EnrolledStudent::where('program', 'MSIT')->get();
        return view('course.msit-students', $data, ['students'=>$studentList, 'enrolled'=>$enrolledStudents]);
    }

    function editPendingStudent($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminData = Student::find($id);
        return view('course.edit-mit-student', $data, ['studentData'=>$adminData]);
    }

    function approvePendingStudent(Request $request){
        $request->validate([
            'student_type'=>'required',
            'program'=>'required',  
            'first_period'=>'required',    
            'second_period'=>'required',          
            'third_period'=>'required',   
            'student_id'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'birth_date'=>'required',
            'gender'=>'required',
            'civil_status'=>'required',
            'nationality'=>'required',
            'contact_no'=>'required',
            'email'=>'required|email',
            'zipcode'=>'required',
            'home_address'=>'required',
            'guardian'=>'required',
            'guardian_contact_no'=>'required'
        ]);

        //insert data
        $student = new EnrolledStudent();
        $student->student_type= $request->student_type;
        $student->program= $request->program;
        $student->first_period= $request->first_period;
        $student->second_period= $request->second_period;
        $student->third_period= $request->third_period;
        $student->student_id= $request->student_id;
        $student->first_name= $request->first_name;
        $student->middle_name= $request->middle_name;
        $student->last_name= $request->last_name;
        $student->birth_date= $request->birth_date;
        $student->gender= $request->gender;
        $student->civil_status= $request->civil_status;
        $student->nationality= $request->nationality;
        $student->contact_no= $request->contact_no;
        $student->email= $request->email;
        $student->zipcode= $request->zipcode;
        $student->home_address= $request->home_address;
        $student->guardian= $request->guardian;
        $student->guardian_contact_no= $request->guardian_contact_no;
        $save = $student->save();

        if($save){
            return redirect('staff/admission-officer/mit');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
        
    }

    function deletePendingStudent($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('staff/admission-officer/mit');
    }

    function deleteEnrolledStudent($id){
        $student = EnrolledStudent::find($id);
        $student->delete();
        return redirect('staff/admission-officer/mit');
    }

    function editPendingMsitStudent($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminData = Student::find($id);
        return view('course.edit-msit-student', $data, ['studentData'=>$adminData]);
    }

    //MSIT Students Routes
    function approvePendingMsitStudent(Request $request){
        $request->validate([
            'student_type'=>'required',
            'program'=>'required',  
            'first_period'=>'required',    
            'second_period'=>'required',          
            'third_period'=>'required',   
            'student_id'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'birth_date'=>'required',
            'gender'=>'required',
            'civil_status'=>'required',
            'nationality'=>'required',
            'contact_no'=>'required',
            'email'=>'required|email',
            'zipcode'=>'required',
            'home_address'=>'required',
            'guardian'=>'required',
            'guardian_contact_no'=>'required'
        ]);

        //insert data
        $student = new EnrolledStudent();
        $student->student_type= $request->student_type;
        $student->program= $request->program;
        $student->first_period= $request->first_period;
        $student->second_period= $request->second_period;
        $student->third_period= $request->third_period;
        $student->student_id= $request->student_id;
        $student->first_name= $request->first_name;
        $student->middle_name= $request->middle_name;
        $student->last_name= $request->last_name;
        $student->birth_date= $request->birth_date;
        $student->gender= $request->gender;
        $student->civil_status= $request->civil_status;
        $student->nationality= $request->nationality;
        $student->contact_no= $request->contact_no;
        $student->email= $request->email;
        $student->zipcode= $request->zipcode;
        $student->home_address= $request->home_address;
        $student->guardian= $request->guardian;
        $student->guardian_contact_no= $request->guardian_contact_no;
        $save = $student->save();

        if($save){
            return redirect('staff/admission-officer/msit');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
        
    }

    function deletePendingMsitStudent($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('staff/admission-officer/msit');
    }

}
