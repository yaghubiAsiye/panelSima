<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archive;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Archive::all();
        return view('dashboards.archives', compact('archives'));

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
            $file->move('storage/archive', $fileName);
        }else{
            $fileName = "nothing";
        }

        $phoneBook = Archive::forceCreate([
            'type' => $request->type,
            'number' => $request->number,
            'file' => $fileName,
            'meetingDate' => $request->meetingDate,

        ]);



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'صورتجلسه باموفقیت در سیستم ثبت شد',
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
        $phoneBook = Archive::findOrFail($id);


        if($request->file('file'))
        {
            $attachmentFile = $request->file('file');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/archive', $attachmentFileName);

            if (file_exists(($phoneBook->file)))
                unlink($phoneBook->contractorFile);

            $phoneBook->file = 'storage/archive/' . $attachmentFileName;

        }

        $phoneBook->type = $request->type;
        $phoneBook->number = $request->number;
        $phoneBook->file = $request->file;
        $phoneBook->meetingDate = $request->meetingDate;

        $phoneBook->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'صورتجلسه باموفقیت در سیستم آپدیت شد',
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
        $contract = Archive::findOrFail($id);
        $contract->delete();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'صورتجلسه مورد نظر باموفقیت از سیستم حذف شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();
    }
}
