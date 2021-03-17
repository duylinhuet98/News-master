<div class="post-mgt">
<div class="col-sm-12">

                @foreach(@$data as $value)
                    @if(@$value->status == 0)
                        <div class="box-num">
                            @endif
                            @if(@$value->status == 1)
                                <div class="box-num" style="background-color: white">
                                    @endif

                                    <div class="col-sm-12">
                                        <div class="col-sm-10">
                                            <a href="{{ route('admin.news.postShow',[@$value->id]) }}" class="post-title">
                                                <h4>{{ @$value->title }}</h4></a>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="" data-toggle="modal" data-target="#post_{{ @$value->id }}"> <i
                                                    class="fa fa-times fa-2x"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-8">
                                            <h5 class="post-content">{{ @$value->content }}</h5>
                                        </div>
                                        <div class="col-sm-2">
                                            <h5>Ngày tạo: {{ date('h:i a d-m-Y', strtotime(@$value->created_at)) }}</h5>
                                        </div>

                                        <div class="col-sm-2">
                                            <h5>Ngày cập nhật: {{ date('h:i a d-m-Y', strtotime(@$value->day_update)) }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="post_{{ @$value->id }}" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" id="header-modal">
                                                <h4 class="modal-title"><b>Bạn chắc chắn muốn xóa tin tức này ?</b></h4>
                                            </div>
                                            <div class="box-footer" id="footer-modal">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ
                                            </button>
                                            <a href="{{ route('admin.news.postDestroy',[@$value->id]) }}">
                                                <button type="button" class="btn btn-primary"
                                                        style="margin-top: unset">Xác nhận
                                                </button>
                                            </a>
                                        </div>

                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                        </div>
                        @endforeach

            </div>
        </div>

    <div class="text-center">
        {!! $data->links() !!}
    </div>

</div>


