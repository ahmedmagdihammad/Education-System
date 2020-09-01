<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Time;
use App\Track;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::get();
        $tracks = Track::get();
        return view('pages.adminstration.times', compact('times', 'tracks'));
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
        $time = new Time;
        $time->track = $request->track;
        $time->time = $request->time;
        $time->sort = $request->sort;
        $time->status = 1;
        $time->save();
        $time['trackTitle'] = $time->getTrack['title'];
        return response()->json($time);
    }

    public function active(Request $request) {
        $id = $request['id'];
        $update = Time::where('id', $id)->update(['status' => "1"]);

        if($update){
           return 1; 
        }else{
            return 0;
        }
        
    }

    public function deactive(Request $request) {
        $id = $_POST['id'];
        $track =Time::where('id',$id)->update(['status' => "0"]);
        if($track){
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
        $time = Time::find($request->id);
        $time->track = $request->track;
        $time->time = $request->time;

        $time->save();
        $time['trackTitle'] = $time->getTrack->title;
        return response()->json($time);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Time::find($request->id)->delete();
        return response()->json();
    }
}
