<?php

namespace App\Repositories;


use App\Contracts\employeeContract;
use App\Models\Department;
use App\Models\Employee;
use App\Models\System;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class employeeRepository implements employeeContract
{

    public function store(array $request)
    {
        $image = uploadFile($request['image'], 'EmployeeImage');
        $input = $request;
        $input['image'] = $image;
        Employee::create($input);
        System::where('id', $request['system_id'])->update(['status' => '1']);
        return response()->json(["statusCode" => 200]);
    }

    public function update(array $request)
    {
        $employee = Employee::find($request['id']);
        if (isset($request['image'])) {
            $image = uploadFile($request['image'], 'EmployeeImage');
        } else {
            $image = $employee->getRawOriginal('image');
        }
        $input = $request;
        $input['image'] = $image;
        $employee->update($input);
        return response()->json(['success' => 'Department updated successfully']);
    }
}
