@extends('layouts/dashboard')

@section('headerscripts')
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/wizard.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/selects/selectize.default.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">

<link rel="stylesheet" type="text/css" href="/css/plugins/forms/selectize/selectize.css">
<!-- Timetable CSS Files -->
<link rel="stylesheet" href="vendors/timetables/css/magnific-popup.css">
<link rel="stylesheet" href="vendors/timetables/css/timetable.css">

<link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">

<!--------------------------------------------------->

<!----------- CSS Files for example -------------->
<link href="/vendors/timetables/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="/vendors/timetables/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="/css/bootstrap-glyphicons.css" rel="stylesheet" type="text/css" />



<style media="screen">

#YTO {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: 'Byekan'!important;
  height: 500px!important;
}
#OTY {
  font-size: 16px!important;
  width: 100%!important;
  direction: ltr!important;
  font-family: 'Byekan'!important;
  height: 500px!important;
}

tspan{
  font-size: 16px!important;

}
.dataTables_wrapper{
  direction: rtl;
}

/* asiye added */
.witheColor{
    color: #6c757d !important;
}


</style>
@endsection

@section('content')




<!--  Start Edit Task Assigned to Me -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="showTdl{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $tdlAssignedToThisUser->id }}">جزییات فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center"  class="form form-horizontal form-bordered striped-rows">

          <div class="form-body">


            <div style="display:none" class="form-group row">
              <label class="col-md-3 label-control" for="id">ردیف</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->id }}
              </div>
            </div>



            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">نام فعالیت</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->name }}
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">شرح</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->description }}
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-3 label-control" for="assignerName">ارجاع دهنده</label>
              <div class="col-md-9">
                {{ $tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family }}
              </div>
            </div>


              @foreach ($tdlAssignedToThisUser->users as $user)
              <div class="form-group row">
                  <label class="col-md-3 label-control">متولی های انجام</label>
                  <div class="col-md-9 text-left">
                      {{ $user->name  . " " . $user->family }}
                      <span class="badge {{ $user->pivot->status == 'انجام شده' ? 'badge-success' : 'badge-warning' }}">
                          {{ $user->pivot->status }}
                      </span>
                      فایل پیوست :
                      <a target="_blank" href="{{ $user->pivot->attachment }}">
                          {!! $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "" !!}
                      </a>
                      نتیجه :
                      <span>{{ $user->pivot->result ?? '---' }}</span>
                  </div>
              </div>
          @endforeach


          <div class="form-group row">
              <label class="col-md-3 label-control"> اهمیت  </label>
              <div class="col-md-9">
                  <span class="badge badge-{{$tdlAssignedToThisUser->priority_button}}">
                      {{ $tdlAssignedToThisUser->priority ?? ''}}
                  </span>
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control" for="result"> مستندات متولی انجام </label>
              <div class="col-md-9">
                  <a target="_blank" href="{{ $tdlAssignedToThisUser->doerAttachment }}"> {!! $tdlAssignedToThisUser->doerAttachment !== "storage/TdlAttachments/nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a>
              </div>
          </div>



          <div class="form-group row">
              <label class="col-md-3 label-control">تاریخ ایجاد  </label>
              <div class="col-md-9">
                  {{ jdate($tdlAssignedToThisUser->created_at)->format('Y/m/d') ?? ''}}
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control">توضیحات ارجاع دهنده   </label>
              <div class="col-md-9">
                  {{ $tdlAssignedToThisUser->descriptionAssigner ?? ''}}
              </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 label-control">وضعیت بررسی ارجاع دهنده   </label>
              <div class="col-md-9">
                  <span class="badge badge-{{$tdlAssignedToThisUser->status_button ?? ''}}">
                  {{ $tdlAssignedToThisUser->status ?? ''}}
                  </span>
              </div>
          </div>

          </div>


        </form>


      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Me -->




<!--  Start DetailOtherTaskAssigned to Other -->
@foreach($tdlsAssignedToOther as $tdlAssignedToOther)
<div class="modal fade text-left" id="DetailOtherTask{{ $tdlAssignedToOther->id }}" tabindex="-1" role="dialog" aria-labelledby="DetailOtherTask{{ $tdlAssignedToOther->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">جزییات  فعالیت های ارجاع داده شده از طرف شما به دیگران </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-family:Byekan; direction: rtl" class="modal-body">

        <form  style="vertical-align:center;text-align:center" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div class="form-body">


            <div class="form-group row">
                <label class="col-md-3 label-control" for="description">ردیف  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->id ?? ''}}
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control" for="description">  نام فعالیت  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->name ?? ''}}

                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 label-control">شرح  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->description ?? ''}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">ارجاع دهنده  </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family }}
                </div>
            </div>


            @foreach ($tdlAssignedToOther->users as $user)
                <div class="form-group row">
                    <label class="col-md-3 label-control">متولی های انجام</label>
                    <div class="col-md-9 text-left">
                        {{ $user->name  . " " . $user->family }}
                        <span class="badge {{ $user->pivot->status == 'انجام شده' ? 'badge-success' : 'badge-warning' }}">
                            {{ $user->pivot->status }}
                        </span>
                        فایل پیوست :
                        <a target="_blank" href="{{ $user->pivot->attachment }}">
                            {!! $user->pivot->attachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "" !!}
                        </a>
                        نتیجه :
                        <span>{{ $user->pivot->result ?? '---' }}</span>
                    </div>
                </div>
            @endforeach


            <div class="form-group row">
                <label class="col-md-3 label-control"> اهمیت  </label>
                <div class="col-md-9">
                    <span class="badge badge-{{$tdlAssignedToOther->priority_button}}">
                        {{ $tdlAssignedToOther->priority ?? ''}}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control" for="result"> مستندات متولی انجام </label>
                <div class="col-md-9">
                    <a target="_blank" href="/{{ $tdlAssignedToOther->assignerAttachment }}">
                        {!! $tdlAssignedToOther->assignerAttachment !== "storage/Newtdl/nothing" ? "<i class='ft-file-text' ></i>" : "بدون فایل" !!}
                   </a>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">تاریخ ایجاد  </label>
                <div class="col-md-9">
                    {{ jdate($tdlAssignedToOther->created_at)->format('Y/m/d') ?? ''}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">توضیحات ارجاع دهنده   </label>
                <div class="col-md-9">
                    {{ $tdlAssignedToOther->descriptionAssigner ?? ''}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">وضعیت بررسی ارجاع دهنده   </label>
                <div class="col-md-9">
                    <span class="badge badge-{{$tdlAssignedToOther->status_button ?? ''}}">
                    {{ $tdlAssignedToOther->status ?? ''}}
                    </span>
                </div>
            </div>

        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End Edit Task Assigned to Other -->


<!--  Start detail  status Assigned to Me showDetailStatusAssigner -->
@foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
<div style="font-family:Byekan" class="modal fade text-left" id="showDetailStatusAssigner{{ $tdlAssignedToThisUser->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $tdlAssignedToThisUser->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div style="text-align: center!important;" class="modal-header">
        <h4 style="text-align: center!important;" class="modal-title" id="myModalLabel{{ $tdlAssignedToThisUser->id }}">جزییات فعالیت</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  style=" direction: rtl;" class="modal-body">
        <form style="vertical-align:center;text-align:center"  class="form form-horizontal form-bordered striped-rows">
          <div class="form-body">

            @foreach ($tdlAssignedToThisUser->users as $user)
            @if ($user->id == auth()->user()->id)
                <div class="form-group row">
                    <label class="col-md-3 label-control"> توضیحات ارجاع دهنده  </label>
                    <div class="col-md-9">
                        {{ $user->pivot->descriptionAssigner ?? ''}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control">وضعیت تایید ارجاع دهنده   </label>
                    <div class="col-md-9">
                        <span class="badge badge-{{ $user->status_assigner_pivot }}">
                            {{ $user->pivot->statusAssigner }}
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control">تاریخ درج  </label>
                    <div class="col-md-9">
                        {{ jdate($user->pivot->updated_at)->format('Y/m/d') ?? ''}}
                    </div>
                </div>
                @endif
            @endforeach
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!--  End detail  status Assigned to Me-->


<!--  Body -->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->






      @if ($errors->any())
      <div style="font-family:Byekan" class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif










      <!-- Start My Assigned Tasks To Other Table -->
      <section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">فعالیت های ارجاع داده شده از طرف {{$user->name . ' ' . $user->family}} به دیگران</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                {{-- <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addTask" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i>  افزودن فعالیت  </span></button><br><br> --}}
                <div class="card-body card-dashboard">
                  <p class="card-text">در این قسمت میتوانید فعالیت هایی که به دیگران ارجاع داده اند را بررسی نمایید.</p>
                  <table style="width: 100%;font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                      <tr style="text-align: center;">
                        <th>ردیف</th>
                        <th>نام فعالیت</th>
                        <th>ارجاع دهنده</th>
                        <th>متولی انجام</th>
                        <th>اهمیت</th>
                        <th>آخرین وضعیت</th>
                       <th>تاریخ ایجاد</th>
                        {{-- <th>ویرایش</th>
                        <th>حذف</th> --}}
                      </tr>
                    </thead>
                    <tbody style="text-align: center" >

                      @foreach($tdlsAssignedToOther as $tdlAssignedToOther)
                      <tr>
                        <td>{{ $tdlAssignedToOther->id }}</td>
                        <td style="white-space: pre-wrap"><a style="color:#007bff !important" data-toggle="modal" data-target="#DetailOtherTask{{ $tdlAssignedToOther->id }}">{{ $tdlAssignedToOther->name ?? '' }}</a></td>


                        <td>{{ $tdlAssignedToOther->user->name  . " " . $tdlAssignedToOther->user->family }}</td>
                        <td style="white-space:normal">
                            @foreach ($tdlAssignedToOther->users as $user)
                                @if($user->pivot->status == 'انجام شده')
                                    <a class="text-info" data-toggle="modal" data-target="#EditOtherTaskForAssigner{{ $tdlAssignedToOther->id }}User{{$user->id}}" >
                                        {{ $user->name  . " " . $user->family }} -
                                    </a>
                                @else
                                    {{ $user->name  . " " . $user->family }} -
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <span class="badge badge-{{$tdlAssignedToOther->priority_button}}">
                                {{ $tdlAssignedToOther->priority ?? ''}}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{$tdlAssignedToOther->status_button ?? ''}}">
                                {{ $tdlAssignedToOther->status ?? ''}}
                                </span>
                        </td>

                       <td style="direction: ltr" >{{ jdate($tdlAssignedToOther->created_at)->format('Y/m/d') }}</td>

                        {{-- <td style="text-align:center;" >
                            @if(auth()->user()->id == $tdlAssignedToOther->user->id )
                                <a data-toggle="modal" data-target="#EditOtherTask{{ $tdlAssignedToOther->id }}" >
                                    <i style="font-size: 20px; color: #007bff" class="ft-edit"></i>
                                </a>
                            @endif
                        </td> --}}
                        {{-- <td style="text-align:center;" >
                            @if(auth()->user()->id == $tdlAssignedToOther->user->id )
                            <form action="/Newtdl/delete/{{ $tdlAssignedToOther->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm" onclick="return confirm('آیا برای حذف اطمینان دارید؟')" >
                                    <i style="font-size: 20px;color: red" class="ft-x-square"></i>
                                </button>
                            </form>
                            @endif
                        </td> --}}

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!--  End My Assigned Tasks To Other Table -->

    <!--  My Tasks Table (Activities Assigned To Me) -->
    <section>
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">فعالیت های ارجاع داده شده به {{$user->name . ' ' . $user->family}}</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                {{-- <p class="card-text text-info">لیست ذیل شامل تمامی فعالیت های ارجاع داده شده توسط دیگران به شما میباشد. شما میتوانید با کلیک برروی آیکون تغییرات فعالیت مورد نظر را بروزرسانی کنید.</p> --}}
                <table style="width: 100%;font-family:Byekan;direction: rtl" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                    <thead>
                    <tr style="text-align: center;">
                        <th>ردیف</th>
                        <th>نام فعالیت</th>
                        <th>ارجاع دهنده</th>
                        <th>اهمیت</th>
                        <th>آخرین وضعیت</th>
                        <th> وضعیت شما</th>
                        {{-- <th>ارجاع </th> --}}

                        <th>تاریخ ایجاد</th>
                        {{-- <th>بروزرسانی</th> --}}
                    </tr>
                    </thead>
                    <tbody style="text-align: center" >

                    @foreach($tdlsAssignedToThisUser as $tdlAssignedToThisUser)
                    <tr>
                        <td>{{ $tdlAssignedToThisUser->id }}</td>

                        <td style="text-align:center;color: #007bff" >
                        <a data-toggle="modal" data-target="#showTdl{{ $tdlAssignedToThisUser->id }}" >
                            {{ $tdlAssignedToThisUser->name }}
                        </a>
                        </td>

                        <td>{{ $tdlAssignedToThisUser->user->name  . " " . $tdlAssignedToThisUser->user->family }}</td>

                        <td>
                            <span class="badge badge-{{$tdlAssignedToThisUser->priority_button}}">
                                {{ $tdlAssignedToThisUser->priority ?? ''}}
                            </span>
                        </td>

                        @foreach ($tdlAssignedToThisUser->users as $user)
                            @if($user->id == auth()->user()->id)
                                <td>
                                    <span class="badge badge-{{$user->status_assigner_pivot ?? ''}}">
                                        {{ $user->pivot->statusAssigner ?? ''}}
                                    </span>
                                    <br/>
                                    <a class="text-info" data-toggle="modal" data-target="#showDetailStatusAssigner{{ $tdlAssignedToThisUser->id }}" >
                                        ( جزییات)
                                        </a>
                                </td>
                                <td>
                                    <span class="badge {{ $user->pivot->status == 'انجام شده' ? 'badge-success' : 'badge-warning' }}">
                                        {{ $user->pivot->status }}
                                    </span>
                                </td>
                            @endif
                        @endforeach
                        {{-- <td style="text-align:center;color: #007bff" > <a data-toggle="modal" data-target="#ReferralsTdl{{ $tdlAssignedToThisUser->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>  </td> --}}

                        <td style="direction: ltr" >{{ jdate($tdlAssignedToThisUser->created_at)->format('Y/m/d') }}</td>
                        {{-- <td style="text-align:center;color: #007bff" > <a data-toggle="modal" data-target="#editTdl{{ $tdlAssignedToThisUser->id }}" ><i style="font-size: 20px" class="ft-edit"></i></a>  </td> --}}

                    </tr>
                    @endforeach
                    </tbody>

                </table>
                </div>
            </div>
            </div>
        </div>
        </div>


    </section>
    <!--  End My Tasks Table -->


    </div>
  </div>
</div>


@section('footerscripts')
<script src="vendors/timetables/js/jquery.min.js"></script>
<script src="vendors/timetables/js/jquery.magnific-popup.js"></script>
<script src="vendors/timetables/js/timetable.js"></script>

<script src="/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>


<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>


<script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
<script src="/js/core/libraries/jquery_ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>

<script src="/vendors/timetables/js/moment.min.js"></script>
<script src="/vendors/timetables/js/bootstrap-datetimepicker.min.js"></script>







@endsection
