<?php

namespace App\Http\Controllers;

use App\Dailywork;
use Illuminate\Http\Request;

class DailyWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Dailywork::all();
        return view('dashboards.dailywork.dailywork', compact('archives'));
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


        $phoneBook = Dailywork::forceCreate([
            'time' => $request->time,
            'result' => $request->result,
            'assignment' => $request->assignment,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_id' =>\Auth::user()->id,

        ]);



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' گزارش روزانه امروزشما  باموفقیت در سیستم ثبت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
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
