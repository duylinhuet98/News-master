<aside class="main-sidebar" style="height: auto; position: fixed">
    <section class="sidebar" style="height: auto">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header" style="color: whitesmoke">DANH MỤC</li>
            <li class="active treeview">
                @foreach($data['category'] as $cate)
                    <a href="#" class="cate-list fid" id="{{ @$cate->id }}">
                        <span>{{ $cate->name }}</span>
                    </a>

                    <ul class="treeview-menu" id="menu_child_{{ @$cate->id }}">

                    </ul>
                @endforeach
            </li>
        </ul>
    </section>
</aside>
<script>
    $('.cate-list').mouseleave(function () {
        $('.child').remove();
    });

    $('.cate-list').click(function () {
        $('.cate-list').removeClass('active');
        $(this).addClass('active');
        post_type_id = $(this).attr('id');
        $.ajax({
            type: "get",
            url: "http://localhost/news/public/page/block/child/" + post_type_id,
            cache: false,
            success: function (data) {
                $('#menu_child_' + post_type_id).html(data);
            },
            error: function (jqXHR, status, err) {
                alert('lỗi máy chủ!!!' + err);
            },
        });
    });
    $('.sub-cate').hover(function () {
        $('.cate-list').removeClass('active');
        $('.sub-cate').removeClass('active');
        $(this).addClass('active');
    });
</script>
