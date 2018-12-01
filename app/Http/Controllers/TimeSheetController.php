<?php

namespace App\Http\Controllers;

use App\TimeSheet;
use Illuminate\Http\Request;
use App\Http\Requests\AddTimeSheetRequest;


class TimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheets = TimeSheet::where('user_id', \Auth::user()->id)->get();
        return view('dashboards.timesheet', compact('timesheets'));
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
    public function store(AddTimeSheetRequest $request)
    {
      $date = jdate('now')->format('%Y/%m/%d');
      $day = jdate('now')->format('l');

//test
      $tdl = TimeSheet::create([
        'day' => $day,
        'date' => $date,
        'description' => $request->description,
        'startHour' => $request->startHour,
        'endHour' => $request->endHour,
        'result' => $request->result,
        'tdl_id' => $request->tdl_id,
        'user_id' => \Auth::user()->id,
      ]);


      \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'فعالیت با موفقیت به سیستم اضافه شد',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
      ));
      return redirect()->back();

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $TimeSheet = TimeSheet::find($id);
      if($TimeSheet->user_id == \Auth::user()->id){
        $TimeSheet = TimeSheet::findOrFail($id);
        $TimeSheet->delete();

        \Session::flash('updateUser', array(
          'flash_title' => 'حذف شد',
          'flash_message' => 'فعالیت با موفقیت حذف شد',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        return redirect()->back();
      }else{
        return redirect()->back();
      }



    }
}
