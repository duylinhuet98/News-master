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
                              method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">* Tiêu đề:</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control"
                                              name="post_title">{{@$data->title}}</textarea>
                                        @if ($errors->has('post_title'))
                                            <span
                                                class="text-error alert-err">{{ $errors->first('post_title') }}</span>
                                        @endif
                                        <p class="text-error" id="post_title"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">* Nội dung:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="content-post"
                                                  name="post_content">{{@$data->content}}</textarea>
                                        @if ($errors->has('post_content'))
                                            <span
                                                class="text-error alert-err">{{ $errors->first('post_content') }}</span>
                                        @endif
                                        <p class="text-error" id="post_content"></p>
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



