<?php

namespace App\Http\Controllers\NewParts;

use App\User;
use App\Baner;
use App\Models\Newtdl;
use App\Models\NewtdlUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewtdlRepository;
use App\Http\Requests\NewParts\NewtdlStoreRequest;

class NewtdlController extends Controller
{

    private $newtdls;

    public function __construct(NewtdlRepository $newtdls)
    {
        $this->newtdls = $newtdls;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('name', '!=', 'delete user')->get();
        $baners = Baner::all();
        $tdlsAssignedToThisUser = auth()->user()->newtdls;
        $tdlsAssignedToOther = $this->newtdls->getBy('user_id', auth()->user()->id);

        $chart['ytoMotevaghef'] = NewtdlUser::where('user_id', '=', auth()->user()->id)->where('status', 'متوقف')->count();
        $chart['ytoAnjamshode'] = NewtdlUser::where('user_id', '=', auth()->user()->id)->where('status', 'انجام شده')->count();
        $chart['ytoDarhaaleanjam'] = NewtdlUser::where('user_id', '=', auth()->user()->id)->where('status', 'درحال انجام')->count();
        $chart['ytoBarresinashode'] = NewtdlUser::where('user_id', '=', auth()->user()->id)->where('status', 'بررسی نشده')->count();

        $chart['otuMotevaghef'] = $this->newtdls->getCountByAuth('status', 'متوقف');
        $chart['otuAnjamshode'] = $this->newtdls->getCountByAuth('status', 'انجام شده');
        $chart['otuDarhaaleanjam'] = $this->newtdls->getCountByAuth('status', 'درحال انجام');
        $chart['otuBarresinashode'] = $this->newtdls->getCountByAuth('status', 'بررسی نشده');
        $box['1'] = $this->newtdls->getCountByAuth("created_at", now('d'));
        $box['5'] = $this->newtdls->getCountByAuth("created_at", now('m'));

        $box['2'] = Newtdl::where("created_at", now('d'))->where('user_id', auth()->user()->id)->where('status', 'انجام شده')->count('id');
        $box['6'] = Newtdl::where("created_at", now('m'))->where('user_id', auth()->user()->id)->where('status', 'انجام شده')->count('id');
        $box['7'] = Newtdl::where("created_at", now('m'))->where('user_id', auth()->user()->id)->where('status', 'بررسی نشده')->count('id');

        return view('dashboards.newparts.newtdl', compact('baners','tdlsAssignedToThisUser', 'tdlsAssignedToOther', 'users', 'chart', 'box'));


    }

    public function getTdlsAssignedToOther($id)
    {
        $user = User::find($id);
        $tdlsAssignedToOther = $this->newtdls->getBy('user_id', $id);
        $tdlsAssignedToThisUser = $user->newtdls;

        return view('dashboards.newparts.newtdlOneUser', compact('tdlsAssignedToThisUser', 'tdlsAssignedToOther', 'user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewtdlStoreRequest $request)
    {

        $data = $this->prepareData($request);
        $newtdl = $this->newtdls->create($data);
        $newtdl->users()->attach($request->assignedTo);
        $this->newtdls->sessionFlash();
        return redirect()->back();
    }

    public function updateFromDoer(Request $request, Newtdl $tdl)
    {

        if($request->status == 'انجام شده' || $request->status == 'متوقف')
        {
            $this->validate($request, [
                'result' => 'required',
            ]);
        }

        $fileName = $this->newtdls->uploadFile('Newtdl', $request->attachment);

        $NewtdlUser = NewtdlUser::find($request->newtdl_id);
        $NewtdlUser->update([
            'status' => $request->status ?? $NewtdlUser->status ,
            'attachment' => $fileName,
            'result' => $request->result,
        ]);

        $this->newtdls->sessionFlash();
        return redirect()->back();


    }

    public function updateAssignedToOther(Request $request, Newtdl $tdl)
    {
        $data = $this->prepareData($request);
        $this->newtdls->update($tdl, $data);

        // dd($request->assignedTo);
        $tdl->users()->sync($request->assignedTo);

        $this->newtdls->sessionFlash();
        return redirect()->back();

    }

    public function updateAssignerStatus(Request $request, Newtdl $tdl)
    {

        $NewtdlUser = NewtdlUser::find($request->pivot_id);
        $NewtdlUser->update([
            'statusAssigner' => $request->statusAssigner,
            'descriptionAssigner' => $request->descriptionAssigner,
        ]);

        $this->newtdls->sessionFlash();
        return redirect()->back();

    }




    public function destroy($id)
    {
        $newtdls = $this->newtdls->find($id);
        $newtdls->users()->detach();
        $this->newtdls->delete($newtdls);
        $this->newtdls->sessionFlash();
        return redirect()->back();

    }




    public function prepareData($request)
    {
        $fileName = $this->newtdls->uploadFile('Newtdl', $request->file('assignerAttachment'));


        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'status' => $request->status,
            'assignerAttachment' =>  $fileName,
            'priority' => $request->priority
        ];
        return $data;
    }
}
