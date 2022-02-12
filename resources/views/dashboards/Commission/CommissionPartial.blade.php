@extends('layouts/dashboard')

@section('headerscripts')
<style media="screen">

.amcharts-legend-value{
  font-size: 20px!important;
  font-weight: bold!important;
}
.amcharts-legend-label{
  font-weight: bold!important;
}

</style>
@endsection

@section('content')


<div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">افزودن کمیسیون جزیی </h4>
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

        <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="SellersContracts" class="form form-horizontal form-bordered striped-rows">
          @csrf
          <div style="font-family:byekan" class="form-body">
            <h4 class="form-section"><i class="ft-user"></i> کمیسیون جزیی</h4>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="name">موضوع معامله</label>
              <div class="col-md-9">
                <input type="text" id="name" class="form-control"  name="onvan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 label-control" for="description">نام درخواست کننده خرید کالا یا خدمات</label>
              <div class="col-md-9">
                <input type="text" id="description" class="form-control"  name="mozoo">
              </div>
            </div>


            <div class="form-group row">
              <label class="col-md-3 label-control" for="contractor">ارزش معامله </label>
              <div class="col-md-9">
                <input type="text" id="contractor" class="form-control"  name="tarafedovvom">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">تعداد فقره های استعلام بها  </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control"  name="mablaghMahiane">
              </div>
            </div>

            <div  class="form-group row last">
                <label class="col-md-3 label-control" for="contractorFile">بارگزاری مستندات استعلام بها</label>
                <div class="col-md-9">
                  <input type="file" id="contractorFile" class="form-control" name="contractorFile">
                </div>
              </div>

            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">نوع و مشخصات کالا </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" name="mablaghSaliane">
              </div>
            </div>





            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">تاریخ ثبت خرید</label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control" name="moddat">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">محل تحویل کالا</label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control"  name="from">
              </div>
            </div>



            <div class="form-group row last">
              <label class="col-md-3 label-control" for="to">هزینه حمل</label>
              <div class="col-md-9">
                <input type="text" id="to" class="form-control" name="to">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">گارانتی </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control"  name="pardakht">
              </div>
            </div>


            <div class="form-group row last">
              <label class="col-md-3 label-control" for="from">خدمات پس از فروش </label>
              <div class="col-md-9">
                <input type="text" id="from" class="form-control"  name="davar">
              </div>
            </div>

            <div class="form-group row last">
                <label class="col-md-3 label-control" for="from">آیا مکاتبات از طریق ایمیل tc@persiatc.com  انجام شده ؟ </label>
                <div class="col-md-9">
                    <select name="" id="" class="form-control">
                        <option value="">بله</option>
                        <option value="">خیر</option>
                    </select>
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


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">لیست کمیسیون های جزیی</h4>
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
              <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addUser" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></button>
              <div class="card-body card-dashboard"><br><br>
                <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal-exportTableButton file-export ">
                  <thead>
                    <tr style="text-align: center" >
                      <th>ردیف</th>
                      <th>موضوع معامله</th>
                     <th>نام درخواست کننده</th>
                      <th>ارزش معامله</th>
                     <th>تعداد فقره های استعلام بها</th>
                     <th>مستندات استعلام بها</th>
                      <th>نوع و مشخصات کالا</th>
                      <th>تاریخ ثبت خرید</th>
                      <th>محل تحویل کالا</th>
                     <th>هزینه حمل </th>
                     <th>گارانتی</th>
                     <th>خدمات پس از فروش</th>
                      <th>نحوه انجام مکاتبات از طریق ایمیل شرکت</th>
                      <th>نظر کمیسیون معاملات</th>
                      <th>عملیات</th>

                    </tr>
                  </thead>
                  <tbody>

                  @foreach($contracts as $contract)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                        <td style="white-space: normal"><a href="{{ url('SellerContract/show/' . $contract->id) }}">{{ $contract->onvan }}</a></td>
                     <td>{{ $contract->mozoo }}</td>
                      <td>{{ $contract->tarafedovvom }}</td>
                     <td>{{ $contract->mablaghMahiane }}</td>
                     <td>{{ $contract->mablaghSaliane }}</td>
                      <td style="white-space: normal">{{ $contract->moddat }}</td>
                      <td style="white-space: normal">{{ $contract->from }}</td>
                      <td style="white-space: normal">{{ $contract->to }}</td>
                     <td>{{ $contract->pardakht }}</td>
                     <td>{{ $contract->davar }}</td>
                     <td>{{ $contract->description }}</td>
                     <td>{{ $contract->description }}</td>
                      <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" ><a href="{{ $contract->contractorFile }}"> <i class="ft-file-text" ></i> </a></td>
                      <td style="text-align:center;color: #3BAFDA"><a href="SellerContract/edit/{{ $contract->id }}"><i style="font-size: 20px" class="ft-edit"></i></a> <a href="SellerContract/delete/{{ $contract->id }} "><i style="font-size: 20px" class="ft-x-square danger"></i>  </a> </td>
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
