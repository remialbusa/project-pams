<?php

namespace App\Http\Controllers;

use App\Models\EnrolledStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register-student');
    }
    function registerNewStudent()
    {
        return view('auth.register-new-student');
    }

    function saveStudent(Request $request)
    {
        //validate info
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
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'program' => 'required',
            'first_period' => 'required',
            'second_period' => 'required',
            'third_period' => 'required',                          
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->store('public/files');

        //insert data
        $student = new Student();
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
        $student->region_code = $request->region;
        $student->province_code = $request->province;
        $student->city_code = $request->city;
        $student->barangay_code = $request->barangay;
        $student->file_name = $fileName;
        $student->file_path = $filePath;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period;
        $student->second_period_sub = $request->second_period;
        $student->third_period_sub = $request->third_period;
        $save = $student->save();

        if ($save) {
            return back()->with('success', 'Registration complete');
        } else {
            return back()->with('fail', 'Failed Registration');
        }
    }

    //update student details
    function updateStudentDetails(Request $request)
    {
        $request->validate([
            'student_type' => 'required',
            'program' => 'required',
            'student_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
            'zipcode' => 'required',
            'home_address' => 'required',
            'guardian' => 'required',
            'guardian_contact_no' => 'required'
        ]);

        $student = Student::find($request->id);
        $student->student_type = $request->student_type;
        $student->program = $request->program;
        $student->student_id = $request->student_id;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->birth_date = $request->birth_date;
        $student->gender = $request->gender;
        $student->civil_status = $request->civil_status;
        $student->nationality = $request->nationality;
        $student->contact_no = $request->contact_no;
        $student->email = $request->email;
        $student->zipcode = $request->zipcode;
        $student->home_address = $request->home_address;
        $student->guardian = $request->guardian;
        $student->guardian_contact_no = $request->guardian_contact_no;
        $save = $student->save();

        if ($save) {
            return back()->with('success', 'Your Profile is already updated');
        } else {
            return back()->with('fail', 'Failed updating student data');
        }
    }

    //verify student credential
    function verify(Request $request)
    {
        //validate request
        $request->validate([
            'student_id' => 'required',
            'password' => 'required'
        ]);

        $studentID = Student::where('student_id', '=', $request->student_id)->first();
        $studentPassword = Student::where('last_name', '=', $request->password)->first();

        if ($studentID) { //if student_id exist
            if ($studentPassword) { //if password exist                
                $request->session()->put('LoggedUser', $studentID->id);
                return redirect('student/profile');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Student ID does not exist');
        }
    }

    function profile()
    {
        if (session()->has('LoggedUser')) {
            $student = Student::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        // working na adi les
        // $enrolledStudent = EnrolledStudent::find(session('LoggedUser'));
        // $studdata = [
        //     'LoggedUserInfo' => $enrolledStudent
        // ];    

        $enrolledStudent = EnrolledStudent::where('student_id', '=', session('LoggedUser'))->first();     
        return view('student.profile', $data, ['enrolledStudent' => $enrolledStudent]);
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('student/auth/login');
        }
    }

    function enrollmentStatus()
    {
        if (session()->has('LoggedUser')) {
            $student = Student::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        $enrolledStudent = EnrolledStudent::where('id', '=', '1')->first();     
        return view('student.monitor-enrollment', $data, ['enrolledStudent' => $enrolledStudent]);
    }

    function admission(){
        return view('auth.admission');
    }

    function process(){
        return view('auth.process');
    }

}
