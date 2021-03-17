<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">

            <li class="aside-tranform admin-home">
                <a href="{{ route('admin.userList')}}">
                    <i class="fa fa-users">
                    </i> <span>Danh sách tài khoản</span>
                </a>
            </li>
            <li class="aside-tranform">
                <a href="{{ route('admin.postType')}}">
                    <i class="fa fa-address-book">
                    </i> <span>Danh sách loại tin</span>
                </a>
            </li>
            <li class="aside-tranform">
                <a href="{{ route('admin.news.post') }}">
                    <i class="fa fa-newspaper-o">
                    </i> <span>Danh sách tin</span>
                </a>
            </li>
            <li class="aside-tranform">
                <a href="{{ route('admin.news.postCreate') }}">
                    <i class="fa fa-plus-square ">
                    </i> <span>Tạo tin tức</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
