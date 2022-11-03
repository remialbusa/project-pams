<?php

namespace App\Http\Controllers;

use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\StudentStatus;
use App\Models\PendingStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'program' => 'required',
            'first_period' => 'required',
            'second_period' => 'required',
            'third_period' => 'required',                          
        ]);
        

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
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period;
        $student->second_period_sub = $request->second_period;
        $student->third_period_sub = $request->third_period;

        $file = $request->file;
        
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);

        $student->file= $filename;

        $save = $student->save();

        /* $this->insertPendingStudent($request->student_id); */

        if ($save) {
            return back()->with('success', 'Registration complete');
        } else {
            return back()->with('fail', 'Failed Registration');
        }
    }

    public function insertPendingStudent($id){

        $pendingStudent = new StudentStatus();
        $pendingStudent->student_id = $id;
        $pendingStudent->submitted_form = "Pending";
        $pendingStudent->payment = "Pending";
        $pendingStudent->status = "Pending";
        $pendingStudent->save();
    }

    //update student details
    function updateStudentDetails(Request $request){
        //validate data
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

        //update data
        $student = EnrolledStudent::find($request->id);
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
        $save = $student->update();

        if($save){
            return back()->with('success', 'Your Profile has been updated');
        }else{
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

        $studentID = EnrolledStudent::where('student_id', '=', $request->student_id)->first();
        $studentPassword = EnrolledStudent::where('last_name', '=', $request->password)->first();

        if ($studentID) { //if student_id exist
            if ($studentPassword) { //if password exist                
                $request->session()->put('LoggedUser', $studentID->id);
                return redirect('student/auth/dashboard');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Student ID does not exist');
        }
        
    }

    function dashboard(){       
        if(session()->has('LoggedUser')){
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$student
            ];
        }
        $studentList = EnrolledStudent::all();
        return view('student.dashboard.dashboard', $data, ['student'=>$studentList]);
    }

    function profileView(){       
        if(session()->has('LoggedUser')){
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$student
            ];
        }
        $studentList = Student::all();
        return view('student.dashboard.profile-dashboard', $data, ['student'=>$studentList]);
    }

    function paymentView(){       
        if(session()->has('LoggedUser')){
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$student
            ];
        }
        $studentList = EnrolledStudent::all();
        $enrolledStudents = EnrolledStudent::all();
        return view('student.dashboard.payment-dashboard', $data, ['student'=>$studentList, 'enrolled'=>$enrolledStudents]);
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
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        $enrolledStudent = EnrolledStudent::all();
        return view('student.dashboard.monitor-enrollment-dashboard', $data, ['enrolledStudent' => $enrolledStudent]);
    }

    function test()
    {
        $studentData = Student::all();
        $studentStatus = StudentStatus::all();
        return view('test', ['studentData'=>$studentData, 'studentStatus'=>$studentStatus]);
    }

    function testEdit($id)
    {
        $studentData = Student::find($id);
        $studentStatus = StudentStatus::find($id);
        return view('test-edit', ['studentData'=>$studentData, 'studentStatus'=>$studentStatus]);
    }
}
