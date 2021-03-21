<div class="header">
<header class="main-header">

        <a href="" class="logo">
            <span class="logo-mini">N-M</span>
            <span style="font-size: 18px">Trang Quản Trị</span>
        </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only"></span>
        </a>
        <span id="show_fb"></span>

        <div class="navbar-custom-menu row">
            <ul class="nav navbar-nav col-sm-8" style="width: 210px;float: right">
                <li class="dropdown user user-menu" id="menu-setting" style="width: 210px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width: 210px;text-align: center" >
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span >{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" style="width: 210px">
                        <div class="nav nav-stacked">
                            <li>
                                <a href="" class="btn btn-default btn-flat " style="width: 210px">
                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                    Thông tin cá nhân
                                </a>
                            </li>
                            <li>
                                <a href=""
                                   class="btn btn-default btn-flat btn-change-password" style="width: 210px">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                    Đổi mật khẩu
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('page.home.logout') }}" class="btn btn-default btn-flat " style="width: 210px">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Đăng xuất
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
</div>
{!! csrf_field() !!}

