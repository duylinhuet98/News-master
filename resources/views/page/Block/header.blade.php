<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #1c2d3f ">
    <div class="container" style="width: auto">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('page.home.index') }}">TRANG WEB TIN TỨC</a>
                </li>
            </ul>

{{--            <form class="col-sm-4" action="" method="GET">--}}
{{--                <div class="search">--}}
{{--                    <div class="form-group has-feedback">--}}
{{--                        <span class="glyphicon glyphicon-search form-control-feedback"></span>--}}
{{--                        <input name="keySearch" type="text" class="form-control" value="{{@$search}}"--}}
{{--                               placeholder="Tìm kiếm tin tức" aria-controls="table-question">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}


                    <i class="fa fa-caret-down"></i>
                </a>

                <ul class="nav navbar-nav pull-right">

                        <li>
                            <a style="cursor: pointer; margin-right: 20px" class="login-sec" data-toggle="modal" data-target="#myModal">Đăng Nhập</a>
                        </li>
                </ul>

        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- End Header -->
