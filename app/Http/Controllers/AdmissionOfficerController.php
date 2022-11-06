<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Student;
use App\Models\StudentStatus;
use App\Models\Subject;
use App\Models\PendingStudent;
use App\Models\AssignStudent;
use App\Models\AdvisingStudent;
use App\Models\StudentUser;
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

    function creatingStudentUser($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }

        $student = EnrolledStudent::find($id);
        return view('admin.create-student-users', $data, compact('student'));
    }

    function createStudentUser(Request $request)
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
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required', 
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
        ]);

        $student = new StudentUser();
        $student->id=$request->id;
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
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;

        $save = $student->save();

        
        if($save){
            return redirect('/staff/admin/enrolled');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
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

    function advisingAndAssigning()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }

        $student = PendingStudent::all();
        return view('admin.advising.advising-and-assigning', $data, ['student'=>$student]);
    }

    function editAdvisingAndAssignSubject($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }   

        $student = PendingStudent::find($id);
        $subject = Subject::all();
        return view('admin.approve-advising-and-assigning-subject', $data, ['subject'=>$subject,'student'=>$student]);
    }

    function approveAdvisingAndAssigningSubject(Request $request)
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
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required', 
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required', 
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',

        ]);

        $student = PendingStudent::find($request->id);
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
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;

        $save = $student->save();

        if($save){
            return redirect('/staff/admin/advising-assigning');
        }else{
            return back()->with('fail', 'Failed inserting student data');
        }
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
        $status = PendingStudent::find($id);
        return view('admin.approve-pending', $data, ['status'=>$status]);
    }

    function deleteSubjects($id){
        $subjects = Subject::find($id);
        $subjects->delete();
        return redirect('/staff/admin/subjects');
    }

    function adviserList()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        } 
        
        $subjects = Subject::all();
        return view('admin.advising.adviser', $data, ['subjects'=>$subjects]);
    }

    function studentUsers()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }

        $studentUsers = StudentUser::all();
        return view('admin.monitoring.student-users', $data, ['studentUsers'=>$studentUsers]);
    }

    function approvePreEnrollees(Request $request){
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
        $student = new PendingStudent();
        $student->id=$request->id;
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
        $student->first_period_sched = "";
        $student->second_period_sched = "";
        $student->third_period_sched = "";
        $student->first_period_adviser = "";
        $student->second_period_adviser = "";
        $student->third_period_adviser = "";
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
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required', 
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
        ]);

        //insert data
        $student = new EnrolledStudent();
        $student->id=$request->id;
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
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $save = $student->save();

        $this->deletePending($request->id);
        $this->deletePreEnrollee($request->id);

        if($save){
            return redirect('staff/admin/enrolled');
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

    public function deletePreEnrollee($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('/staff/admin/dashboard');
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

    function viewEnrolledStudent($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = EnrolledStudent::find($id);
        return view('admin.view-enrolled-student', $data, ['student'=>$student]);
    }

    function editEnrolledStudent($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = EnrolledStudent::find($id);
        return view('admin.edit-enrolled-student', $data, ['student'=>$student]);
    }

    function updateEnrolledStudent(Request $request){
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
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required', 
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
        ]);

        $student = EnrolledStudent::find($request->id);
        $student->id=$request->id;
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
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $save = $student->save();

        if ($save) {
            return back()->with('success', 'Enrolled Student Data Updated Successfuly!');
        } else {
            return back()->with('fail', 'failed updating');
        }
    }

    function deleteEnrolledStudent($id)
    {
        $student = EnrolledStudent::find($id);
        $student->delete();
        return redirect('/staff/admin/enrolled');
    }

    function updateStudentUser(Request $request)
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
            'first_period_sub' => 'required',
            'second_period_sub' => 'required',
            'third_period_sub' => 'required', 
            'first_period_sched' => 'required',
            'second_period_sched' => 'required',
            'third_period_sched' => 'required',
            'first_period_adviser' => 'required',
            'second_period_adviser' => 'required',
            'third_period_adviser' => 'required',
        ]);

        $student = StudentUser::find($request->id);
        $student->id=$request->id;
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
        $student->first_period_sub = $request->first_period_sub;
        $student->second_period_sub = $request->second_period_sub;
        $student->third_period_sub = $request->third_period_sub;
        $student->first_period_sched = $request->first_period_sched;
        $student->second_period_sched = $request->second_period_sched;
        $student->third_period_sched = $request->third_period_sched;
        $student->first_period_adviser = $request->first_period_adviser;
        $student->second_period_adviser = $request->second_period_adviser;
        $student->third_period_adviser = $request->third_period_adviser;
        $save = $student->save();

        if ($save) {
            return back()->with('success', 'Enrolled Student Data Updated Successfuly!');
        } else {
            return back()->with('fail', 'failed updating');
        }
    }

    function deleteStudentUser($id)
    {
        $student = StudentUser::find($id);
        $student->delete();
        return redirect('/staff/admin/student-users');
    }

    function editStudentUser($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $student = StudentUser::find($id);
        return view('admin.edit-student-users', $data, ['student'=>$student]);
    }
}
