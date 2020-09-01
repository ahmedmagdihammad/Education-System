<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Paytypes;
use App\Track;

class PaytypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paytypes = Paytypes::get();
        $tracks = Track::all();
        return view('pages.accounting.paytypes', compact('paytypes', 'tracks'));
    }

    public function active($id)
    {
        Paytypes::where('id',$id)
            ->update(['status' => 1]);
        return back();
    }

    public function deactive($id)
    {
        Paytypes::where('id',$id)
            ->update(['status' => "1"]);
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
        $paytypes = new Paytypes;
        $paytypes->type = $request->type;
        $paytypes->amount = $request->amount;
        $paytypes->levels = $request->levels;
        $paytypes->track = $request->track;

        $paytypes->save();
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
    public function update(Request $request)
    {
        $paytypes = Paytypes::find($request->id);
        $paytypes->type = $request->type;
        $paytypes->amount = $request->amount;
        $paytypes->levels = $request->levels;
        $paytypes->track = $request->track;

        $paytypes->save();
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
        Paytypes::find($id)->delete();
        return back();
    }
}
