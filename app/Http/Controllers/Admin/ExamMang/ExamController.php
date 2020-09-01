<?php

namespace App\Http\Controllers\Admin\ExamMang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Exam;
use App\Track;
use App\Level;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();
        $tracks = Track::all();
        return view('pages.examMang.exams', compact('exams', 'tracks'));
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
        $exam = new Exam();
        $exam->exam = $request->exam;
        $exam->track = $request->track_id;
        $exam->level = $request->level_id;
        $exam->duration = $request->duration;
        $exam->success = $request->success_rate;
        $exam->save();
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
        $exam = Exam::find($id);
        $exam->exam = $request->upexam;
        $exam->track = $request->uptrack_id;
        $exam->level = $request->uplevel_id;
        $exam->duration = $request->upduration;
        $exam->success = $request->upsuccess_rate;

        $exam->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::find($id)->delete();
        return back();
    }

    public function getLevel(Request $request)
    {
        $levels = Level::where('track', '=', $request->id)->get();
        return $levels;
    }
}
