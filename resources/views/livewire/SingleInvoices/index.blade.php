@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('title')
    فاتورة خدمة مفردة
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ فاتورة خدمة مفردة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <livewire:single-invoices/>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
