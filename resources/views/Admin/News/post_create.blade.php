@extends('Admin.Layout.app')

@section('content')
    <div class="post-create">
        <section class="content-header">
            <h1 class="box-title" style="text-align: center">
                Tạo tin mới
            </h1>
        </section>
        <section class="content padding_content">
            <div class="box box_width">
                <div class="box-body no-padding">
                    <form id="create-post" name="post" class="form-horizontal"
                          action="{{ route('admin.news.postStore') }}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">* Tiêu đề:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="post_title" id="title_post"
                                              placeholder=" Nhập tiêu đề thông báo"></textarea>
                                    @if ($errors->has('post_title'))
                                        <span class="text-error alert-err">{{ $errors->first('post_title') }}</span>
                                    @endif
                                    <p class="text-error" id="post_title"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">* Nội dung:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="content_post" name="post_content"
                                              placeholder=" Nhập nội dung thông báo"></textarea>
                                    @if ($errors->has('post_content'))
                                        <span class="text-error alert-err">{{ $errors->first('post_content') }}</span>
                                    @endif
                                    <p class="text-error" id="post_content"></p>
                                </div>


                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" id="footer">
                            <a href="{{ route('admin.news.post') }}">
                                <input type="button" class="btn btn-default" value="Quay lại">
                            </a>

                            <input type="submit" class="btn btn-primary" name="addpost" value="Thêm mới">
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection


