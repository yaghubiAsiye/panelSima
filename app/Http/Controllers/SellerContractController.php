<?php

namespace App\Http\Controllers;

use App\SellerContract;
use Illuminate\Http\Request;

class SellerContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contracts = SellerContract::all();
        return view('dashboards.sellercontract', compact('contracts'));

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
      $attachmentFile->move('storage/SellerContracts', $attachmentFileName);

      SellerContract::forceCreate([
        'onvan' => $request->onvan,
        'mozoo' => $request->mozoo,
        'tarafedovvom' => $request->tarafedovvom,
        'mablaghMahiane' => $request->mablaghMahiane,
        'mablaghSaliane' => $request->mablaghSaliane,
        'moddat' => $request->moddat,
        'from' => $request->from,
        'to' => $request->to,
        'pardakht' => $request->pardakht,
        'davar' => $request->davar,
        'description' => $request->description,
        'contractorFile' => 'storage/SellerContracts/' . $attachmentFileName,
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
     * @param  \App\SellerContract  $sellerContract
     * @return \Illuminate\Http\Response
     */
    public function show(SellerContract $sellerContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerContract  $sellerContract
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerContract $sellerContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerContract  $sellerContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerContract $sellerContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerContract  $sellerContract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contract = SellerContract::findOrFail($id);
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
