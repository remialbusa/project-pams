<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisOfficer;
use Illuminate\Support\Facades\Hash;

class MisOfficerController extends Controller
{
    //
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
            'name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'password' => 'required'
        ]);

        //insert data
        $admin = new MisOfficer();
        $admin->employee_id = $request->employee_id;
        $admin->name = $request->name;
        $admin->middle_name = $request->middle_name;
        $admin->last_name = $request->last_name;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'admin inserted successfuly');
        } else {
            return back()->with('fail', 'failed inserting admin data');
        }
    }
    function verify(Request $request)
    {
        //validate request
        $request->validate([
            'user_type' => 'required',
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        $userType = $request->user_type;

        $adminInfo = MisOfficer::where('employee_id', '=', $request->employee_id)->first();

        if ($userType == "1" && $adminInfo) {
            if (Hash::check($request->password, $adminInfo->password)) {
                $request->session()->put('LoggedAdmin', $adminInfo->id);
                return redirect('staff/admin/manage-users');
            } else {
                return back()->with('fail', 'incorrect password');
            }
        } else {
            return back()->with('fail', 'employee ID does not exist');
        }
    }
    function manageUsersView(){
        if(session()->has('LoggedAdmin')){
            $admin = MisOfficer::where('id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo'=>$admin
            ];
        }
        return view('admin.manage-users', $data);
    }
    function systemConfigView(){
        return view('admin.system-configuration');
    }

    function logoutAdmin(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('staff/auth/login');
        }
    }
}
