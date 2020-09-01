<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Level;
use App\Track;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $levels = Level::get();
        $tracks = Track::get();
        return view('pages.adminstration.levels', compact('i','levels', 'tracks'));
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
        $level = new Level;
        $level->track = $request->track;
        $level->level = $request->level;
        $level->order = $request->order;
        $level->max = $request->max;

        $level->save();
        $level['trackTitle'] = $level->getTrack['title'];
        return response()->json($level);
    }

    public function active(Request $request) {
        $id = $request['id'];
        $update = Level::where('id', $id)->update(['status' => "1"]);

        if($update){
           return 1; 
        }else{
            return 0;
        }
        
    }

    public function deactive(Request $request) {
        $id = $_POST['id'];
        $track =Level::where('id',$id)->update(['status' => "0"]);
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
        $level = Level::find($request->id);
        $level->track = $request->track;
        $level->level = $request->level;
        $level->order = $request->order;
        $level->max = $request->max;

        $level->save();
        $level['trackTitle'] = $level->getTrack['title'];
        return response()->json($level);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Level::find($request->id)->delete();
        return response()->json();
    }
}
