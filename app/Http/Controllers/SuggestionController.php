<?php

namespace App\Http\Controllers;

use App\Suggestion;
use App\User;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
      if (\Auth::user()->id == 6 OR \Auth::user()->id == 42){
          $suggestions = Suggestion::all();
      }else{
          $suggestions = Suggestion::where('addedById', \Auth::user()->id)->orWhere('requestedFrom', \Auth::user()->position)->get();
      }

      $managers = User::where('position', 'like', '%مدیر%')->get();
      return view('dashboards.Suggestions', compact('suggestions', 'managers'));

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


    if($request->file('attachment')){
      $attachmentFile = $request->file('attachment');
      $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
      $attachmentFile->move('storage/Suggestions', $attachmentFileName);
    }else{
      $attachmentFileName = "Nothing";
    }



    Suggestion::create([
      'description' => $request->description,
      'requestedFrom' => $request->requestedFrom,
      'addedById' => \Auth::user()->id,
      'addedByName' => \Auth::user()->name . " " . \Auth::user()->family,
      'scope' => $request->scope,
      'attachment' => 'storage/Suggestions/' . $attachmentFileName,
      'doerDescription' => $request->doerDescription,
    ]);

    \Session::flash('updateUser', array(
      'flash_title' => 'انجام شد',
      'flash_message' => 'درخواست شما باموفقیت ارسال شد.',
      'flash_level' => 'success',
      'flash_button' => 'بستن'
    ));

    return redirect()->back();
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Suggestion  $suggestion
  * @return \Illuminate\Http\Response
  */
  public function show(Suggestion $suggestion)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Suggestion  $suggestion
  * @return \Illuminate\Http\Response
  */
  public function edit(Suggestion $suggestion)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Suggestion  $suggestion
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Suggestion $suggestion)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Suggestion  $suggestion
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $Suggestion = Suggestion::findOrFail($id);
    $Suggestion->delete();
    \Session::flash('updateUser', array(
      'flash_title' => 'انجام شد',
      'flash_message' => 'درخواست با موفقیت از سیستم حذف شد.',
      'flash_level' => 'success',
      'flash_button' => 'بستن'
    ));
    return redirect()->back();

  }
}
