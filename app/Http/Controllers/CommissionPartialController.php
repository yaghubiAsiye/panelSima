<?php

namespace App\Http\Controllers;


use App\Commission;
use App\CommissionPartial;
use Illuminate\Http\Request;
use App\Http\Requests\CommissionPartialRequest;

class CommissionPartialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = CommissionPartial::all();
        return view('dashboards.Commission.CommissionPartial', compact('commissions'));
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
    public function store(CommissionPartialRequest $request)
    {
        if ($request->file('fileestelambaha')) {
            $attachmentFile = $request->file('fileestelambaha');
            $fileestelambaha = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/CommissionPartial ', $fileestelambaha);
        } else {
            $fileestelambaha = "nothing";
        }



        $tdl = CommissionPartial::create([
            'mozoo' => $request->mozoo,
            'darkhastkonande' => $request->darkhastkonande,
            'arzeshmoamele' => $request->arzeshmoamele,
            'tedadestelambaha' => $request->tedadestelambaha,
            'user_id' => \Auth::user()->id,
            'fileestelambaha' => 'storage/CommissionPartial/' . $fileestelambaha,
            'typekala' => $request->typekala,
            'datesabt' => $request->datesabt,
            'mahaltahvil' => $request->mahaltahvil,
            'hazinehaml' => $request->hazinehaml,
            'garanti' => $request->garanti,
            'khadamatpasazforosh' => $request->khadamatpasazforosh,
            'email_status' => $request->email_status,
            'status_confirmation' => 'بررسی نشده',

        ]);


        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت به سیستم اضافه شد',
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
    public function update(Request $request)
    {



        $tdl = CommissionPartial::where('id', $request->id)
            ->update([
                'mozoo' => $request->mozoo,
                'darkhastkonande' => $request->darkhastkonande,
                'arzeshmoamele' => $request->arzeshmoamele,
                'tedadestelambaha' => $request->tedadestelambaha,
                'user_id' => \Auth::user()->id,
                'typekala' => $request->typekala,
                'datesabt' => $request->datesabt,
                'mahaltahvil' => $request->mahaltahvil,
                'hazinehaml' => $request->hazinehaml,
                'garanti' => $request->garanti,
                'khadamatpasazforosh' => $request->khadamatpasazforosh,
                'email_status' => $request->email_status,
            ]);

            if ($request->file('fileestelambaha')) {
                $attachmentFile = $request->file('fileestelambaha');
                $fileestelambaha = time() . "_" . $attachmentFile->getClientOriginalName();
                $attachmentFile->move('storage/CommissionPartial ', $fileestelambaha);
                $tdl->fileestelambaha = 'storage/CommissionPartial/' . $fileestelambaha;
                $tdl->save();
            }

            \Session::flash('updateUser', array(
                'flash_title' => 'انجام شد',
                'flash_message' => ' با موفقیت بروز شد.',
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
        //
    }

    public function storeIdeaComisiun()
    {
        $commission = CommissionPartial::find(1);
        return view('dashboards.Commission.storeIdeaComisiun', compact('commission'));
    }
}
