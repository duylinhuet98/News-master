
    @foreach($data['post_child'] as $child)
        <li style="height:30px">
            <a href="{{ route('page.home.postList',[@$child->name_unsigned]) }}">{{ $child->name }}</a>
        </li>
    @endforeach


