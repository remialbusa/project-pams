<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Faqs;
use App\Models\TechnicalForm;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    function loginAdmin()
    {
        return view('admin.login-admin');
    }
    function register()
    {
        return view('admin.register-admin');
    }
    function saveAdmin(Request $request)
    {
        //validate info
        $request->validate([
            'employee_id' => 'required',
            'role' => 'required',
            'name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'password' => 'required'
        ]);

        //insert admin data
        $admin = new Admin();
        $admin->employee_id = $request->employee_id;
        $admin->role = $request->role;
        $admin->name = $request->name;
        $admin->middle_name = $request->middle_name;
        $admin->last_name = $request->last_name;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return redirect('staff/admin/manage-users');
        } else {
            return back()->with('fail', 'failed inserting admin data');
        }
    }
    //edit route
    function editAdminDetails($id){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminData = Admin::find($id);
        return view('admin.edit-user', $data, ['adminData'=>$adminData]);
    }

    //update admin user details
    function updateAdminDetails(Request $request){
        $request->validate([
            'employee_id' => 'required',
            'role' => 'required',
            'name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::find($request->id);
        $admin->employee_id = $request->employee_id;
        $admin->role = $request->role;
        $admin->name = $request->name;
        $admin->middle_name = $request->middle_name;
        $admin->last_name = $request->last_name;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('staff/admin/manage-users');
    }

    function deleteAdminUser($id){
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('staff/admin/manage-users');
    }

    //verify admin login credential
    function verify(Request $request)
    {
        //validate request
        $request->validate([
            'user_type' => 'required',
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        $userType = $request->user_type;
        $adminInfo = Admin::where('employee_id', '=', $request->employee_id)->first();

        if ($userType == "Admin") {
            if ($adminInfo && Hash::check($request->password, $adminInfo->password)) {
                $request->session()->put('LoggedAdmin', $adminInfo->id);
                return redirect('staff/admin/manage-users');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }elseif ($userType == "OGS Officer") {
            if ($adminInfo && Hash::check($request->password, $adminInfo->password)) {
                $request->session()->put('LoggedAdmin', $adminInfo->id);
                return redirect('staff/admin/dashboard');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }elseif($userType == "MIS Officer") {
            if ($adminInfo && Hash::check($request->password, $adminInfo->password)) {
                $request->session()->put('LoggedAdmin', $adminInfo->id);
                return redirect('staff/admission-officer/mis');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }else{
            return back()->with('fail', 'Invalid credentials');
        } 
                  
    }
    function manageUsersView(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminList = Admin::all();
        return view('admin.manage-users.manage-users', $data, ['admins'=>$adminList]);
    }

    function systemFaqs(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $faqs = Faqs::all();
        $adminList = Admin::all();
        return view('admin.system-configuration.faqs', $data, ['faqs'=>$faqs, 'admins'=>$adminList]);
    }

    function systemTechnicalsupport(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $technicalForm = TechnicalForm::all();
        return view('admin.system-configuration.technical-support', $data, ['technicalForm'=>$technicalForm]);
    }

    function deleteTechnicalForm($id){
        $technicalForm = TechnicalForm::find($id);
        $technicalForm->delete();
        return redirect('/staff/admin/system-configuration/technicalsupport');
    }

    function logoutAdmin(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('staff/auth/login');
        }
    }

    #Active Semester
    function activeSemester()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $school_year = SchoolYear::all();
        $enrolledStudent = EnrolledStudent::all();
        return view('admin.system-configuration.active-semester', $data, ['school_year'=>$school_year,'enrolledStudent'=>$enrolledStudent]);
    }

    #Insert Active Semester
    function insertSemester(Request $request)
    {
        $request->validate([
           'school_year' => 'required',
           'semester' => 'required',
           'status' => 'required',
        ]);

        $semester = new SchoolYear();
        $semester->school_year = $request->school_year;
        $semester->semester = $request->semester;
        $semester->status = $request->status;
        $save = $semester->save();

        if ($save) {
            return back()->with('success', 'Inserted Semester Successfully!');
        } else {
            return back()->with('fail', 'Failed Inserting');
        }
    }

    function deleteSemester($id)
    {
        $semester = SchoolYear::find($id);
        $semester->delete();
        return back();
    }

    function editActiveSemester($id)
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $school_year = SchoolYear::find($id);
        return view('admin.edit-active-semester', $data ,['school_year'=>$school_year]);
    }

    function updateSemester(Request $request)
    {
        $request->validate([
           'school_year' => 'required',
           'semester' => 'required',
           'status' => 'required',
        ]);

        $semester = SchoolYear::find($request->id);
        $semester->school_year = $request->school_year;
        $semester->semester = $request->semester;
        $semester->status = $request->status;
        $save = $semester->save();

        if ($save) {
            return redirect('/staff/auth/system-configuration/active-semester');
        } else {
            return back()->with('fail', 'Failed Updating');
        }
    }
}
