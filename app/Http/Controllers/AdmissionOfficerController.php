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
    function admissionOfficerView(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $studentList = Student::all();
        $enrolledStudents = EnrolledStudent::all();
        return view('course.mit-students', $data, ['students'=>$studentList, 'enrolled'=>$enrolledStudents]);
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
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',          
            'first_name' => 'required',
            'middle_name' => 'required',
            'vaccination_status' => 'required',
            'email' => 'required',
            'gender' => 'required',  
            'birth_date' => 'required', 
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',           
            'program' => 'required',
            'first_period' => 'required',
            'second_period' => 'required',
            'third_period' => 'required',  
        ]);

        //insert data
        $student = new EnrolledStudent();
        $student->student_type = $request->student_type;
        $student->student_id = $request->student_id;       
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->vaccination_status = $request->vaccination_status;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birth_date = $request->birth_date;
        $student->mobile_no = $request->mobile_no;
        $student->fb_acc_name = $request->fb_acc_name;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period;
        $student->second_period_sub = $request->second_period;
        $student->third_period_sub = $request->third_period;
        $save = $student->save();

        if($save){
            return redirect('staff/admission-officer/ogs-view');
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

}
