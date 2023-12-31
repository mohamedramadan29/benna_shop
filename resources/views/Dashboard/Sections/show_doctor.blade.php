@extends('Dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الأطباء </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.message_notification')
    <!-- row125 -->
    <div class="row row-sm">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                     
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0"> # </th> 
                                    <th class="wd-15p border-bottom-0"> صورة الطبيب </th>
                                    <th class="wd-15p border-bottom-0"> اسم الدكتور </th>
                                    <th class="wd-15p border-bottom-0"> البريد الالكتروني</th>
                                    <th class="wd-15p border-bottom-0"> رقم الهاتف </th>
                                    <th class="wd-15p border-bottom-0"> القسم </th>
                                    <th class="wd-15p border-bottom-0"> الموعد </th>
                                    <th class="wd-20p border-bottom-0"> سعر الكشف </th>
                                    <th class="wd-20p border-bottom-0">الحالة </th>
                                    <th class="wd-20p border-bottom-0"> تاريخ الأضافة </th>
                                    <th class="wd-15p border-bottom-0"> العمليات </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td> 
                                        <td>
                                            @if ($doctor->image)
                                                <img src="{{ URL::asset('Dashboard/img/doctors/' . $doctor->image->filename) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ URL::asset('Dashboard/img/default.png') }}" alt="">
                                            @endif
                                        </td>
                                        <td> {{ $doctor->name }} </td>
                                        <td> {{ $doctor->email }} </td>
                                        <td> {{ $doctor->phone }} </td>
                                        <td> {{ $doctor->section->name }} </td>
                                        <td>
                                            @foreach ($doctor->docotorappoiments as $appointment)
                                                {{ $appointment->name }}
                                            @endforeach
                                        </td>
                                        <td> {{ $doctor->price }} </td>
                                        <td>
                                            @if ($doctor->status == 1)
                                                <span class="badge badge-success"> مفعل </span>
                                            @else
                                                <span class="badge badge-danger"> غير مفعل </span>
                                            @endif
                                        </td>
                                        <td> {{ $doctor->created_at->diffForHumans() }} </td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('doctors.edit', $doctor->id) }}"><i
                                                    class="fa fa-pen"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $doctor->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#update_password{{ $doctor->id }}">
                                                <i class="fa fa-password"></i>باسورد
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#update_status{{ $doctor->id }}">
                                                <i class="fa fa-password"></i>الحالة
                                            </button>
                                        </td>
                                    </tr>
                                    @include('Dashboard.Doctors.delete')
                                    @include('Dashboard.Doctors.delete_select')
                                    @include('Dashboard.Doctors.update_password')
                                    @include('Dashboard.Doctors.update_status')
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('Dashboard/assets/js/table-data.js') }}"></script>
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = [];
                $("#example1 input[name=delete_select]:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $("#delete_select").modal('show');
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        })
    </script>
@endsection
