<?php

namespace App\Http\Controllers\NewParts;

use App\User;
use App\Proceeding;
use App\Models\Approval;
use Illuminate\Http\Request;
use App\Models\ApprovalDetail;
use App\Models\ApprovalDetailUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewParts\ApprovalStoreRequest;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::where('name', '!=', 'delete user')->get();

        if(auth()->user()->position == 'مدیر عامل')
        {
            $search = 'مدیریت';
            $Proceedings = ApprovalDetail::all();

        }
        else if(auth()->user()->position == 'مدیر فنی')
        {
            $search = 'فنی';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'like', '%'.$search.'%')->get();
        }
        else if(auth()->user()->position == 'مدیر مالی')
        {
            $search = 'مالی';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'like', '%'.$search.'%')->get();
        }
        else if(auth()->user()->position == 'مدیر بازرگانی')
        {
            $search = 'بازرگانی';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'LIKE', '%'.$search.'%')->get();
        }
        else if(auth()->user()->position == 'مدیر اداری')
        {
            $search = 'اداری';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'LIKE', '%'.$search.'%')->get();
        }
        else{
            $Proceedings = ApprovalDetail::whereHas('users',  function($q)
            {
                $q->where('user_id', auth()->user()->id);
            })->get();
        }


        return view('dashboards.newparts.Approvals.approval', compact('Proceedings', 'users'));
    }


  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $users = User::where('name', '!=', 'delete user')->get();
    return view('dashboards.newparts.Approvals.create', compact('users'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ApprovalStoreRequest $request)
  {

    // dd('ok');
        if($request->file('filejalase')){
            $file = $request->file('filejalase');
            $filejalase = time() . "_" . $file->getClientOriginalName();

            $file->move('storage/Mosavvabat', $filejalase);
        }else{
            $filejalase = "nothing";
        }



            $Approval = Approval::forceCreate([
            'date' => $request->date,
            'number' => $request->number,
            'MeetingType' => $request->MeetingType,
            'title' => $request->title,
            'hazerin' => $request->hazerin,
            'fileSooratJalase' => $filejalase,
            'user_id' => auth()->user()->id
            ]
        );

        $rows = $request->input('row');

        foreach ($rows as $row)
        {
            $eghdamKonande = implode(',', $row['eghdamKonande']);
            $objects[] = [
                'mohlateEghdam' => $row['mohlateEghdam'],
                'sharheMosavvabe' => $row['sharheMosavvabe'],
                'radifeMosavvabe' => $row['radifeMosavvabe'],
                'eghdamKonande' => $eghdamKonande,
                'approval_id' => $Approval->id,
            ];
        }


        ApprovalDetail::insert($objects);


        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت به سیستم اضافه شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->route('Approval.index');

    }




    public function show(Proceeding $proceeding)
    {
    //
    }


    public function edit(Proceeding $proceeding)
    {
    //
    }


    public function update(Request $request, $id)
    {
        $approvalDetail = ApprovalDetail::find($id);
        if($request->receiver_status && $request->receiver_result)
        {
            if($request->file('receiver_attachment')){
                $file = $request->file('receiver_attachment');
                $filejalase = time() . "_" . $file->getClientOriginalName();

                $file->move('storage/Mosavvabat', $filejalase);
            }else{
                $filejalase = "nothing";
            }
            ApprovalDetailUser::forceCreate([
                'receiver_status' => $request->receiver_status,
                'receiver_result' => $request->receiver_result,
                'receiver_attachment' => $filejalase,
                'user_id' => auth()->user()->id,
                'sender_id' => 6,
                'approval_detail_id' => $approvalDetail->approval->id,
            ]);
        }
        elseif($request->receiver_id)
        {
            $approvalDetail->users()->attach($request->receiver_id, ['sender_id' => auth()->user()->id]);
            $approvalDetail->update([
                'status' => 'ارجاع به کارشناس'
            ]);
        }

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت  انجام  شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $Proceeding = Approval::findOrFail($id);
        $Proceeding->delete();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'مصوبه با موفقیت از سیستم حذف شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();

    }

    public function updateAssignerStatus(Request $request,$id)
    {
        return redirect()->back();

    }
}
