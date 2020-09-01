<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Vacation;
use DB;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::get();
        $employees = Employee::with('users')->get();
        $vacations = Vacation::all();
        return view('pages.profiles.profile', compact('employees', 'emp', 'vacations'));
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
        $profile = DB::table('employees')->
        where('id',$request->id)
          ->update([
            'name' => $request->name,
            'branch' => $request->branch,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return response()->json($profile);
    }

    public function vacationstore(Request $request)
    {
        $vacation = new Vacation();
        $vacation->account = $request->account;
        $vacation->start_date = $request->start_date;
        $vacation->end_date = $request->end_date;
        $vacation->of_dayes = $request->of_dayes;
        $vacation->credit = $request->credit;

        $vacation->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
