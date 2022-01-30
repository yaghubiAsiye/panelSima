<?php

namespace App\Http\Controllers;

use App\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = PurchaseRequest::all();
        return view('dashboards.PurchaseRequest.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('dashboards.PurchaseRequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attachmentFile = $request->file('contractorFile');
        $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
        $attachmentFile->move('storage/PurchaseRequest', $attachmentFileName);

        PurchaseRequest::forceCreate([
          'onvan' => $request->onvan,
          'description' => $request->description,
          'peymankar' => $request->peymankar,
          'mablagh' => $request->mablagh,
          'pardakht' => $request->pardakht,
          'moddat' => $request->moddat,
          'status' => "بخش کمیسیون",

          'from' => $request->from,
          'to' => $request->to,

          'contractorFile' => 'storage/PurchaseRequest/' . $attachmentFileName,
        ]);

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => 'درخواست خرید جدید باموفقیت در سیستم ثبت شد',
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
