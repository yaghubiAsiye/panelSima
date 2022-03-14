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
                                <h4 class="card-title">  تاییدیه کمیسیون </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">  تاییدیه کمیسیون </h4>

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

                                                        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{url('Dokumentation/update/' . $Certificate->id)}}" class="form form-horizontal form-bordered striped-rows">
                                                            @csrf
                                                            <div style="font-family:byekan" class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="name">تاییدیه  </label>
                                                                    <div class="col-md-9">
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="yes">بله</option>
                                                                            <option value="no">خیر</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="saderKonandeh">توضیحات</label>
                                                                    <div class="col-md-9">
                                                                        <textarea name="description"  rows="8"  class="form-control" cols="80"></textarea>
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


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
