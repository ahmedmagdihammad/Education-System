<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Batche;
use App\Track;

class BatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batche::get();
        $tracks = Track::get();
        return view('pages.adminstration.batches', compact('batches', 'tracks'));
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
        $batche = new Batche;
        $batche->title = $request->title;
        $batche->track = $request->track;
        $batche->start = $request->start;
        $batche->exam = '0';
        $batche->current = '0';
        $batche->status = '1';
        $batche->save();
        $batche['trackTitle'] = $batche->getTrack['title'];
        return response()->json($batche);
    }

    public function active(Request $request) {
        $id = $request->id;
        $update = Batche::where('id', $id)->update(['status' => "1"]);
        if($update){
           return 1; 
        }else{
            return 0;
        }
        
    }

    public function current(Request $request) {
        Batche::where('current', '1')->update(['current'=>"0"]);
        $id = $request->id;
        $update = Batche::where('id', $id)->update(['current' => "1"]);
        if($update){
           return 1; 
        }else{
            return 0;
        }
        
    }

    public function exam(Request $request) {
        Batche::where('exam', '1')->update(['exam'=>"0"]);
        $id = $request->id;
        $update = Batche::where('id', $id)->update(['exam' => "1"]);
        if($update){
           return 1; 
        }else{
            return 0;
        }
        
    }

    public function deactive(Request $request) {
        $id = $request->id;
        $track =Batche::where('id',$id)->update(['status' => "0"]);
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
        $batche = Batche::find($request->id);
        $batche->title = $request->title;
        $batche->track = $request->track;
        $batche->start = $request->start;
        $batche->update();
        $batche['trackTitle'] = $batche->getTrack['title'];
        return response()->json($batche);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Batche::find($request->id)->delete();
        return response()->json();
    }
}
