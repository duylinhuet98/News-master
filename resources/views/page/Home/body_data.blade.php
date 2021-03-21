<div class="post-mgt">
    <div class="col-sm-12">
        @foreach( @$data['post'] as $value)
            <a href="{{ route('page.home.postView',[@$value->title_unsigned]) }}" style="color: black">
                @if(@$posts_arr != null)
                    @if(in_array($value->id,@$posts_arr))
                        <div class="box-num" style="min-height: 80px; background-color: white">
                            @endif
                            @if(!in_array($value->id,@$posts_arr))
                                <div class="box-num" style="min-height: 80px">
                                    @endif
                                    @endif
                                    @if(@$posts_arr == null)
                                        <div class="box-num" style="min-height: 80px">
                                            @endif
                                            <div class="form-group">

                                                <div class="col-sm-1" style="float: left;margin-right: 4%">
                                                    <img width=100px" height="70px"
                                                         src="http://localhost/newsTest/public/upload/post/{{ @$value->image }}">
                                                </div>
                                                <div class="col-sm-11">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-10">
                                                            <div class="post-title">
                                                                <h4>{{ @$value->title }}</h4></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="col-sm-9">
                                                            <h5 class="post-content">{!! @$value->content !!}</h5>
                                                        </div>
                                                        <div class="col-sm-3" style="text-align: right">
                                                            <h5>Đăng
                                                                ngày: {{ date('d-m-Y', strtotime(@$value->created_at)) }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            </a>
        @endforeach
    </div>

    <div class="text-center">
        {!! $data['post']->links() !!}
    </div>

</div>





