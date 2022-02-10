<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\systemContract;
use App\DataTables\SystemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\System\storeRequest;
use App\Http\Requests\System\updateRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function __construct(systemContract $systemService)
    {
        $this->systemService = $systemService;
    }

    public function index(SystemDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.system.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.system.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        return $this->systemService->store($request->all());
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
        $system = System::find($id);
        return view('admin.dashboard.system.edit',compact('system'));
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
       return $this->systemService->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = System::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
        
    }
}
