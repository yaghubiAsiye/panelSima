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


<style>
    form.form-bordered .form-group > div {
    border: none;
}
</style>
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
                                <h4 class="card-title">افزودن    صورت جلسه </h4>
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
                                                    <h4 class="modal-title" id="myModalLabel17">ثبت صورت جلسه</h4>

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

                                                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="{{route('Approval.store')}}" class="form form-horizontal form-bordered striped-rows">
                                                        @csrf
                                                        <div style="font-family:byekan" class="form-body productDivBody">


                                                            <div class="form-group row" style="text-align:right;border:none">
                                                                <label class="col-md-1 label-control" style="writing-mode: vertical-rl;text-orientation: mixed;color: black;font-size: 18px;" >صورت جلسه</label>

                                                                <label style="text-align: right" class="col-md-2 label-control" >تاریخ جلسه</label>
                                                                <div class="col-md-3">
                                                                    <input style="font-family:Byekan" class="form-control" value="{{ old('date') }}" autocomplete="off" placeholder="کلیک کنید" name="date" type="text" id="input1"/>
                                                                </div>

                                                                <label style="text-align: right" class="col-md-2 label-control" >شماره جلسه</label>
                                                                <div class="col-md-3">
                                                                    <input style="font-family:Byekan" class="form-control" value="{{ old('number') }}" name="number" type="text" />
                                                                </div>
                                                                <div class="col-md-1"></div>

                                                                <div class="col-md-1"></div>
                                                                <label style="text-align: right" class="col-md-2 label-control" >عنوان جلسه</label>
                                                                <div class="col-md-3">
                                                                    <input style="font-family:Byekan" class="form-control" value="{{ old('title') }}" name="title" type="text"/>
                                                                </div>
                                                                <label style="text-align: right" class="col-md-2 label-control" >نوع جلسه</label>
                                                                <div class="col-md-3">
                                                                    <select class="form-control" name="MeetingType">
                                                                        <option class="form-item" value="هیات مدیره">هیات مدیره</option>
                                                                        <option class="form-item" value="شورای مدیران">شورای مدیران</option>
                                                                        <option value="کارفرمایان">کارفرمایان</option>
                                                                        <option value="پیمانکاران">پیمانکاران</option>
                                                                        <option value="مالی">مالی</option>
                                                                        <option value="بازرگانی">بازرگانی</option>
                                                                        <option value="فنی">فنی</option>
                                                                        <option value="اداری">اداری</option>
                                                                        <option class="form-item" value="سایر">سایر</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-1"></div>

                                                                <div class="col-md-1"></div>
                                                                <label style="text-align: right" class="col-md-2 label-control" >حاضرین جلسه</label>
                                                                <div class="col-md-8">
                                                                    <input style="font-family:Byekan" class="form-control" value="{{ old('hazerin') }}" name="hazerin" type="text"/>
                                                                </div>
                                                                <div class="col-md-1"></div>

                                                                <div class="col-md-1"></div>
                                                                <label style="text-align: right" class="col-md-2 label-control" >فایل جلسه</label>
                                                                <div class="col-md-8">
                                                                    <input style="font-family:Byekan" class="form-control" name="filejalase" type="file" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1"></div>
                                                            <h3 class="col-md-11">مصوبات جلسه</h3>

                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control"> مصوبه  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="sharheMoavvabe" class="form-control" name="row[0][sharheMosavvabe]">
                                                                </div>
                                                                <label class="col-md-3 label-control" >ردیف مصوبه  </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="radifeMosavvabe" class="form-control"  name="row[0][radifeMosavvabe]">
                                                                </div>
                                                                <label class="col-md-3 label-control" > بخش اقدام کننده  </label>
                                                                <div class="col-md-9">
                                                                    <select id="selectize-state" name="row[0][eghdamKonande][]" class="selectize-event required" multiple>
                                                                        <option value="">انتخاب بخش اقدام کننده</option>
                                                                        <option value="مدیر عامل">مدیر عامل</option>
                                                                        <option value="مدیر پروژه">مدیر پروژه</option>
                                                                        <option value="مالی">مالی</option>
                                                                        <option value="بازرگانی">بازرگانی</option>
                                                                        <option value="فنی">فنی</option>
                                                                        <option value="اداری">اداری</option>
                                                                    </select>
                                                                </div>
                                                                {{-- <div class="col-md-9">
                                                                    <select id="selectize-state" name="row[0][unit][]" class="selectize-event required" multiple>
                                                                        <option class="" value="">انتخاب متولی</option>
                                                                        @foreach($users as $user)
                                                                            <option value="{{ $user->id }}">{{ $user->name . " " . $user->family }} | {{ $user->position }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div> --}}
                                                                <label class="col-md-3 label-control" > مهلت اقدام   </label>
                                                                <div class="col-md-9">
                                                                    {{-- <input style="font-family:Byekan" class="form-control" autocomplete="off" placeholder="کلیک کنید" name="row[0][unit_price]" type="text" id="input1"/> --}}
                                                                    <input type="text" id="mohlateEghdam" class="form-control" placeholder="" name="row[0][mohlateEghdam]">
                                                                </div>
                                                            </div>




                                                            <div class="form-group row ">
                                                                <button type="button" class="btn btn-success" id="addProductBtn">
                                                                    <i class="ft-plus"></i> افزودن مصوبه
                                                                </button>
                                                            </div>





                                                        </div>

                                                        <div style="font-family:Byekan" class="form-actions">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-check-square-o"></i> ثبت
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

@section('footerscripts')
<script src="/vendors/js/forms/select/selectize.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/select/form-selectize.js" type="text/javascript"></script>



<script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>


    <script type="text/javascript">
    console.clear();



        function removeRow(rnum) {
            jQuery('#productDiv'+rnum).remove();

        }


        $(document).ready(function () {
            let counter = 1;
            // let users = {!! json_encode($users->toArray()) !!};
            // console.log(users);

            $('#addProductBtn').on('click', function() {
                let newRow = $('<div class="form-group row" id="productDiv' + counter + '"></div>');
                let cols = "";
                cols += '<label class="col-md-3 label-control"> مصوبه  </label><div class="col-md-9"> <input type="text"  class="form-control" name="row[' + counter + '][sharheMosavvabe]"></div>';
                cols += '<label class="col-md-3 label-control" >ردیف مصوبه  </label><div class="col-md-9"><input type="text"  class="form-control"  name="row[' + counter + '][radifeMosavvabe]"></div>';
                cols += '<label class="col-md-3 label-control" > بخش اقدام کننده  </label><div class="col-md-9"><select type="text" class="form-control" name="row[' + counter + '][eghdamKonande][]" multiple>';
                cols += '<option value="مدیر عامل">مدیر عامل</option>';
                cols += '<option value="مدیر پروژه">مدیر پروژه</option>';
                cols += '<option value="مالی">مالی</option>';
                cols += '<option value="بازرگانی">بازرگانی</option>';
                cols += '<option value="فنی">فنی</option>';
                cols += '<option value="اداری">اداری</option>';

                // cols += '<label class="col-md-3 label-control" > اقدام کننده  </label><div class="col-md-9"><select  name="row[' + counter + '][unit][]" class="form-control" multiple>';
                // users.forEach(function(user) {
                //     cols += `<option value="${user.id}">${user.name} ${user.family}  | ${user.position}</option>`;
                // });
                cols += '</select></div>';
                // cols += '<label class="col-md-3 label-control" > مهلت اقدام   </label><div class="col-md-6"><input style="font-family:Byekan" class="form-control date" autocomplete="off" placeholder="کلیک کنید" name="row[' + counter + '][unit_price]" type="text" id="input1"/></div>';
                cols += '<label class="col-md-3 label-control" > مهلت اقدام   </label><div class="col-md-6"><input type="text" class="form-control" placeholder="" name="row[' + counter + '][mohlateEghdam]"></div>';
                cols += '<div class="col-md-1"><button type="button" value="Remove" onclick="removeRow(' +counter+ ');" id="deleteProduct' + counter + '" class="btn btn-danger mr-1"><i class="ft-x"></i> حذف </button></div>';

                newRow.append(cols);
                $("div.productDivBody").append(newRow);
                counter++;


            });



        })

    </script>
@endsection














