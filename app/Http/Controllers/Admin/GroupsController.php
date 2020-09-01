<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Time;
use App\Group;
use App\Level;
use App\Track;
use App\Batche;
use App\Location;
use App\Employee;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $times = Time::get();
        $levels = Level::get();
        $tracks = Track::get();
        $batches = Batche::get();
        $employees = Employee::get();
        $locations = Location::get();
        $curBatch = Batche::where("current", "1")->first();
        $groups = Group::where("batch", $curBatch->id)->get();
        return view('pages.adminstration.groups', compact('i', 'groups', 'locations', 'batches', 'levels', 'times', 'tracks', 'employees'));
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
        $group = new Group;
        $group->track = $request->track;
        $group->level = $request->level;
        $group->gender = $request->gender;
        $group->time = $request->time;
        $group->start = $request->start;
        $group->end = $request->end;
        $group->location = $request->location;
        $group->batch = $request->batch;
        $group->count = "0";
        $group->teacher = "0";
        $group->save();
        $group['trackTitle'] = $group->getTrack['title'];
        $group['levelName'] = $group->getLevel['level'];
        $group['locationName'] = $group->getLocation['name'];
        $group['batchTitle'] = $group->getBatch['title'];
        $group['timeSlot'] = $group->getTime['time'];
        return response()->json($group);
    }

    public function addTeacher(Request $request){
        $group = Group::find($request->group);
        $group->teacher = $request->teacher;
        $group->update();
        $group['status'] = "200";
        $group['teacherName'] = substr($group->getTeacher->name, 0, 12);
        return response()->json($group);
    }

    public function removeTeacher(Request $request){
        $group = Group::find($request->group);
        $group->teacher = "0";
        $group->update();
        return response()->json($group);
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
        $group = Group::find($request->id);
        $group->track = $request->track;
        $group->level = $request->level;
        $group->gender = $request->gender;
        $group->time = $request->time;
        $group->start = $request->start;
        $group->end = $request->end;
        $group->location = $request->location;
        $group->batch = $request->batch;
        $group->update();
        $group['trackTitle'] = $group->getTrack['title'];
        $group['levelName'] = $group->getLevel['level'];
        $group['locationName'] = $group->getLocation['name'];
        $group['batchTitle'] = $group->getBatch['title'];
        $group['timeSlot'] = $group->getTime['time'];
        $group['teacherName'] = ($group->teacher==0?"":substr($group->getTeacher->name, 0, 12));
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Group::find($request->id)->delete();
        return response()->json();
    }
}
