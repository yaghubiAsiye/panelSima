@extends('layouts/dashboard')

@section('headerscripts')
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">  اطلاعات شرکت </h4>
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
                                <div class="card-body card-dashboard"><br><br>


                                    <div class="text-left" >
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">  اطلاعات شرکت </h4>

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

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="/Commission/Confirm" class="form form-horizontal form-bordered striped-rows">
                                                            @csrf


                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ادرس  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->address ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">کدپستی تهران  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->code_posti ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">تلفن دفتر تهران  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->phone ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">فکس  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->fax ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ادرس خرم شهر  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->address_khoram ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">کد پستی خرم شهر  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->code_posti_khoram ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">تلفن خرم شهر  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->phone_khoram ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شماره ثبت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shomare_sabt ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شماره حساب بانک تجارت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shomare_hesab_tejarat ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شماره شبا بانک تجارت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shomare_shaba ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">کد اقتصادی  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->code_eqtesadi ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ایمیل  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->email ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">ادرس وب سایت  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->website ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="status">شناسه ملی  </label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-control">{{ $InfoCompany->shenase_meli ?? ''}}</div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            {{-- <div style="font-family:Byekan" class="form-actions">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-check-square-o"></i> افزودن
                                                                </button>


                                                            </div> --}}
                                                        </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
