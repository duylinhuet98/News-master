<!DOCTYPE html>
<html>

<head>

    <meta content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="author" content="colorlib">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title> News-M </title>

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

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/adminlte.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('js/admin.js') }}"></script>
    <script src="{{ URL::asset('js/page.js') }}"></script>
    <script src="{{ URL::asset('js/respond.min.js') }}"></script>
    <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >
    @include('Page.Block.header')
    @include('Page.Block.menu')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('Page.Block.footer')
</div>

    <div style="text-align: left; padding-top: 5%" id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-login">

            <!-- Modal content-->
            <div class="box box-default" style="padding: 10px 10px 10px 10px">
                <div style="margin-left: 10px"><h4>Đăng nhập</h4></div>
                <div class="box-body">

                    <form action="{{ route('page.home.login') }}" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control input" placeholder="Địa Chỉ Email" name="email"
                            >
                        </div>
                        <br>
                        <div>
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu" name="password">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng nhập
                            </button>
                        </div>
                        <div class="form-group" style="margin-bottom: 3em;">
                            <a href="">Quên Mật Khẩu?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

