<?php

namespace App\Http\Controllers;

use App\Certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $Certificates = Certificates::all();
    return view('dashboards.certifications', compact('Certificates'));
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

    if($request->file('file')){
      $file = $request->file('file');
      $fileName = time() . "_" . $file->getClientOriginalName();
      $file->move('storage/Certificates', $fileName);
    }else{
      $fileName = "nothing";
    }


    Certificates::forceCreate([
      'name' => $request->name,
      'saderKonandeh' => $request->saderKonandeh,
      'dateStart' => $request->dateStart,
      'moddateEtebar' => $request->moddateEtebar,
      'dateEnd' => $request->dateEnd,
      'file' => 'storage/Certificates/' . $fileName,
    ]
  );


  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'گواهینامه به سیستم اضافه شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));
  return redirect()->back();

}

/**
* Display the specified resource.
*
* @param  \App\Certificates  $certificates
* @return \Illuminate\Http\Response
*/
public function show(Certificates $certificates)
{
  //
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Certificates  $certificates
* @return \Illuminate\Http\Response
*/
public function edit(Certificates $certificates)
{
  //
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Certificates  $certificates
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Certificates $certificates)
{
  //
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Certificates  $certificates
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  $Certificates = Certificates::findOrFail($id);
  $Certificates->delete();

  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'گواهینامه موردنظر باموفقیت حذف شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));

  return redirect()->back();

}
}
