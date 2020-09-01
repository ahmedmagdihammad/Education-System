<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Job;
use App\User;
use App\Employee;
use App\Location;
use App\Department;

class EmployeesControllors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $employees = Employee::get();
        $branches = Location::get();
        $departments = Department::get();
        $jobs = Job::get();
        return view('pages.hrdepartment.employees', compact('i','employees', 'branches', 'departments', 'jobs'));
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
        // return response()->json($request);
        $employee = new Employee;
        $employee->code = $request->code;
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->birthdate = $request->birthdate;
        $employee->startdate = $request->startdate;
        $employee->salarytype = $request->salarytype;
        $employee->salary = $request->salary;
        $employee->job = $request->job;
        $employee->department = $request->department;
        $employee->branch = $request->branch;
        $employee->gender = $request->gender;
        $employee->mobile = $request->mobile;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->nationality = $request->nationality;
        $employee->save();
        $user = new User();
        $user->userid = $employee->id;
        $user->mobile = $employee->mobile;
        $user->email = $employee->email;
        $user->password = '';
        $user->type = 'E';
        $user->save();
        $employee['department'] = $employee->getDepartment['title'];
        $employee['jobtitle'] = $employee->getJobtitle['title'];
        $employee['branch'] = $employee->getBranch['name'];
        return response()->json($employee);
    }

    public function active(Request $request) {
        $id = $request['id'];
        $update = User::where('userid', $id)->update(['status' => "1"]);
        if($update){
           return 1; 
        }else{
            return 0;
        }
    }

    public function deactive(Request $request) {
        $id = $request['id'];
        $update = User::where('userid',$id)->update(['status' => "0"]);
        if($update){
           return 1; 
        }else{
            return 0;
        }
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
        $employee = Employee::find($request->id);
        $employee->code = $request->code;
        $employee->name = $request->name;
        $employee->gender = $request->gender;
        $employee->mobile = $request->mobile;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->nationality = $request->nationality;
        $employee->startdate = $request->startdate;
        $employee->salarytype = $request->salarytype;
        $employee->salary = $request->salary;
        $employee->department = $request->department;
        $employee->job = $request->job;
        $employee->branch = $request->branch;
        $employee->birthdate = $request->birthdate;
        $employee->update();
        $employee['department'] = $employee->Department;
        $employee['jobtitle'] = $employee->getJobtitle['title'];
        $employee['branch'] = $employee->getBranch;
        $employee['status'] = $employee->getUser->status;
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Employee::find($request->id)->delete();
        return response()->json();
    }

    public function getJobs(Request $request)
    {
        $jobs=Job::where('department',$request->id)->get();
        return $jobs;
    }

    public function editgetJobs(Request $request)
    {
        $jobs=Job::where('department',$request->id)->get();
        return $jobs;
    }
}
