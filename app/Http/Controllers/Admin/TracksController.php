<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Track;
use DB;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::get();
        return view('pages.adminstration.tracks', compact('tracks'));
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
        $track = new Track;
        $track->title = $request->title;
        $track->status = $request->status;

        $track->save();
        return response()->json($track);
    }

    public function active(Request $request) {
        $id = $request['id'];
        $update = Track::where('id', $id)->update(['status' => "1"]);

        if($update){
           return 1; 
        }else{
            return 0;
        }
        
    }

    public function deactive(Request $request) {
        $id = $_POST['id'];
        $track =Track::where('id',$id)->update(['status' => "0"]);
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
        $track = Track::find($request->id);
        $track->title = $request->title;

        $track->save();
        return response()->json($track);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Track::find($request->id)->delete();
        return response()->json();
    }
}
