<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Vacation;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacations = Vacation::get();
        return view('pages/hrdepartment/vacations', compact('vacations'));
    }

    public function acceptVacation($id)
    {
        $accept = Vacation::where('id', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function rejectVacation($id)
    {
        $accept = Vacation::where('id', $id)->update(['status' => 2]);
        return redirect()->back();
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
        $vac = new Vacation();
        $vac->userid = $request->userid;
        $vac->startdate = $request->startdate;
        $vac->enddate = $request->enddate;
        $vac->days = $request->days;
        $vac->credit = $request->credit;
        $vac->save();
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
        $vac = Vacation::find($id);
        $vac->userid = $request->upuserid;
        $vac->startdate = $request->upstartdate;
        $vac->enddate = $request->upenddate;
        $vac->days = $request->updays;
        $vac->credit = $request->upcredit;
        $vac->save();
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
        
        Vacation::find($id)->delete();
        return back();
    }
}
