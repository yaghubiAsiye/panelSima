@extends('layouts/dashboard')

@section('headerscripts')
    <style media="screen">

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

    </style>
@endsection

@section('content')


    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">مناقصات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="tenders" class="form form-horizontal form-bordered striped-rows">
                        @csrf
                        <div style="font-family:byekan" class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نوع درخواست<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="type">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کارشناس دریافت کننده<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="karshenasDaryaft">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نحوده دریافت<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="nahveDaryaft">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مناقصه گذار<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="monagheseGozar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">موضوع یا نام  پروژه<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mozoo">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کد شناسایی مناقصه گذار</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="codeMonagheseGozar">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کد شناسایی سامانه ستاد ایران</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="codeSamaneSetadIran">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تاریخ دریافت<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="dateRecieved" type="text" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل پیوست دریافتی</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="peyvastDaryafti">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">زمان جلسه پرسش و پاسخ</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="timeJalasePorseshPasokh" type="text" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مهلت ارسال پاسخ<sup style="color: red; font-size: 16px">*</sup></label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mohlat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تاریخ بازگشایی</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="tarikhBazgoshaei" type="text" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نام و شماره تماس کارشناس کارفرما</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="namePhoneKarfarma">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مبلغ ضمانت شرکت در مناقصه</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mablaghZemanat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مدت قرارداد</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="moddatGharardad">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نظریه کمیسیون توان</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="nazarieKomisionTavan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">کارشناس پیگیری و ارسال مستندات</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="karshenasPaygiri">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">مبلغ استعلام بها</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="mablaghEstelam">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تصویر ضمانت</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="tasvirZemanat">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تصویر پیشنهاد فنی و اسناد ارزیابی</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="tasvirPishnahadFanni">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تصویر پیشنهاد قیمت</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="tasvirPishnahadGheymat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل پیوست ارسالی</label>
                                <div class="col-md-9">
                                    <input type="file" id="fileMostanadat" class="form-control" name="attachmentErsali">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">نتیجه مناقصه</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="natijeMonaghese">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">پاسخ کارفرما</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="paasokhKarfarma">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">آخرین اقدامات</label>
                                <div class="col-md-9">
                                    <input type="text" id="number" class="form-control" name="akharinEghdamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">تاریخ استرداد ضمانتنامه</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control date" style="" placeholder="کلیک کنید" name="tarikhEsterdadZemanat" type="text"/>
                                </div>
                            </div>





                        </div>

                        <div style="font-family:Byekan" class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> افزودن
                            </button>

                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> لغو
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">کار پذیری </h4>
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
                                <button style="float: left;margin-left: 40px!important;"
                                        class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"
                                        data-target="#addUser" data-toggle="modal"><span class="ladda-label">  <i
                                                class="ft-plus"></i> افزودن </span></button>
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>توسط</th>
                                            <th>شناسه </th>
                                            <th>نوع درخواست</th>
                                            <th>کارشناس دریافت کننده</th>
                                            <th>نحوده دریافت</th>
                                            <th>مناقصه گذار</th>
                                            <th>موضوع یا نام  پروژه </th>
{{--                                            <th>کد شناسایی مناقصه گذار</th>--}}
{{--                                            <th>کد شناسایی سامانه ستاد ایران</th>--}}
{{--                                            <th>تاریخ دریافت </th>--}}
{{--                                            <th>فایل پیوست دریافتی</th>--}}
{{--                                            <th>زمان جلسه پرسش و پاسخ</th>--}}
{{--                                            <th>مهلت ارسال پاسخ </th>--}}
{{--                                            <th>تاریخ بازگشایی</th>--}}
{{--                                            <th>نام و شماره تماس کارشناس کارفرما</th>--}}
{{--                                            <th>مبلغ ضمانت شرکت در مناقصه</th>--}}
{{--                                            <th>مدت قرارداد</th>--}}
{{--                                            <th>نظریه کمیسیون توان </th>--}}
{{--                                            <th>کارشناس پیگیری و ارسال مستندات</th>--}}
{{--                                            <th>مبلغ استعلام بها</th>--}}
{{--                                            <th>تصویر ضمانت</th>--}}
{{--                                            <th>تصویر پیشنهاد فنی و اسناد ارزیابی</th>--}}
{{--                                            <th>تصویر پیشنهاد قیمت</th>--}}
{{--                                            <th>فایل پیوست ارسالی</th>--}}
{{--                                            <th>نتیجه مناقصه</th>--}}
{{--                                            <th>پاسخ کارفرما</th>--}}
{{--                                            <th>آخرین اقدامات</th>--}}
{{--                                            <th>تاریخ استرداد ضمانتنامه</th>--}}
{{--                                            <th>تاریخ ایجاد</th>--}}
{{--                                            <th>تاریخ آخرین ویرایش</th>--}}
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($tenders as $tender)
                                            <tr>
                                                <td><a href="{{ url('tenders/show/' . $tender->id) }}">{{ $tender->user->name . ' ' . $tender->user->family}}</a></td>
                                                <td>{{ $tender->id }}</td>
                                                <td>{{ $tender->type }}</td>
                                                <td>{{ $tender->karshenasDaryaft }}</td>
                                                <td>{{ $tender->nahveDaryaft }}</td>
                                                <td style="white-space: normal">{{ $tender->monagheseGozar }}</td>
                                                <td style="white-space: normal">{{ $tender->mozoo }}</td>
{{--                                                <td>{{ $tender->codeMonagheseGozar }}</td>--}}
{{--                                                <td>{{ $tender->codeSamaneSetadIran }}</td>--}}
{{--                                                <td>{{ $tender->dateRecieved }}</td>--}}
{{--                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tender->peyvastDaryafti }}"> {!! $tender->peyvastDaryafti !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>--}}
{{--                                                <td>{{ $tender->timeJalasePorseshPasokh }}</td>--}}
{{--                                                <td>{{ $tender->mohlat }}</td>--}}
{{--                                                <td>{{ $tender->tarikhBazgoshaei }}</td>--}}
{{--                                                <td>{{ $tender->namePhoneKarfarma }}</td>--}}
{{--                                                <td>{{ $tender->mablaghZemanat }}</td>--}}
{{--                                                <td>{{ $tender->moddatGharardad }}</td>--}}
{{--                                                <td>{{ $tender->nazarieKomisionTavan }}</td>--}}
{{--                                                <td>{{ $tender->karshenasPaygiri }}</td>--}}
{{--                                                <td>{{ $tender->mablaghEstelam }}</td>--}}
{{--                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tender->tasvirZemanat }}"> {!! $tender->tasvirZemanat !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>--}}
{{--                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tender->tasvirPishnahadFanni }}"> {!! $tender->tasvirPishnahadFanni !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>--}}
{{--                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tender->tasvirPishnahadGheymat }}"> {!! $tender->tasvirPishnahadGheymat !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>--}}
{{--                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " ><a target="_blank" href="{{ $tender->attachmentErsali }}"> {!! $tender->attachmentErsali !== "nothing" ? "<i class='ft-file-text' ></i>" : "" !!} </a></td>--}}
{{--                                                <td>{{ $tender->natijeMonaghese }}</td>--}}
{{--                                                <td>{{ $tender->paasokhKarfarma }}</td>--}}
{{--                                                <td>{{ $tender->akharinEghdamat }}</td>--}}
{{--                                                <td>{{ $tender->tarikhEsterdadZemanat }}</td>--}}
{{--                                                <td>{{ jdate($tender->created_at) }}</td>--}}
{{--                                                <td>{{ jdate($tender->updated_at) }}</td>--}}

                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;">
                                                    <a href="{{ route('tenders.edit', $tender->id) }}"> <i class="fa fa-edit"></i> </a>
                                                    <a href="tenders/delete/{{ $tender->id }} "><i style="font-size: 20px" class="ft-x-square danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

@endsection


@section('footerscripts')
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
@endsection
