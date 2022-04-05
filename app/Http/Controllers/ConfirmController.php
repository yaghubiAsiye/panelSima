<?php

namespace App\Http\Controllers;

use App\Confirm;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function store(Request $request)
    {
        Confirm::forceCreate([
            'confirmable_type' => $request->confirmable_type,
            'confirmable_id' => $request->confirmable_id,
            'status' => $request->status,
            'description' => $request->description,
          ]);

          \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' باموفقیت در سیستم ثبت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
          ));

          return redirect()->back();
    }
}
