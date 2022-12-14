<?php

namespace App\Http\Controllers;

use App\Divar;
use Illuminate\Http\Request;

class DivarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Dokumentation = Divar::where('user_id', auth()->user()->id)
        ->get();
        return view('dashboards.divar.index', compact('Dokumentation'));
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
            $file->move('storage/Dokumentation', $fileName);
          }else{
            $fileName = "nothing";
          }


          Dokumentation::forceCreate([
            'name' => $request->name,
            'saderKonandeh' => $request->saderKonandeh,
            'dateStart' => $request->dateStart,
            'moddateEtebar' => $request->moddateEtebar,
            'dateEnd' => $request->dateEnd,
            'file' => 'storage/Dokumentation/' . $fileName,
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
        $Dokumentation = Dokumentation::findOrFail($id);

        if($request->file('file'))
        {
            $attachmentFile = $request->file('file');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/Dokumentation', $attachmentFileName);

            if (file_exists(($Dokumentation->contractorFile)))
                unlink($Dokumentation->contractorFile);

            $Dokumentation->file = 'storage/Dokumentation/' . $attachmentFileName;

        }

        $Dokumentation->name = $request->name;
        $Dokumentation->saderKonandeh = $request->saderKonandeh;
        $Dokumentation->dateStart = $request->dateStart;
        $Dokumentation->moddateEtebar = $request->moddateEtebar;
        $Dokumentation->dateEnd = $request->dateEnd;

        $Dokumentation->update();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'سند   باموفقیت  آپدیت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Dokumentation = Dokumentation::findOrFail($id);
        $Dokumentation->delete();

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => 'سند موردنظر باموفقیت حذف شد.',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));

        return redirect()->back();
    }
}
