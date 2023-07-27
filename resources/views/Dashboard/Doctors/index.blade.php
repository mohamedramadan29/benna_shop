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
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <!-- Button trigger modal -->
                        <a class="btn btn-primary" href="{{ route('doctors.create') }}"> أضافة دكتور جديد </a>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0"> # </th>
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
                                        <td> {{ $doctor->name }} </td>
                                        <td> {{ $doctor->email }} </td>
                                        <td> {{ $doctor->phone }} </td>
                                        <td> {{ $doctor->section->name }} </td>
                                        <td> {{ $doctor->appointment }} </td>
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
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $doctor->id }}">
                                                <i class="fa fa-pen"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $doctor->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('Dashboard.Doctors.edit')
                                    @include('Dashboard.Doctors.delete')
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
@endsection
