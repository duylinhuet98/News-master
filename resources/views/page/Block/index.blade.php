<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
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
    <script src="{{ URL::asset('js/respond.min.js') }}"></script>
    <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>

</head>

<div>
@include('Page.Block.header')
<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Danh Sách Thể Loại
        </li>
{{--        @foreach($data as $cate)--}}

{{--                <li class="list-group-item menu1 cate-list">--}}
{{--                    {{ $cate->name }}--}}
{{--                </li>--}}
{{--                <ul>--}}
{{--                    @foreach($cate->LoaiTin as $subcate)--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a href="loai-tin/{{ $subcate->TenKhongDau }}">{{ $subcate->Ten }}</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

{{--        @endforeach--}}
    </ul>
</div>
<div style="height: 850px">
@yield('content')
</div>

@include('Page.Block.footer')

<div style="text-align: left; padding-top: 5%" id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-login">

        <!-- Modal content-->
        <div class="box box-default" style="padding: 10px 10px 10px 10px">
            <div style="margin-left: 10px"><h4>Đăng nhập</h4></div>
            <div class="box-body">

                <form action="dang-nhap" method="POST">
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
</body>
<!-- Footer -->
<hr>

<!-- End Footer -->
</html>

