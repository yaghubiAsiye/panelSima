@extends('layouts/dashboard')

@section('headerscripts')
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/tables/jsgrid/jsgrid-theme.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/tables/jsgrid/jsgrid.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">


@endsection

@section('content')




<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- project stats -->

      <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card bg-warning">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-white text-left">
                    <h3 class="text-white">278</h3>
                    <span>New Projects</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-rocket text-white font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card bg-success">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-white text-left">
                    <h3 class="text-white">156</h3>
                    <span>New Clients</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-user text-white font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card bg-danger">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-white text-left">
                    <h3 class="text-white">64.89 %</h3>
                    <span>Conversion Rate</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-pie-chart text-white font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card bg-info">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-white text-left">
                    <h3 class="text-white">423</h3>
                    <span>Support Tickets</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-support text-white font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <section>


        <!-- Basic scenario start -->
        <section id="basic">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">مدیریت کاربران سامانه</h4>
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
                  <div class="card-body card-dashboard ">
                    <div style="font-family:Byekan;text-align:center" id="basicScenario"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Basic scenario end -->







      </section>


    </div>
  </div>
</div>











@endsection



@section('footerscripts')
<script src="/vendors/js/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/switch.js" type="text/javascript"></script>

<script src="/vendors/js/tables/jsgrid/jsgrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
(function() {

  var db = {

    loadData: function(filter) {
      return $.grep(this.clients, function(client) {
        return (!filter.residingName || client.residingName.indexOf(filter.residingName) > -1)
        && (!filter.tower || client.tower.indexOf(filter.tower) > -1)
        && (!filter.floor || client.floor.indexOf(filter.floor) > -1)
        && (!filter.unit || client.unit.indexOf(filter.unit) > -1)
        && (!filter.residingNationalCode || client.residingNationalCode.indexOf(filter.residingNationalCode) > -1)
        && (!filter.residingMobileNumber || client.residingMobileNumber.indexOf(filter.residingMobileNumber) > -1)
        && (!filter.warehouseCode || client.warehouseCode.indexOf(filter.warehouseCode) > -1)
        && (!filter.warehouseSize || client.warehouseSize.indexOf(filter.warehouseSize) > -1)
        && (!filter.parkingCode1 || client.parkingCode1.indexOf(filter.parkingCode1) > -1)
        && (!filter.parkingCode2 || client.parkingCode2.indexOf(filter.parkingCode2) > -1)
        && (!filter.parkingCode3 || client.parkingCode3.indexOf(filter.parkingCode3) > -1)
        && (!filter.parkingCode4 || client.parkingCode4.indexOf(filter.parkingCode4) > -1)
        && (!filter.ownerName || client.ownerName.indexOf(filter.ownerName) > -1)
        && (!filter.ownerNationalCode || client.ownerNationalCode.indexOf(filter.ownerNationalCode) > -1)
        && (!filter.ownerMobileNumber || client.ownerMobileNumber.indexOf(filter.ownerMobileNumber) > -1)
        && (!filter.homePhoneNumber1 || client.homePhoneNumber1.indexOf(filter.homePhoneNumber1) > -1)
        && (!filter.homePhoneNumber2 || client.homePhoneNumber2.indexOf(filter.homePhoneNumber2) > -1)
        && (!filter.homePhoneNumber3 || client.homePhoneNumber3.indexOf(filter.homePhoneNumber3) > -1)
        && (!filter.email || client.email.indexOf(filter.email) > -1);
      });
    },

    insertItem: function(item) {
      // return $.ajax({
      //   url: '/users/editUser/',
      //   type: 'POST',
      //   data:item
      // });
    },

    updateItem: function(updatingClient) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      return $.ajax({
        url: '/users/editUser',
        type: 'POST',
        data:updatingClient
      });

    },

    deleteItem: function(deletingClient) {
      var clientIndex = $.inArray(deletingClient, this.clients);
      this.clients.splice(clientIndex, 1);
    }

  };

  window.db = db;

  db.clients = [

    @foreach($users as $user)
    {
      "id": "{{ $user->id }}",
      "residingName": "{{ $user->residingName }}",
      "tower": "{{ $user->tower }}",
      "floor": "{{ $user->floor }}",
      "unit": "{{ $user->unit }}",
      "residingNationalCode": "{{ $user->residingNationalCode }}",
      "residingMobileNumber": "{{ $user->residingMobileNumber }}",
      "warehouseCode": "{{ $user->warehouseCode }}",
      "warehouseSize": "{{ $user->warehouseSize }}",
      "parkingCode1": "{{ $user->parkingCode1 }}",
      "parkingCode2": "{{ $user->parkingCode2 }}",
      "parkingCode3": "{{ $user->parkingCode3 }}",
      "parkingCode4": "{{ $user->parkingCode4 }}",
      "ownerName": "{{ $user->ownerName }}",
      "ownerNationalCode": "{{ $user->ownerNationalCode }}",
      "ownerMobileNumber": "{{ $user->ownerMobileNumber }}",
      "homePhoneNumber1": "{{ $user->homePhoneNumber1 }}",
      "homePhoneNumber2": "{{ $user->homePhoneNumber2 }}",
      "homePhoneNumber3": "{{ $user->homePhoneNumber3 }}",
      "email": "{{ $user->email }}",
    },
    @endforeach




  ];

}());
$("#basicScenario").jsGrid({
  width: "100%",
  filtering: true,
  editing: true,
  inserting: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "آیا از حذف اطلاعات اطمینان دارید ؟",
  controller: db,
  fields: [
    { name: "id", type: "number", width: 0 },
    { name: "residingName", type: "text", width: 200 },
    { name: "tower", type: "text", width: 100 },
    { name: "floor", type: "number", width: 80 },
    { name: "unit", type: "number", width: 80 },
    { name: "residingNationalCode", type: "text", width: 150 },
    { name: "residingMobileNumber", type: "text", width: 150 },
    { name: "warehouseCode", type: "text", width: 150 },
    { name: "warehouseSize", type: "text", width: 80 },
    { name: "parkingCode1", type: "text", width: 150 },
    { name: "parkingCode2", type: "text", width: 150 },
    { name: "parkingCode3", type: "text", width: 150 },
    { name: "parkingCode4", type: "text", width: 150 },
    { name: "ownerName", type: "text", width: 200 },
    { name: "ownerNationalCode", type: "text", width: 150 },
    { name: "ownerMobileNumber", type: "text", width: 150 },
    { name: "homePhoneNumber1", type: "text", width: 150 },
    { name: "homePhoneNumber2", type: "text", width: 150 },
    { name: "homePhoneNumber3", type: "text", width: 150 },
    { name: "email", type: "text", width: 200 },

    { type: "control", width: 80}
  ]
});


$('.jsgrid-header-cell').each(function() {
  $(this).text($(this).text().replace('residingName', 'نام و نام خانوادگی ساکن'));
  $(this).text($(this).text().replace('tower', 'برج'));
  $(this).text($(this).text().replace('floor', 'طبقه'));
  $(this).text($(this).text().replace('unit', 'واحد'));
  $(this).text($(this).text().replace('residingNationalCode', 'کد ملی ساکن'));
  $(this).text($(this).text().replace('residingMobileNumber', 'شماره موبایل ساکن'));
  $(this).text($(this).text().replace('warehouseCode', 'کد انباری'));
  $(this).text($(this).text().replace('warehouseSize', 'متراژ انباری'));
  $(this).text($(this).text().replace('parkingCode1', 'کد پارکینگ ۱'));
  $(this).text($(this).text().replace('parkingCode2', 'کد پارکینگ ۲'));
  $(this).text($(this).text().replace('parkingCode3', 'کد پارکینگ ۳'));
  $(this).text($(this).text().replace('parkingCode4', 'کد پارکینگ ۴'));
  $(this).text($(this).text().replace('ownerName', 'نام و نام خانوادگی مالک'));
  $(this).text($(this).text().replace('ownerNationalCode', 'کد ملی مالک'));
  $(this).text($(this).text().replace('ownerMobileNumber', 'شماره همراه مالک'));
  $(this).text($(this).text().replace('homePhoneNumber1', 'تلفن ثابت ۱'));
  $(this).text($(this).text().replace('homePhoneNumber2', 'تلفن ثابت ۲'));
  $(this).text($(this).text().replace('homePhoneNumber3', 'تلفن ثابت ۳'));
  $(this).text($(this).text().replace('email', 'آدرس ایمیل'));
});
// $('td:nth-child(1),th:nth-child(1)').hide();


</script>




@if($errors->has('groupName') or $errors->has('Type'))
<script type="text/javascript">$(window).on('load',function(){$('#show').modal('show');});</script>
@endif


@if (session('toastr'))
<script type="text/javascript">$(window).on('load',function(){toastr.success('{{ session('toastr') }}');});</script>
@endif



@endsection
