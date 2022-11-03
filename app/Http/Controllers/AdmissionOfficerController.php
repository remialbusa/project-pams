<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\AdmissionOfficer;
use App\Models\StudentStatus;
use App\Models\Subject;
use App\Models\PendingStudent;
use App\Models\AssignStudent;
use App\Models\AdvisingStudent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdmissionOfficerController extends Controller
{
    function dashboard(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $newStudents = DB::table('students')->where('student_type', 'New Student')->count();
        $continuingStudents = DB::table('students')->where('student_type', 'Continuing')->count();
        $pendingStudents = DB::table('pending_students')->count();
        $enrolledStudents = DB::table('enrolled_students')->count();
        $subjects = DB::table('subjects')->count();
        return view('admin.dashboard.dashboard', $data, compact('subjects','newStudents', 'continuingStudents', 'pendingStudents', 'enrolledStudents'));
    }

    function preEnrollmentNew()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $newStudents = DB::table('students')->where('student_type', 'New Student')->get();

        return view('admin.pre-enrollment.new-student', $data, ['newStudents'=>$newStudents]);
    }

    function preEnrollmentContinuing()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $continuingStudents = DB::table('students')->where('student_type', 'Continuing')->get();

        return view('admin.pre-enrollment.continuing-student', $data, ['continuingStudents'=>$continuingStudents]);
    }

    /* Edit Pending Student */
    function editStatusPendingStudents($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        
        $student = Student::find($id);
        $status = PendingStudent::find($id);
        return view('admin.edit-pending-students', $data, ['status'=>$status, 'student' => $student]);
    }
    
    function pendingStudents()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $pendingStudent = PendingStudent::all();

        return view('admin.monitoring.pending-students', $data, ['pendingStudents'=>$pendingStudent]);
    }

    function downloadPDF(Request $request, $file_name)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        } 
        return response()->download(public_path('assets/'.$file_name));
    }

    function viewPDF($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $student = Student::find($id);
        return view('admin.view-pdf', $data, compact('student'));
    }


    function enrolledStudents()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   
        $enrolledStudents = EnrolledStudent::all();
        $student = Student::all();
        return view('admin.monitoring.enrolled-students', $data, ['enrolledStudents'=>$enrolledStudents, 'students'=>$student]);
    }

    function subjectList()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        } 
        
        $subjects = Subject::all();
        return view('admin.advising.subjects', $data, ['subjects'=>$subjects]);
    }

    function assignSubjects()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $student = AssignStudent::all();
        return view('admin.advising.assign-subjects', $data, ['student'=>$student]);
    }

    function scheduleSubject($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $student = AssignStudent::find($id);
        $subject = Subject::all();
        return view('admin.assign-subject-schedule', $data, ['subject'=>$subject,'student'=>$student]);
    }

    function approveAdvising(Request $request)
    {
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
            'first_period_schedule' => 'required',
            'second_period_schedule' => 'required',
            'third_period_schedule' => 'required', 
        ]);

        $this->deletePreviousAdvising($request->id);

        //update data
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
        $student->time_first_period_sub = $request->first_period_schedule;
        $student->time_second_period_sub = $request->second_period_schedule;
        $student->time_third_period_sub = $request->third_period_schedule;
        $student->first_period_instructor = $request->first_instructor;
        $student->second_period_instructor = $request->second_instructor;
        $student->third_period_instructor = $request->third_instructor;
        $save = $student->save();

        if($save){
            return redirect('/staff/admin/dashboard');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    public function deletePreviousAdvising($id){
        $student = AdvisingStudent::find($id);
        $student->delete();
        return redirect('/staff/admin/dashboard');
    }

    function assignScheduleSubject(Request $request)
    {
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
            'first_period_schedule' => 'required',
            'second_period_schedule' => 'required',
            'third_period_schedule' => 'required', 

        ]);

        $student = new AdvisingStudent();
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
        $student->time_first_period_sub = $request->first_period_schedule;
        $student->time_second_period_sub = $request->second_period_schedule;
        $student->time_third_period_sub = $request->third_period_schedule;
        $student->first_period_instructor = "N/A";
        $student->second_period_instructor = "N/A";
        $student->third_period_instructor = "N/A";

        $save = $student->save();

        $this->deletePreviousAssignSubject($request->id);

        if($save){
            return redirect('/staff/admin/assign-subjects');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
    }

    public function deletePreviousAssignSubject($id){
        $student = AssignStudent::find($id);
        $student->delete();
        return redirect('/staff/admin/assign-subjects');
    }

    function editPreEnrollees($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = Student::find($id);
        return view('admin.edit-student', $data, ['student'=>$student]);
    }

    function approveView($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = Student::find($id);
        $status = PendingStudent::find($id);
        return view('admin.approve-pending', $data, ['status'=>$status,'student'=>$student]);
    }

    function deleteSubjects($id){
        $subjects = Subject::find($id);
        $subjects->delete();
        return redirect('/staff/admin/subjects');
    }

    function advisingStudent()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        } 
        
        $subjects = Subject::all();
        $student = AdvisingStudent::all();
        return view('admin.advising.advising', $data, ['student'=>$student,'subjects'=>$subjects]);
    }

    function editAdvising($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        } 
        $student = AdvisingStudent::find($id);
        return view('admin.approve-advising', $data, ['student'=>$student]);
    }

    function instructorList()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        } 
        
        $subjects = Subject::all();
        return view('admin.advising.instructors', $data, ['subjects'=>$subjects]);
    }

    function approvePreEnrollees(Request $request){
        $request->validate([
            'student_id' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
        ]);

        //insert data
        $student = new PendingStudent();
        $student->student_id = $request->student_id;
        $student->submitted_form = "Pending";
        $student->payment = "Pending";
        $student->status = "Pending";

        $save = $student->save();


        if($save){
            return redirect('staff/admin/dashboard');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
        
    }

    /* public function store(Request $request)
    {
 
            $data=new product();
        
          
             $file=$request->file;
                 
     $filename=time().'.'.$file->getClientOriginalExtension();
 
                 $request->file->move('assets',$filename);
 
                 $data->file=$filename;
 
 
                 $data->name=$request->name;
                 $data->description=$request->description;
 
                 $data->save();
                 return redirect()->back();
 
 
 
    } */
    function approvePending(Request $request){
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
        $student = new AssignStudent();
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
        $student->time_first_period_sub = "N/A";
        $student->time_second_period_sub = "N/A";
        $student->time_third_period_sub = "N/A";
        $save = $student->save();

        $this->deletePending($request->id);
        
        if($save){
            return redirect('staff/admin/dashboard');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
        
    }

    public function deletePending($id){
        $student = PendingStudent::find($id);
        $student->delete();
        return redirect('/staff/admin/pending');
    }
    
    function updatePending(Request $request){
        $request->validate([
            'student_id' => 'required',
            'submitted_form' => 'required',          
            'payment' => 'required',
            'status' => 'required',
        ]);

        //update data
        $pendingStudent = PendingStudent::find($request->id);
        $pendingStudent->student_id = $request->student_id;
        $pendingStudent->submitted_form = $request->submitted_form;       
        $pendingStudent->payment = $request->payment;
        $pendingStudent->status = $request->status;
        $save = $pendingStudent->save();

        if($save){
            return redirect('staff/admin/pending');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
        
    }

   /*  public function insertPreEnrollee($id){

        $pendingStudent = new PendingStudent();
        $pendingStudent->student_id = $id;
        $pendingStudent->submitted_form = "Pending";
        $pendingStudent->payment = "Pending";
        $pendingStudent->status = "Pending";
        $pendingStudent->save();
    } */

    public function deletePreEnrollee($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('/staff/admin/pre-enrollment/new');
    }

    function saveSubject(Request $request){
        //validate info
        $request->validate([
            'code' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'units' => 'required',
        ]);

        //insert subject
        $subject = new Subject();
        $subject->code = $request->code;
        $subject->subject = $request->subject;
        $subject->description = $request->description;
        $subject->unit = $request->units;       
        $save = $subject->save();

        if ($save) {
            return back()->with('success', 'subject added successfuly');
        } else {
            return back()->with('fail', 'failed adding subject');
        }
    }

}
