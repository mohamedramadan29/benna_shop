@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الحسابات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ سند قبض
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.message_notification')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('Recipt.create') }}" class="btn btn-primary">اضافة سند قبض </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> اسم المريض </th>
                                    <th> المبلغ </th>
                                    <th> البيان </th>
                                    <th> تاريخ الاضافة </th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipts as $recipt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $recipt->patient->name }}</td>
                                        <td>{{ $recipt->debit }}</td>
                                        <td>{{ $recipt->description }}</td>
                                        <td>{{ $recipt->created_at->diffForHumans() }}</td>
                                        <td> 
                                            <a href="{{ route('Recipt.edit', $recipt->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#Deleted{{ $recipt->id }}"><i
                                                    class="fas fa-trash"></i></button> 
                                        </td>
                                    </tr>
                                    {{-- @include('Dashboard.Amulances.delete')  --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
