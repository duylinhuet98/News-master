@extends('Admin.Layout.app')

@section('content')
    <div class="post-edit">
        <section class="content padding_content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header">
                        <h1 class="box-title">Sửa thông báo</h1>
                    </div>
                    <div class="box-body">
                        <form id="edit-post" class="form-horizontal"
                              action="{{ route('admin.news.postUpdate',[@$data->id] ) }}"
                              method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">* Chọn loại tin tức:</label>
                                    <div class="col-lg-1">
                                        <select name="post_type_list" style="width: 150px;height: 30px">
                                            <option value={{@$data->post_type_id}} selected> {{@$data->name}}</option>
                                            @foreach($data2 as $value)
                                                <option value={{@$value->id}} > {{@$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">* Tiêu đề:</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control" name="post_title" id="title_post"
                                              placeholder=" Nhập tiêu đề tin tức">{{@$data->title}}</textarea>
                                        @if ($errors->has('post_title'))
                                            <span class="text-error alert-err">{{ $errors->first('post_title') }}</span>
                                        @endif
                                        <p class="text-error" id="post_title"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">* Tiêu đề không dấu:</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control" name="post_title_unsigned" id="title_post"
                                              placeholder=" Nhập tiêu đề tin không dấu">{{@$data->title_unsigned}}</textarea>
                                        @if ($errors->has('post_title_unsigned'))
                                            <span class="text-error alert-err">{{ $errors->first('post_title_unsigned') }}</span>
                                        @endif
                                        <p class="text-error" id="post_title_unsigned"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">* Nội dung:</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control ckeditor" id="content_post" name="post_content"
                                              placeholder=" Nhập nội dung tin tức">{{@$data->content}}</textarea>
                                        @if ($errors->has('post_content'))
                                            <span class="text-error alert-err">{{ $errors->first('post_content') }}</span>
                                        @endif
                                        <p class="text-error" id="post_content"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">hình ảnh:</label>
                                    <div class="col-lg-10">
                                        <img  style="margin-left: 20% " width="auto"  height="auto" src="http://localhost/newsTest/public/upload/post/{{ @$data->image }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Đổi Hình Ảnh:</label>
                                    <div class="col-lg-3">
                                        <input id="img_fb" type="file" name="image" accept=".jpg,.png,.gif,.jpeg,.jfif">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" id="footer" style="text-align: center">
                                <a href="{{ route('admin.news.postShow', [@$data->id] ) }}">
                                    <input type="button" class="btn btn-default" value="Quay lại">
                                </a>

                                <input type="submit" class="btn btn-primary" name="updateTenant" value="Cập nhật">
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
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

