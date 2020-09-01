<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Track;
use App\Student;
use App\Location;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $students = Student::where('date','LIKE',date('Y-m-d')."%")->get();
        $tracks = Track::get();
        $locations = Location::get();
        return view('pages.studentsmanager.students', compact('i','students', 'tracks', 'locations'));
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
        $student = new Student;
        $student->track = $request->track;
        $student->name = $request->name;
        $student->idnumber = $request->idnumber;
        $student->email = $request->email;
        $student->mobile = $request->mobile;
        $student->mobile2 = $request->mobile2;
        $student->location = $request->branch;
        $student->area = $request->area;
        $student->address = $request->address;
        $student->job = $request->job;
        $student->gender = $request->gender;
        $student->referal = $request->referal;
        $student->cause = $request->cause;
        $student->target = $request->target;
        $student->employee = Auth::User()->id;
        $student->date = date('Y-m-d H:i:s');
        $student->save();
        return back();
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
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->track = $request->uptrack;
        $student->name = $request->upname;
        $student->idnumber = $request->upidnumber;
        $student->email = $request->upemail;
        $student->mobile = $request->upmobile;
        $student->mobile2 = $request->upmobile2;
        $student->location = $request->upbranch;
        $student->area = $request->uparea;
        $student->address = $request->upaddress;
        $student->job = $request->upjob;
        $student->gender = $request->upgender;
        $student->referal = $request->upreferal;
        $student->cause = $request->upcause;
        $student->target = $request->uptarget;
        // return $student;
        $student->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Student::find($id)->delete();
        return back();
    }
}
