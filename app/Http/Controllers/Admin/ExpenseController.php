<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Expense;
use App\Location;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        $branches = Location::all();
        return view('pages.accounting.expenses', compact('expenses', 'branches'));
    }

    public function active($id)
    {
        Expense::where('id',$id)
            ->update(['status' => 1]);
        return back();
    }

    public function deactive($id)
    {
        Expense::where('id',$id)
            ->update(['status' => 0]);
        return back();
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
        $expnse = new Expense();
        $expnse->amount = $request->amount;
        $expnse->branch = $request->branch_id;
        $expnse->desc = $request->description;
        $expnse->userid = $request->userid;
        $expnse->date = $request->date;

        $expnse->save();
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
        $expnse = Expense::find($id);
        $expnse->amount = $request->upamount;
        $expnse->branch = $request->upbranch_id;
        $expnse->desc = $request->updescription;
        $expnse->userid = $request->upuserid;
        $expnse->date = $request->update;

        $expnse->save();
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
        Expense::find($id)->delete();
        return back();
    }
}
