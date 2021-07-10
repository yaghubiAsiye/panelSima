<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenderRequest;
use App\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::all();
        return view('dashboards.tenders', compact('tenders'));

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
    public function store(TenderRequest $request)
    {


        if ($request->file('peyvastDaryafti'))
        {
            $peyvastDaryafti = $this->uploadFile($request->file('peyvastDaryafti'));
        }else{
            $peyvastDaryafti = 'nothing';
        }

        if ($request->file('tasvirZemanat'))
        {
            $tasvirZemanat = $this->uploadFile($request->file('tasvirZemanat'));
        }else{
            $tasvirZemanat = 'nothing';
        }

        if ($request->file('tasvirPishnahadFanni'))
        {
            $tasvirPishnahadFanni = $this->uploadFile($request->file('tasvirPishnahadFanni'));
        }else{
            $tasvirPishnahadFanni = 'nothing';
        }

        if ($request->file('tasvirPishnahadGheymat'))
        {
            $tasvirPishnahadGheymat = $this->uploadFile($request->file('tasvirPishnahadGheymat'));
        }else{
            $tasvirPishnahadGheymat = 'nothing';
        }

        if ($request->file('attachmentErsali'))
        {
            $attachmentErsali = $this->uploadFile($request->file('attachmentErsali'));
        }else{
            $attachmentErsali = 'nothing';
        }

        Tender::create([
            'addedById' => \Auth::user()->id,
            'type' => $request->type,
            'karshenasDaryaft' => $request->karshenasDaryaft,
            'nahveDaryaft' => $request->nahveDaryaft,
            'monagheseGozar' => $request->monagheseGozar,
            'mozoo' => $request->mozoo,
            'codeMonagheseGozar' => $request->codeMonagheseGozar,
            'codeSamaneSetadIran' => $request->codeSamaneSetadIran,
            'dateRecieved' => $request->dateRecieved,
            'peyvastDaryafti' => $peyvastDaryafti,
            'timeJalasePorseshPasokh' => $request->timeJalasePorseshPasokh,
            'mohlat' => $request->mohlat,
            'tarikhBazgoshaei' => $request->tarikhBazgoshaei,
            'namePhoneKarfarma' => $request->namePhoneKarfarma,
            'mablaghZemanat' => $request->mablaghZemanat,
            'moddatGharardad' => $request->moddatGharardad,
            'nazarieKomisionTavan' => $request->nazarieKomisionTavan,
            'karshenasPaygiri' => $request->karshenasPaygiri,
            'mablaghEstelam' => $request->mablaghEstelam,
            'tasvirZemanat' => $tasvirZemanat,
            'tasvirPishnahadFanni' => $tasvirPishnahadFanni,
            'tasvirPishnahadGheymat' => $tasvirPishnahadGheymat,
            'attachmentErsali' => $attachmentErsali,
            'natijeMonaghese' => $request->natijeMonaghese,
            'paasokhKarfarma' => $request->paasokhKarfarma,
            'akharinEghdamat' => $request->akharinEghdamat,
            'tarikhEsterdadZemanat' => $request->tarikhEsterdadZemanat,
        ]);

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'کارپذیری با موفقیت به سیستم اضافه شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show(Tender $tender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $tender = Tender::where('id', $request->id)->first();
        return view('dashboards.tendersEdit', compact('tender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(TenderRequest $request, Tender $tender)
    {
        if ($request->file('peyvastDaryafti'))
        {
            $peyvastDaryafti = $this->uploadFile($request->file('peyvastDaryafti'));
        }else{
            $peyvastDaryafti = 'nothing';
        }

        if ($request->file('tasvirZemanat'))
        {
            $tasvirZemanat = $this->uploadFile($request->file('tasvirZemanat'));
        }else{
            $tasvirZemanat = 'nothing';
        }

        if ($request->file('tasvirPishnahadFanni'))
        {
            $tasvirPishnahadFanni = $this->uploadFile($request->file('tasvirPishnahadFanni'));
        }else{
            $tasvirPishnahadFanni = 'nothing';
        }

        if ($request->file('tasvirPishnahadGheymat'))
        {
            $tasvirPishnahadGheymat = $this->uploadFile($request->file('tasvirPishnahadGheymat'));
        }else{
            $tasvirPishnahadGheymat = 'nothing';
        }

        if ($request->file('attachmentErsali'))
        {
            $attachmentErsali = $this->uploadFile($request->file('attachmentErsali'));
        }else{
            $attachmentErsali = 'nothing';
        }

        $tender = Tender::find($request->id);
        $tender->addedById = \Auth::user()->id;
        $tender->type = $request->type;
        $tender->karshenasDaryaft = $request->karshenasDaryaft;
        $tender->nahveDaryaft = $request->nahveDaryaft;
        $tender->monagheseGozar = $request->monagheseGozar;
        $tender->mozoo = $request->mozoo;
        $tender->codeMonagheseGozar = $request->codeMonagheseGozar;
        $tender->codeSamaneSetadIran = $request->codeSamaneSetadIran;
        $tender->dateRecieved = $request->dateRecieved;
        $peyvastDaryafti != 'nothing' ? $tender->peyvastDaryafti = $peyvastDaryafti : '';
        $tender->timeJalasePorseshPasokh = $request->timeJalasePorseshPasokh;
        $tender->mohlat = $request->mohlat;
        $tender->tarikhBazgoshaei = $request->tarikhBazgoshaei;
        $tender->namePhoneKarfarma = $request->namePhoneKarfarma;
        $tender->mablaghZemanat = $request->mablaghZemanat;
        $tender->moddatGharardad = $request->moddatGharardad;
        $tender->nazarieKomisionTavan = $request->nazarieKomisionTavan;
        $tender->karshenasPaygiri = $request->karshenasPaygiri;
        $tender->mablaghEstelam = $request->mablaghEstelam;
        $tasvirZemanat != 'nothing' ? $tender->tasvirZemanat = $tasvirZemanat : '';
        $tasvirPishnahadFanni != 'nothing' ? $tender->tasvirPishnahadFanni = $tasvirPishnahadFanni : '';
        $tasvirPishnahadGheymat != 'nothing' ? $tender->tasvirPishnahadGheymat = $tasvirPishnahadGheymat : '';
        $attachmentErsali != 'nothing' ? $tender->attachmentErsali = $attachmentErsali : '';
        $tender->natijeMonaghese = $request->natijeMonaghese;
        $tender->paasokhKarfarma = $request->paasokhKarfarma;
        $tender->akharinEghdamat = $request->akharinEghdamat;
        $tender->tarikhEsterdadZemanat = $request->tarikhEsterdadZemanat;
        $tender->save();


        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'کارپذیری با موفقیت به سیستم اضافه شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user()->email == 'rahmani@persiatc.com'){
            $tender = Tender::findOrFail($id);
            $tender->delete();
            \Session::flash('updateUser', array(
                'flash_title' => 'انجام شد',
                'flash_message' => 'کارپذیری با موفقیت از سیستم حذف شد.',
                'flash_level' => 'success',
                'flash_button' => 'بستن'
            ));
            return redirect()->back();
        }else{
            \Session::flash('updateUser', array(
                'flash_title' => 'عدم دسترسی',
                'flash_message' => 'تنها مدیر سیستم میتواند کارپذیری را حذف نماید.',
                'flash_level' => 'warning',
                'flash_button' => 'بستن'
            ));
            return redirect()->back();
        }


    }
}
