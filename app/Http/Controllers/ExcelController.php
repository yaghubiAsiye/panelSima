<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

//use Maatwebsite\Excel\Excel;
//use Excel;


class ExcelController extends Controller
{
    public function viewExcel($id)
    {

        $invoice =  Invoice::findOrFail($id);

        return view('dashboards.invoices.invoiceExcel', compact('invoice'));
    }

    public function downloadExcel($id)
    {
//        dd($id);
        $invoice =  Invoice::findOrFail($id);
        $data[] = [
            'تاریخ' . $invoice->date  => 'شماره' .  $invoice->No,
            'كد اقتصادی : 411339837594' => 'شناسه ملی : 10102631409',
            'شرکت ارتباطات پرشيا (سهامي خاص ) ' => '',
            'دفتر تهران : خیابان کریمخان زند، خیابان نجات الهی جنوبی، کوچه حقیقت طلب ، پلاک ۳۴ ' => 'تلفن : 88814571 6',
           'نام شرکت  خریدار' => $invoice->company_name,
            'آدرس' => $invoice->address,
            'تلفن' => $invoice->phone,
            'اعتبار' => $invoice->validity,

        ];

        return Excel::create('invoice', function($excel) use ($invoice) {
           $excel->sheet('mysheet', function($sheet) use($invoice) {
              $sheet->loadView('dashboards.invoices.invoiceExcel')->with('invoice', $invoice);
           });
        })->download('xls');

    }
}
