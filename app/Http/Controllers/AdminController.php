<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\EnrolledStudent;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            return redirect('staff/auth/login');
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
                return back()->with('fail', 'incorrect password');
            }
        }elseif ($userType == "OGS Officer") {
            if ($adminInfo && Hash::check($request->password, $adminInfo->password)) {
                $request->session()->put('LoggedAdmin', $adminInfo->id);
                return redirect('staff/admin/dashboard');
            } else {
                return back()->with('fail', 'incorrect password');
            }
        }elseif($userType == "MIS Officer") {
            if ($adminInfo && Hash::check($request->password, $adminInfo->password)) {
                $request->session()->put('LoggedAdmin', $adminInfo->id);
                return redirect('staff/admission-officer/mis');
            } else {
                return back()->with('fail', 'incorrect password');
            }
        }else{
            return back()->with('fail', 'invalid credentials');
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

    function systemAnnouncements(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminList = Admin::all();
        return view('admin.system-configuration.announcements', $data, ['admins'=>$adminList]);
    }

    function systemFaqs(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminList = Admin::all();
        return view('admin.system-configuration.faqs', $data, ['admins'=>$adminList]);
    }

    function systemTechnicalsupport(){
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $adminList = Admin::all();
        return view('admin.system-configuration.technical-support', $data, ['admins'=>$adminList]);
    }

    function logoutAdmin(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('staff/auth/login');
        }
    }

    function activeSemester()
    {
        if(session()->has('LoggedAdmin')){
            $admin = Admin::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        $enrolledStudent = EnrolledStudent::all();
        return view('admin.system-configuration.active-semester', $data, ['enrolledStudent'=>$enrolledStudent]);
    }

}
