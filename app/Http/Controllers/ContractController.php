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

      Contract::create([
        'name' => $request->name,
        'description' => $request->description,
        'contractor' => $request->contractor,
        'from' => $request->from,
        'to' => $request->to,
        'file' => 'storage/Contracts/' . $attachmentFileName,
      ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'Seccessfully',
        'flash_message' => 'Contract Created Successfully',
        'flash_level' => 'success',
        'flash_button' => 'Okay'
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
      return redirect()->back();

    }
}
