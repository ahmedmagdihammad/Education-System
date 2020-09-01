<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Payroll;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $payrolls = Payroll::all();
        return view('pages.hrdepartment.payrolls', compact('payrolls', 'i'));
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
        $payroll = new Payroll;
        $payroll->code = $request->code;
        $payroll->name = $request->name;
        $payroll->mobile = $request->mobile;
        $payroll->salary = $request->salary;
        $payroll->workdays = $request->workdays;
        $payroll->overtime = $request->overtime;
        $payroll->deduction = $request->deduction;
        $payroll->advance = $request->advance;
        $payroll->allowance = $request->allowance;
        $payroll->total = $request->total;
        $payroll->date = $request->date;
        $payroll->save();
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
        $payroll = Payroll::find($id);
        $payroll->code = $request->upcode;
        $payroll->name = $request->upname;
        $payroll->mobile = $request->upmobile;
        $payroll->salary = $request->upsalary;
        $payroll->workdays = $request->upworkdays;
        $payroll->overtime = $request->upovertime;
        $payroll->deduction = $request->updeduction;
        $payroll->advance = $request->upadvance;
        $payroll->allowance = $request->upallowance;
        $payroll->total = $request->uptotal;
        $payroll->date = $request->update;
        $payroll->save();
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
        Payroll::find($id)->delete();
        return back();
    }
}
