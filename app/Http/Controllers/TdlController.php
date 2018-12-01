<?php

namespace App\Http\Controllers;

use App\TimeSheet;
use App\Tdl;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AddTdlRequest;
use App\Http\Requests\UpdateTdlRequest;

class TdlController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::all();
    $tdlsAssignedToThisUser = Tdl::where('user_id', '=', \Auth::user()->id)->get();
    $tdlsAssignedToOther = Tdl::where('assignerId', '=', \Auth::user()->id)->get();
    return view('tdl', compact('tdlsAssignedToThisUser', 'tdlsAssignedToOther', 'users'));
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
  public function store(AddTdlRequest $request)
  {
    $jDateToday = jdate('now')->format('%Y/%m/%d');

    if($request->file('assignerAttachment')){
      $attachmentFile = $request->file('assignerAttachment');
      $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
      $attachmentFile->move('storage/TdlAttachments', $attachmentFileName);
    }else{
      $attachmentFileName = "nothing";
    }

    $tdl = Tdl::create([
      'name' => $request->name,
      'description' => $request->description,
      'user_id' => $request->assignedTo,
      'status' => 'بررسی نشده',
      'assignerId' => \Auth::user()->id,
      'assignerName' => \Auth::user()->name . " " . \Auth::user()->family,
      'priority' => $request->priority,
      'assignerAttachment' => 'storage/TdlAttachments/' . $attachmentFileName,
      'doerAttachment' => 'storage/TdlAttachments/nothing',
      'jDate' => $jDateToday
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
  * @param  \App\Tdl  $tdl
  * @return \Illuminate\Http\Response
  */
  public function show(Tdl $tdl)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Tdl  $tdl
  * @return \Illuminate\Http\Response
  */
  public function edit(Tdl $tdl)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Tdl  $tdl
  * @return \Illuminate\Http\Response
  */
  public function updateFromDoer(UpdateTdlRequest $request, Tdl $tdl)
  {

    if($request->file('doerAttachment')){
      $attachmentFile = $request->file('doerAttachment');
      $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
      $attachmentFile->move('storage/TdlAttachments', $attachmentFileName);
    }else{
      $attachmentFileName = "nothing";
    }



     Tdl::where('id', $request->id)
    ->update([
      'status' => $request->status,
      'holdPoint' => $request->holdPoint,
      'doerDescription' => $request->doerDescription,
      'doerAttachment' => 'storage/TdlAttachments/' . $attachmentFileName,

    ]);


    //Create New TimeSheet
    if ($request->status == 'انجام شده' && isset($request->startHour)) {
    $updatedTdl = Tdl::find($request->id);
    $date = jdate('now')->format('%Y/%m/%d');
    $day = jdate('now')->format('l');
    $tdl = TimeSheet::create([
      'day' => $day,
      'date' => $date,
      'description' => $updatedTdl->name,
      'startHour' => $request->startHour,
      'endHour' => $request->endHour,
      'result' => $updatedTdl->doerDescription,
      'tdl_id' => $updatedTdl->id,
      'user_id' => \Auth::user()->id,
    ]);
  }



    \Session::flash('updateUser', array(
      'flash_title' => 'انجام شد',
      'flash_message' => 'فعالیت با موفقیت بروز شد.',
      'flash_level' => 'success',
      'flash_button' => 'بستن'
    ));
    return redirect()->back();


  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Tdl  $tdl
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $tld = Tdl::find($id);
    if($tld->assignerId == \Auth::user()->id){
      $tld = Tdl::findOrFail($id);
      $tld->delete();

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
