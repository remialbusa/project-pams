<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register-student');
    }

    function save(Request $request){
        //validate info
        $request->validate([
            'student_id'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //insert data
        $student = new Student();
        $student->student_id= $request->student_id;
        $student->name= $request->name;
        $student->email= $request->email;
        $student->password= Hash::make($request->password);
        $save = $student->save();

        if($save){
            return back()->with('success', 'student inserted successfuly');
        }else{
            return back()->with('fail', 'failed inserting student data');
        }
    }

    function verify(Request $request){
        //validate request
         $request->validate([
             'student_id'=>'required',
             'password'=>'required'
         ]);

         $studentInfo = Student::where('student_id','=', $request->student_id)->first();

         if($studentInfo){ //student_id exist
            if(Hash::check($request->password, $studentInfo->password)){               
                $request->session()->put('LoggedUser', $studentInfo->id);
                return redirect('student/profile');
            }else{
                return back()->with('fail', 'incorrect password');
            }
         }else{
             return back()->with('fail', 'student ID does not exist');           
         }
    }

    function profile(){
        
        if(session()->has('LoggedUser')){
            $student = Student::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$student
            ];
        }
        return view('student.profile', $data);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('student/auth/login');
        }
    }

    function enrollmentStatus(){
        return view('student.monitor-enrollment');
    }

}
