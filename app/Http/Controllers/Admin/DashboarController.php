<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdate;
use App\Models\Admin;
use App\Models\Department;
use App\Models\Employee;
use App\Models\System;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function department()
    {
        $dept = Department::get();
        $system = System::get();
        $employee = Employee::get();
        return view('admin.dashboard.index',compact('dept','system','employee'));
    }

    public function profileview()
    {
        return view('admin.dashboard.profile');
    }

    public function profileupdate(ProfileUpdate $request)
    {
        $admin = Admin::get()->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->route('admin.dashboard');
    }
}
