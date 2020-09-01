<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Survey;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $surveys = Survey::all();
        return view('pages/hrdepartment/surveys', compact('surveys', 'i'));
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
        $survey = new Survey();
        $survey->work = $request->work;
        $survey->salary = $request->salary;
        $survey->months = $request->months;
        $survey->study = $request->study;
        $survey->reason = $request->reason;
        $survey->gender = $request->gender;
        $survey->age = $request->age;
        $survey->datetime = $request->datetime;

        $survey->save();
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
    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);
        $survey->work = $request->upwork;
        $survey->salary = $request->upsalary;
        $survey->months = $request->upmonths;
        $survey->study = $request->upstudy;
        $survey->reason = $request->upreason;
        $survey->gender = $request->upgender;
        $survey->age = $request->upage;
        $survey->datetime = $request->updatetime;

        $survey->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Survey::find($id)->delete();
        return redirect()->back();
    }
}
