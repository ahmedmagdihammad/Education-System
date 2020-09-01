<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Payment;
use App\Student;

class StudPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $i = 1;
        $student = Student::find($id);
        $paystuds = Payment::where('userid', $id)->get();
        return view('pages.studentsmanager.payStuds', compact('id', 'paystuds', 'student', 'i'));
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
        $paytud = new Payment();
        $paytud->userid = $request->userid;
        $paytud->amount = $request->amount;
        $paytud->total = $request->total;
        $paytud->levels = $request->levels;
        $paytud->type = $request->type;
        $paytud->location = $request->location;
        $paytud->used = $request->used;
        $paytud->date = $request->date;

        $paytud->save();
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
        $paytud = Payment::find($id);
        $paytud->userid = $request->upuserid;
        $paytud->amount = $request->upamount;
        $paytud->total = $request->uptotal;
        $paytud->levels = $request->uplevels;
        $paytud->type = $request->uptype;
        $paytud->location = $request->uplocation;
        $paytud->used = $request->upused;
        $paytud->date = $request->update;

        $paytud->save();
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
        Payment::find($id)->delete();
        return back();
    }
}
