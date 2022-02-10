<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\employeeContract;
use App\DataTables\EmployeeDataTable;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\System;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(employeeContract $employeService)
    {
        $this->employeService = $employeService;
    }

    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dept = Department::pluck('name', 'id')->toArray();
        $system = System::pluck('name', 'id')->toArray();
        return view('admin.dashboard.employee.add',compact('dept','system'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->employeService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $dept = Department::pluck('name', 'id')->toArray();
        $system = System::pluck('name', 'id')->toArray();
        return view('admin.dashboard.employee.edit',compact('employee','dept','system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->employeService->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Employee::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }
}
