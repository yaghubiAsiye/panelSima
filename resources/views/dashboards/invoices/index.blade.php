@extends('layouts.dashboard')

@section('headerscripts')


    <style media="screen">

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

        .swal-title {
            font-family: Byekan !important;
        }

        .swal-text {
            font-family: Byekan !important;
        }

    </style>
@endsection

@section('content')

    <!--  Start add Suggestion -->
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> افزودن آیین نامه </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="regulations" class="form form-horizontal form-bordered striped-rows">
                        @csrf


                        <div style="font-family:byekan" class="form-body">


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">عنوان  </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title">

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل </label>
                                <div class="col-md-9">
                                    <input type="file"  class="form-control" name="file">
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
    <!--  End add Suggestion -->


    <!--  Start Edit $invoices -->


    @foreach($invoices as $invoice)
        <div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $invoice->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl{{ $invoice->id }}"> جزییات پیش فاکتور</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="#"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            @csrf
                            <div class="form-body">

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> شماره</label>
                                    <div class="col-md-9">
                                        {{ $invoice->No }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> تاریخ</label>
                                    <div class="col-md-9">
                                        {{ jDate($invoice->date) }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> شرکت خریدار</label>
                                    <div class="col-md-9">
                                        {{ $invoice->company_name }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> آدرس</label>
                                    <div class="col-md-9">
                                        {{ $invoice->address }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> اعتبار</label>
                                    <div class="col-md-9">
                                        {{ $invoice->validity }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> کد اقتصادی</label>
                                    <div class="col-md-9">
                                        {{ $invoice->economic_code }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> کد پستی</label>
                                    <div class="col-md-9">
                                        {{ $invoice->postal_code }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> شناسه ملی</label>
                                    <div class="col-md-9">
                                        {{ $invoice->national_code }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> شماره ثبت</label>
                                    <div class="col-md-9">
                                        {{ $invoice->registration_number }}
                                    </div>
                                </div>

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> مبلغ کل</label>
                                    <div class="col-md-9">
                                        {{ $invoice->total }}
                                    </div>
                                </div>
                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> مبلغ کل پس از اعمال ارزش افزوده</label>
                                    <div class="col-md-9">
                                        {{ $invoice->final_total }}
                                    </div>
                                </div>

                                @foreach($invoice->products as $product)
                                    <div  class="form-group row">
                                        <label class="col-md-3 label-control" for="id"> شرح کالا</label>
                                        <div class="col-md-3">
                                            {{ $product->description }}
                                        </div>
                                        <label class="col-md-3 label-control" for="id"> تعداد</label>
                                        <div class="col-md-3">
                                            {{ $product->number }}  {{ $product->unit }}
                                        </div>

                                        <label class="col-md-3 label-control" for="id"> قیمت واحد</label>
                                        <div class="col-md-3">
                                            {{ $product->unit_price }}
                                        </div>
                                        <label class="col-md-3 label-control" for="id"> جمع</label>
                                        <div class="col-md-3">
                                            {{ $product->total_price }}
                                        </div>

                                    </div>


                                @endforeach





                            </div>




                        </form>


                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!--  End Edit $invoices -->




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
                                <h4 class="card-title"> پیش فاکتورهای صادر شده</h4>
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
                                <a  style="float: left;margin-left: 40px!important;" href="invoice/create"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></a>

                                <div class="card-body card-dashboard">
                                    <table style="font-family: Byekan;text-align: center; width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">
                                            <th> ردیف</th>
                                            <th> شماره</th>
                                            <th> تاریخ</th>
                                            <th> شرکت خریدار</th>
                                            {{--<th> آدرس</th>--}}
                                            <th> تلفن</th>
                                            <th> اعتبار</th>
                                            {{--<th> کد اقتصادی</th>--}}
                                            {{--<th> کد پستی</th>--}}
                                            {{--<th> شناسه ملی</th>--}}
                                            {{--<th> شماره ثبت</th>--}}
                                            <th> مبلغ کل</th>
                                            <th>دانلود اکسل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>


                                                <td style="white-space: normal;">{{ $invoice->id }}</td>
                                                <td>
                                                    {{ $invoice->No }}
                                                </td>

                                                <td style="direction: ltr;">{{ jdate($invoice->date) }}</td>

                                                <td>
                                                    <a data-toggle="modal" data-target="#ReferralsTdl{{ $invoice->id }}" >
                                                    {{ $invoice->company_name }}
                                                    </a>
                                                </td>
                                                {{--<td>--}}
                                                    {{--{{ $invoice->address}}--}}
                                                {{--</td>--}}
                                                <td>
                                                    {{ $invoice->phone }}
                                                </td>
                                                <td>
                                                    {{ $invoice->validity }}
                                                </td>
                                                {{--<td>--}}
                                                    {{--{{ $invoice->economic_code }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $invoice->postal_code }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $invoice->national_code }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $invoice->registration_number }}--}}
                                                {{--</td>--}}


                                                <td>
                                                    {{ $invoice->final_total }}
                                                </td>



                                                <td style="text-align:center;color: #3BAFDA">

                                                    <a href="{{ URL::to('downloadExcel/xlsx/' . $invoice->id) }}" ><i style="font-size: 20px" class="ft-download-cloud"></i></a>

                                                    {{--<a data-toggle="modal" data-target="#ReferralsTdl{{ $invoice->id }}" ><i style="font-size: 20px" class="ft-external-link"></i></a>--}}


                                                    {{--<a onclick="return confirm('آیا برای حذف اطمینان دارید؟');"--}}
                                                       {{--href="regulation/delete/{{ $archive->id }} "><i--}}
                                                                {{--style="font-size: 20px" class="ft-x-square danger"></i>--}}
                                                    {{--</a>--}}
                                                </td>
                                            </tr>
                                        @endforeach

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

@endsection
