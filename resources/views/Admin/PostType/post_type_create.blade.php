@extends('Admin.Layout.app')
@section('content')
    <div class="post-type-create">
        <section class="content-header">
            <h1 class="box-title" style="text-align: center">
                Tạo phòng cho thuê
            </h1>
        </section>
        <section class="content padding_content">
            <div class="box box_width">
                <div class="box-body no-padding">
                    <form id="create-post-type" class="form-horizontal" action="{{ route('admin.postType.postTypeStore') }}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">* Tên loại tin:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="post-type_name">
                                    @if ($errors->has('post_type_name'))
                                        <span class="text-error">{{ $errors->first('post-type_name') }}</span>
                                    @endif
                                    <span class="text-error" id="post_type_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Thông tin phòng:</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="post-type_info"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" id="footer">
                            <a href="{{ route('web.landlord.post-typeManagement') }}">
                                <input type="button" class="btn btn-default" value="Quay lại">
                            </a>

                            <input type="submit" class="btn btn-primary" name="addpost-type" value="Tạo">
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
