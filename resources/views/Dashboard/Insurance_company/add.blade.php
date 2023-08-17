@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة شركة جديدة </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
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
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                </div>
                <div class="card-body pt-0">
                    <form method="POST" class="form-horizontal" action="{{ route('insurance_company.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input autofocus name="insurance_code" type="text" class="form-control" id="inputName"
                                placeholder=" كود الشركة ">
                        </div>
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="inputName"
                                placeholder="الاسم ">
                        </div>
                        <div class="form-group">
                            <input name="discount_percentage" type="number" class="form-control" id="inputName"
                                placeholder="نسبة تحمل المريض  %">
                        </div>
                        <div class="form-group">
                            <input  name="company_rate" type="number" class="form-control" id="inputName"
                                placeholder=" نسبة تحمل شركة التامين % ">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="ملاحظات" name="notes" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" name="status">
                                <option value="1"> مفعل </option>
                                <option value="0"> غير مفعل </option>
                            </select>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">  اضافة شركة تأمين </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        var loadfile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        }
    </script>
@endsection
