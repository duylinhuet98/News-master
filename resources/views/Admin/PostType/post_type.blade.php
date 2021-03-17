@extends('Admin.Layout.app')
@section('content')
    <div class="postType-mgt">
        <section class="content-header">
            <h3 class="box-title" style="text-align: center">Quản lý Thể Loại Tin Tức</h3>
        </section>
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <section class="container-fluid">
            <div class="box row">
                <div class="box-header">

                    <div class="form-group">
                        <div class="col-sm-8" style="margin-left: 30%">
                            <form id="create-post" class="form-horizontal"
                                  action="{{ route('admin.postType.postTypeStore') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">* Tên loại tin:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="post_type_name">
                                        @if ($errors->has('post_type_name'))
                                            <span class="text-error">{{ $errors->first('post_type_name') }}</span>
                                        @endif
                                        <span class="text-error" id="post_type_name"></span>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" type="submit">Tạo loại tin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table style="width: 50%; margin-left: 30%; text-align: center" id="table-post-type"
                           class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                        <tr>
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">loại tin</th>
                            <th style="text-align: center">tổng số tin</th>
                            <th style="text-align: center">Sửa</th>
                            <th style="text-align: center">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $value )
                            <tr>
                                <td>{{ @$loop->index + 1 }}</td>
                                <td>{{ @$value->name }}</td>
                                @foreach( $count_post as $count)
                                    @if( @$count->id == @$value->id)
                                        <td>{{ @$count->numberPost }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    {{--                                    <a href="{{ route('admin.postType.postTypeEdit', ['id' => @$value->id]) }}">--}}
                                    <button class="button-edit">Sửa
                                        <icon class="fa fa-edit"></icon>
                                    </button>
                                    {{--                                    </a>--}}
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#post_type_{{ @$value->id }}">
                                        <button class=" button-destroy ">Xóa
                                            <icon class="fa fa-trash"></icon>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            {{--modal confirm delete postType--}}
                            <div class="modal fade" id="post_type_{{ @$value->id }}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" id="header-modal">
                                            <h4 class="modal-title"><b>Bạn chắc chắn muốn xóa phòng này ?</b></h4>
                                        </div>
                                        <div class="box-footer" id="footer-modal">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ
                                            </button>
                                            {{--                                            <a href="{{ route('admin.postType.postTypeDestroy', ['id' => @$value->id]) }}">--}}
                                            <button type="button" class="btn btn-primary">Xác nhận</button>
                                            {{--                                            </a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
