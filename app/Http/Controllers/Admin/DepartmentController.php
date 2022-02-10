<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\departmentContract;
use App\DataTables\DepartmentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\storeRequest;
use App\Http\Requests\Department\updateRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
   public function __construct(departmentContract $departmentService)
   {
       $this->departmentService = $departmentService;
   }

    public function index(DepartmentDataTable $dataTable)
    {
      return $dataTable->render('admin.dashboard.department.index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.department.add');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    { 
        return $this->departmentService->store($request->all());
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
        $department = Department::find($id);
        return view('admin.dashboard.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request)
    {
        return $this->departmentService->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Department::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }
}
