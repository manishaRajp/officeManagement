<?php

namespace App\Repositories;

use App\Contracts\departmentContract;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class departmentRepository implements departmentContract
{

    public function store(array $request)
    {
        Department::create($request);
        return response()->json(["statusCode" => 200]);
    }
    public function update(array $request)
    {
        $department = Department::find($request['id']);
        $department->update($request);
        return response()->json(['success' => 'Department updated successfully']);
    }
   
}
