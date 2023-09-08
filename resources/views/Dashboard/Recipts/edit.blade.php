@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    اضافة سند قبض
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحسابات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة سند
                    قبض
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.message_notification')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Recipt.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label> اختر المريض </label>
                                <select class="form-control" name="patient_id">
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"> {{ $patient->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-6">
                                <label> المبلغ </label>
                                <input type="number" name="debit" value="{{ old('debit') }}"
                                    class="form-control @error('debit') is-invalid @enderror">
                            </div>

                            <div class="col-12">
                                <label> ملاحظات </label>
                                <textarea type="text" name="description" value="{{ old('description') }}"
                                    class="form-control @error('description') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">حفظ السند </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
