<!-- Title -->
<title> @yield('title') </title>
@yield('css')
@livewireStyles
@if (App::getLocale() == 'ar')
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('Dashboard/assets/img/brand/favicon.png') }}" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ URL::asset('Dashboard/assets/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ URL::asset('Dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Sidebar css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css-rtl/sidemenu.css') }}">
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    <!--- Style css -->
    <link href="{{ URL::asset('Dashboard/assets/css-rtl/style.css') }}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{ URL::asset('Dashboard/assets/css-rtl/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ URL::asset('Dashboard/assets/css-rtl/skin-modes.css') }}" rel="stylesheet">
@else
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('Dashboard/assets/img/brand/favicon.png') }}" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ URL::asset('Dashboard/assets/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ URL::asset('Dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}"
        rel="stylesheet" />
    <!--  Sidebar css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/sidemenu.css') }}">
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('Dashboard/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    <!--- Style css -->
    <link href="{{ URL::asset('Dashboard/assets/css/style.css') }}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{ URL::asset('Dashboard/assets/css/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ URL::asset('Dashboard/assets/css/skin-modes.css') }}" rel="stylesheet">
@endif
