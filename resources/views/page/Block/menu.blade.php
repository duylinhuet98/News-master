<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Danh Sách Thể Loại
        </li>
        @foreach($data['category'] as $cate)
            @if(count($cate->post_type) > 0)
                <li class="list-group-item menu1 cate-list">
                    {{ $cate->name }}
                </li>
                <ul>
                    @foreach($cate->post_type as $subcate)
                        <li class="list-group-item">
                            <a href="loai-tin/{{ $subcate->name_unsigned }}">{{ $subcate->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>
<script>
    $(".menu1").next('ul').toggle();

    $(".menu1").click(function(event) {
        $(this).next("ul").toggle(500);
    });
</script>
