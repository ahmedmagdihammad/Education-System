<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Refund;
use App\Payment;

class PayRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $i = 1;
        $paystud = Payment::find($id);
        $payrefunds = Refund::where('payid', $paystud->id)->get();
        return view('pages.studentsmanager.payrefunds', compact('paystud', 'payrefunds', 'i'));
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
        $refund = new Refund();
        $refund->payid = $request->payid;
        $refund->amount = $request->amount;
        $refund->location = $request->location;
        $refund->admin = Auth()->user()->id;
        $refund->date = $request->date;

        $refund->save();
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
        $refund = Refund::find($id);
        $refund->payid = $request->uppayid;
        $refund->amount = $request->upamount;
        $refund->location = $request->uplocation;
        $refund->admin = Auth()->user()->id;
        $refund->date = $request->update;

        $refund->save();
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
        Refund::find($id)->delete();
        return back();
    }
}
