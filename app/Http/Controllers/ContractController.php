<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contracts = Contract::all();
        return view('dashboards.contracts', compact('contracts'));
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

      $attachmentFile = $request->file('contractorFile');
      $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
      $attachmentFile->move('storage/Contracts', $attachmentFileName);

      Contract::forceCreate([
        'onvan' => $request->onvan,
        'mozoo' => $request->mozoo,
        'peymankar' => $request->peymankar,
        'mablagh' => $request->mablagh,
        'pardakht' => $request->pardakht,
        'moddat' => $request->moddat,
        'from' => $request->from,
        'to' => $request->to,
        'tazmin' => $request->tazmin,
        'nazer' => $request->nazer,
        'description' => $request->description,
        'contractorFile' => 'storage/Contracts/' . $attachmentFileName,
      ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'قرارداد باموفقیت در سیستم ثبت شد',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
      ));

      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contract = Contract::findOrFail($id);
      $contract->delete();

      \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'قرارداد مورد نظر باموفقیت از سیستم حذف شد.',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
      ));

      return redirect()->back();


    }
}
