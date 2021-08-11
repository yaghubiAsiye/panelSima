<?php

namespace App\Http\Controllers;

use App\Invoice;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\AddInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('dashboards.invoices.index', compact('invoices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddInvoiceRequest $request)
    {
//        dd($request);
        $total = 0;

        $invoice = Invoice::forceCreate([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'No' => $request->No,
            'date' => \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date),
            'validity' => $request->validity,
            'economic_code' => $request->economic_code,
            'postal_code' => $request->postal_code,
            'national_code' => $request->national_code,
            'registration_number' => $request->registration_number,
            'user_id' => \Auth::user()->id,

//            'discount' => $request->discount,

        ]);

        $rows = $request->input('row');

        foreach ($rows as $row)
        {

            $total_price = $row['unit_price'] * $row['number'];
            $total += $total_price;

            $objects[] = [
                'description' => $row['description'],
                'number' => $row['number'],
                'unit' => $row['unit'],
                'unit_price' => $row['unit_price'],
                'invoice_id' => $invoice->id,
                'total_price' => $total_price
            ];
        }


        Product::insert($objects);

        $final_total = $total + ($total * 0.09);
        $invoice->total = $total;
        $invoice->tax = $total * 0.09;

        $invoice->final_total = $final_total;
        $invoice->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'پیش فاکتور باموفقیت در سیستم صادر شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect(url('invoices'));
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
        $phoneBook = Regulation::findOrFail($id);


        if($request->file('file'))
        {
            $attachmentFile = $request->file('file');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/regulations', $attachmentFileName);

            if (file_exists(($phoneBook->file)))
                unlink($phoneBook->contractorFile);

            $phoneBook->file = 'storage/regulations/' . $attachmentFileName;

        }

        $phoneBook->title = $request->title;
        $phoneBook->user_id = \Auth::user()->id;

        $phoneBook->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'آیین نامه باموفقیت در سیستم آپدیت شد',
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
}
