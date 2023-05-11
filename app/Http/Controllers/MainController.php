<?php

namespace App\Http\Controllers;

use App\Models\EnrolledStudent;
use App\Models\PendingStudent;
use App\Models\ApprovedStudent;
use App\Models\Subject;
use App\Models\Program;
use App\Models\TechnicalForm;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;


class MainController extends Controller
{
    function login()
    {
        return view('auth.student-login');
    }

    function index()
    {
        $school_year = SchoolYear::all();
        $enrolledStudents = DB::table('enrolled_students')->count();
        $subjects = DB::table('subjects')->count();
        $programs = DB::table('programs')->count();
        return view('welcome', compact('school_year','enrolledStudents','subjects','programs'));
    }

    function register()
    {
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        $subjects = Subject::all();

        $programData['data'] = Program::orderby("program", "asc")
            ->select('id', 'program', 'description')
            ->get();

        $school_year = SchoolYear::all();
        return view('auth.register-student', ['school_year' => $school_year, 'firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod, 'programData' => $programData, 'subjects' => $subjects]);
    }

    function registerNewStudent()
    {
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();

        $programData['data'] = Program::orderby("program", "asc")
            ->select('id', 'program', 'description')
            ->get();

        $school_year = SchoolYear::all();
        return view('auth.register-new-student', ['school_year' => $school_year, 'programData' => $programData, 'firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod]);
    }

    function getFirstPeriod($programid = 0)
    {
        $subjects['data'] = Subject::orderby("code", "asc")
            ->select('id', 'code', 'subject', 'unit', 'period')
            ->where('program', $programid)
            ->where('period', '1st Period')
            ->get();
        return response()->json($subjects);
    }

    function getSecondPeriod($programid = 0)
    {
        $subjects['data'] = Subject::orderby("code", "asc")
            ->select('id', 'code', 'subject', 'unit', 'period')
            ->where('program', $programid)
            ->where('period', '2nd Period')
            ->get();
        return response()->json($subjects);
    }

    function getThirdPeriod($programid = 0)
    {
        $subjects['data'] = Subject::orderby("code", "asc")
            ->select('id', 'code', 'subject', 'unit', 'period')
            ->where('program', $programid)
            ->where('period', '3rd Period')
            ->get();
        return response()->json($subjects);
    }

    function saveStudent(Request $request)
    {
        //validate info
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'vaccination_file' => 'required|mimes:pdf,xlx,csv,jpg,jpeg,png|max:2048',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required|date|before:-23 years',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'baranggay' => 'required',
            'file.*' => 'required|mimes:jpeg,png,pdf|max:2048',
            'program' => 'required',
            'first_period' => 'required',
            'second_period' => 'required',
            'third_period' => 'required',
        ]);


        //insert data
        $student = new PendingStudent();
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
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period;
        $student->second_period_sub = $request->second_period;
        $student->third_period_sub = $request->third_period;
        $vaccination_file = $request->vaccination_file;
        $vaccination_file_name = $vaccination_file->getClientOriginalName();
        $request->vaccination_file->move('assets', $vaccination_file_name);
        $student->vaccination_file = $vaccination_file_name;

        $vaccination_file = $request->vaccination_file;
        $vaccination_file_name = $vaccination_file->getClientOriginalName();
        $request->vaccination_file->move('assets', $vaccination_file_name);
        $student->vaccination_file = $vaccination_file_name;

        $student_file = []; // Initialize the variable as an empty array
        $files = $request->file;
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'pdf'])) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move('assets', $filename);
                $student_file[] = $filename;
            }
        }
        $student->file = json_encode($student_file);

        $save = $student->save();


        if ($save) {
            return back()->with('success', 'Registration complete');
        } else {
            return back()->with('fail', 'Failed Registration');
        }
    }

    //update student details
    function updateStudentProfile(Request $request)
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
            'baranggay' => 'required',
        ]);


        //insert data
        $student = EnrolledStudent::find($request->id);
        $student->id = $request->id;
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
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;

        $save = $student->save();


        if ($save) {
            return back()->with('success', 'Registration complete');
        } else {
            return back()->with('fail', 'Failed Registration');
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
                return redirect('/student/auth/student-profile');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Student ID does not exist');
        }
    }

    function dashboard()
    {
        if (session()->has('LoggedUser')) {
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        $school_year = SchoolYear::all();
        $studentList = EnrolledStudent::all();
        return view('student.dashboard.dashboard', $data, ['school_year' => $school_year, 'student' => $studentList]);
    }

    function profileView()
    {
        if (session()->has('LoggedUser')) {
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();
        $programs = Program::all();
        $school_year = DB::table('school_year')->where('status', 'Active')->get();
        return view('student.profile-settings.student-profile', $data, ['school_year' => $school_year, 'firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod, 'programs' => $programs]);
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
        $school_year = DB::table('school_year')->where('status', 'Active')->first();
        $studentUser = EnrolledStudent::all();
        $subject = Subject::all();
        return view('student.monitor-enrollment.monitor-enrollment', $data, ['school_year' => $school_year, 'subject' => $subject, 'studentUser' => $studentUser]);
    }

    function preEnroll()
    {
        if (session()->has('LoggedUser')) {
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }

        $school_year = DB::table('school_year')->where('status', 'Active')->first();
        $studentUser = EnrolledStudent::all();
        $enrolledStudent = EnrolledStudent::all();
        $programs = Program::all();
        $firstPeriod = DB::table('subjects')->where('period', '1st Period')->get();
        $secondPeriod = DB::table('subjects')->where('period', '2nd Period')->get();
        $thirdPeriod = DB::table('subjects')->where('period', '3rd Period')->get();

        $programData['data'] = Program::orderby("program", "asc")
            ->select('id', 'program', 'description')
            ->get();

        return view('student.pre-enroll.pre-enrollment', $data, ['school_year' => $school_year, 'programData' => $programData, 'firstPeriod' => $firstPeriod, 'secondPeriod' => $secondPeriod, 'thirdPeriod' => $thirdPeriod, 'programs' => $programs, 'studentUser' => $studentUser, 'enrolledStudent' => $enrolledStudent]);
    }

    function savePreEnroll(Request $request)
    {
        //validate info
        $request->validate([
            'student_type' => 'required',
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'vaccination_status' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required|date|before:-23 years',
            'mobile_no' => 'required',
            'fb_acc_name' => 'required',
            'region' => 'required',
            'province' => 'required',
            'city' => 'required',
            'baranggay' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'program' => 'required',
            'first_period' => 'required',
            'second_period' => 'required',
            'third_period' => 'required',
        ]);


        //insert data
        $student = new ApprovedStudent();
        $student->id = $request->id;
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
        $student->region = $request->region;
        $student->province = $request->province;
        $student->city = $request->city;
        $student->baranggay = $request->baranggay;
        $student->program = $request->program;
        $student->first_period_sub = $request->first_period;
        $student->second_period_sub = $request->second_period;
        $student->third_period_sub = $request->third_period;

        $file = $request->file;

        $filename = $file->getClientOriginalName();
        $request->file->move('assets', $filename);

        $student->file = $filename;

        $save = $student->save();


        if ($save) {
            return back()->with('success', 'Registration complete');
        } else {
            return back()->with('fail', 'Failed Registration');
        }
    }

    function saveForm(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'id_no' => 'required',
            'name' => 'required',
            'email' => 'required',
            'concern' => 'required',
        ]);

        $form = new TechnicalForm();
        $form->program = $request->program;
        $form->id_no = $request->id_no;
        $form->name = $request->name;
        $form->email = $request->email;
        $form->concern = $request->concern;

        $save = $form->save();


        if ($save) {
            return back()->with('success', 'Form Submitted Successfuly!');
        } else {
            return back()->with('fail', 'Failed Registration');
        }
    }

    function studentChangePassword($id)
    {
        if (session()->has('LoggedUser')) {
            $student = EnrolledStudent::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $student
            ];
        }

        return view('student.profile-settings.change-password', $data);
    }

    function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = EnrolledStudent::find($request->id);
        $user->student_id = $request->student_id;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if ($save) {
            return back()->with('success', 'Successfully Changed Password');
        } else {
            return back()->with('fail', 'Failed Changing Password');
        }
    }
}
