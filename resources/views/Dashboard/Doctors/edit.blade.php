@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئيسية </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل الدكتور </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                </div>
                <div class="card-body pt-0">
                    <form method="POST" class="form-horizontal" action="{{ route('doctors.update', $doctor->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <input value="{{ $doctor->name }}" autofocus name="name" type="text" class="form-control"
                                id="inputName" placeholder="الاسم ">
                        </div>
                        <div class="form-group">
                            <input value="{{ $doctor->email }}" name="email" type="email" class="form-control"
                                id="inputEmail3" placeholder="البريد الألكتروني">
                        </div>

                        <div class="form-group">
                            <input value="{{ $doctor->phone }}" name="phone" type="text" class="form-control"
                                id="inputName" placeholder=" رقم الهاتف  ">
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" name="section_id">
                                <option readonly>
                                    اختر القسم
                                </option>
                                @foreach ($sections as $section)
                                    <option @if ($section->id == $doctor->section_id) selected @endif value="{{ $section->id }}">
                                        {{ $section->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" name="appointment[]" multiple>
                                @foreach ($doctor->docotorappoiments as $appoimentsselect)
                                    <option value="{{ $appoimentsselect->id }}" selected> {{ $appoimentsselect->name }}
                                    </option>
                                @endforeach
                                @foreach ($appoiments as $appoiment)
                                    <option value="{{ $appoiment->id }}"> {{ $appoiment->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input name="photo" class="custom-file-input" accept="image/*" id="customFile"
                                    type="file" onchange="loadfile(event)">
                                <label class="custom-file-label" for="customFile"> صورة الطبيب </label>
                            </div>
                            @if ($doctor->image)
                                <img src="{{ URL::asset('Dashboard/img/doctors/' . $doctor->image->filename) }}"
                                    width="150px" height="150px" id="output" alt="">
                            @else
                                <img src="{{ URL::asset('Dashboard/img/default.png') }}" width="150px" height="150px"
                                    id="output" alt="">
                            @endif

                        </div>
                        <div class="form-group">
                            <select class="form-control select2" name="status">
                                <option value="1"> مفعل </option>
                                <option value="0"> غير مفعل </option>
                            </select>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary"> تعديل الدكتور </button>
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
