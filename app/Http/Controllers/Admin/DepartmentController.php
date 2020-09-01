<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Department;
use App\Employee;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        $employees = Employee::all();
        return view('pages.hrdepartment.departments', compact('departments', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department;
        $department->title = $request->title;
        $department->parent = $request->parent;
        $department->save();
        if($department->parent==0){
            $department['parentTitle'] = "--";
        }else{
            $department['parentTitle'] = $department->getParent['title'];
        }

        return response()->json($department);
    }

    public function addmanager(Request $request, $id)
    {
        $department = Department::find($request->id);
        $department->title = $request->addmanagname;
        $department->parent = $request->addmanagparent;
        $department->manager = $request->addmanagmanager;
        $department->save();
        
        return redirect()->back();
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
        //
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
        $department = Department::find($request->id);
        $department->title = $request->title;
        $department->parent = $request->parent;
        $department->save();
        if($department->parent==0){
            $department['parentTitle'] = "--";
        }else{
            $department['parentTitle'] = $department->getParent['title'];
        }

        if($department->manager==0){
            $department['manager'] = 0;
        }else{
            $department['manager'] = $department->getEmployee['name'];
        }
        
        return response()->json($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Department::find($request->id)->delete();
        return response()->json();
    }
}
