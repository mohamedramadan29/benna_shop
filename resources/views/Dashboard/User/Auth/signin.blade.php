@extends('Dashboard.layouts.master2')
@section('css')
    <style>
        .login_form {
            display: none;
        }
    </style>
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">

            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('Dashboard/assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2> اهلا بك !! </h2>
                                            <select id="section_choose" class="form-select form-select-lg mb-3 form-control"
                                                aria-label=".form-select-lg example">
                                                <option selected disabled> اختر طريقة الدخول </option>
                                                <option value="user"> مريض </option>
                                                <option value="admin"> ادمن </option>
                                            </select>
                                            <!-- Login As Patient -->
                                            <div class="login_form" id="user">
                                                <h5 class="font-weight-semibold mb-4"> تسجيل الدخول ( مريض ) </h5>
                                                <form method="POST" action="{{ route('login.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                        <label>البريد الألكتروني </label> <input class="form-control"
                                                            placeholder=" ادخل البريد الألكتروني  " type="email"
                                                            name="email" :value="old('email')" required autofocus
                                                            autocomplete="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                        <label> كلمة المرور </label> <input class="form-control"
                                                            placeholder=" أدخل كلمة المرور " type="password" name="password"
                                                            required autocomplete="current-password">
                                                    </div><button class="btn btn-main-primary btn-block"> تسجيل دخول
                                                    </button>

                                                </form>

                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="{{ route('password.request') }}"> نسيت كلمة المرور ؟ </a>
                                                    </p>
                                                    <p>ليس لديك حساب <a href="{{ route('register') }}"> حساب جديد
                                                        </a></p>
                                                </div>
                                            </div>


                                            <!-- Login As Admin -->
                                            <div class="login_form" id="admin">
                                                <h5 class="font-weight-semibold mb-4"> تسجيل الدخول ( ادمن ) </h5>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                        <label>البريد الألكتروني </label> <input class="form-control"
                                                            placeholder=" ادخل البريد الألكتروني  " type="email"
                                                            name="email" :value="old('email')" required autofocus
                                                            autocomplete="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                        <label> كلمة المرور </label> <input class="form-control"
                                                            placeholder=" أدخل كلمة المرور " type="password" name="password"
                                                            required autocomplete="current-password">
                                                    </div><button class="btn btn-main-primary btn-block"> تسجيل دخول
                                                    </button>

                                                </form>

                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="{{ route('password.request') }}"> نسيت كلمة المرور ؟ </a>
                                                    </p>
                                                    <p>ليس لديك حساب <a href="{{ route('register') }}"> حساب جديد
                                                        </a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('Dashboard/assets/img/media/user_login.jpg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("#section_choose").change(function() {
            var myID = $(this).val();
            $(".login_form").each(function() {
                myID === $(this).attr("id") ? $(this).show() : $(this).hide();
            })
        });
    </script>
@endsection
