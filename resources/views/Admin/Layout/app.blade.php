<!DOCTYPE html>
<html>
<head>
    <!-- Mobile Specific Meta -->
    <meta content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="author" content="colorlib">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title> M-M </title>
    <!--
    CSS
    ============================================= -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/post.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">


    @yield('extra_css')
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper" >
    @include('Admin.Layout.header')
    @include('Admin.Layout.aside')
    <div class="content-wrapper" style=" height: auto">
        @yield('content')
    </div>
    @include('Admin.Layout.footer')
</div>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('js/adminlte.min.js') }}"></script>
<script src="{{ URL::asset('js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.datetimepicker.full.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/admin.js') }}"></script>
<script src="{{ URL::asset('js/respond.min.js') }}"></script>
<script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-multiselect.min.js') }}"></script>
<script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>





<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('extra_js')
</body>
</html>
