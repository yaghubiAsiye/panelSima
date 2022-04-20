<?php

namespace App\Http\Controllers;

use App\Commission;
use App\CommissionMajor;
use App\PurchaseRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CommissionMajorRequest;

class CommissionMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = CommissionMajor::all();
        return view('dashboards.Commission.CommissionMajor', compact('contracts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $PurchaseRequest = PurchaseRequest::find($id);
        return view('dashboards.Commission.CommissionMajorCreate', compact('PurchaseRequest'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommissionMajorRequest $request)
    {
        if ($request->file('fileestelambaha')) {
            $attachmentFile = $request->file('fileestelambaha');
            $fileestelambaha = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/CommissionMajor ', $fileestelambaha);
        } else {
            $fileestelambaha = "nothing";
        }



        $tdl = CommissionMajor::create([
            'mozoo' => $request->mozoo,
            'datebargozari' => $request->datebargozari,
            'typemonaqese' => $request->typemonaqese,
            'arzeshmoamele' => $request->arzeshmoamele,
            'user_id' => \Auth::user()->id,
            'fileestelambaha' => 'storage/CommissionMajor/' . $fileestelambaha,
            'tedadtaminkonandegan' => $request->tedadtaminkonandegan,
            'mahaltahvil' => $request->mahaltahvil,
            'hazinehaml' => $request->hazinehaml,
            'garanti' => $request->garanti,
            'modatmoamele' => $request->modatmoamele,
            'khadamatpasazforosh' => $request->khadamatpasazforosh,
            'status_confirmation' => 'بررسی نشده',
            'purchase_requests_id' => $request->purchase_requests_id
        ]);


        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت به سیستم اضافه شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->route('CommissionMajor', ['id' => $request->purchase_requests_id]);
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
        $Suggestion = CommissionMajor::findOrFail($id);
        $Suggestion->delete();
        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => ' با موفقیت از سیستم حذف شد.',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }
    public function listCommissionsMajorFromPurchase($id)
    {
        $contracts = CommissionMajor::where('purchase_requests_id', $id)
        ->with('confirms')
        ->get();
        // $contracts = CommissionMajor::find(1);

        // var_dump($contracts->first()->confirms->first()->id);
        return view('dashboards.Commission.PurchaseCommissionMajor', compact('contracts'));
    }
}
