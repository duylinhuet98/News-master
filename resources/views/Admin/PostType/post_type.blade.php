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
                        <div class="col-lg-12">
                            <form id="create-post-type" class="form-horizontal"
                                  action="{{ route('admin.postType.postTypeStore') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">* Tên loại tin:</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="post_type_name">
                                        @if ($errors->has('post_type_name'))
                                            <span class="text-error">{{ $errors->first('post_type_name') }}</span>
                                        @endif
                                        <span class="text-error" id="post_type_name"></span>
                                    </div>
                                    <label class="col-lg-2 control-label">* Tên không dấu:</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="post_type_name_unsigned">
                                        @if ($errors->has('post_type_name'))
                                            <span
                                                class="text-error">{{ $errors->first('post_type_name_unsigned') }}</span>
                                        @endif
                                        <span class="text-error" id="post_type_name_unsigned"></span>
                                    </div>
                                    <label class="col-lg-2 control-label">* Chọn danh mục:</label>
                                    <div class="col-lg-2">
                                        <select name="category_list" style="width: 150px;height: 30px">
                                            @foreach($category as $cate)
                                                <option value={{@$cate->id}} selected> {{@$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-1">
                                        <button class="btn btn-primary" type="submit">Tạo loại tin</button>
                                    </div>
                                </div>
                                <div class="col-lg-4" style="text-align:center; margin-left: 5%">
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $err)
                                                <strong>{{ $err }}</strong><br/>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="table-post-type" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                        <tr>
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">loại tin</th>
                            <th style="text-align: center">tên không dấu</th>
                            <th style="text-align: center">danh mục</th>
                            <th style="text-align: center">tổng số tin</th>
                            <th style="text-align: center">Sửa</th>
                            <th style="text-align: center">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $value )
                            <tr>
                                <td>{{ @$loop->index + 1 }}</td>
                                <td>{{ @$value->namePostType }}</td>
                                <td>{{ @$value->namePostTypeUnsigned }}</td>
                                <td>{{ @$value->name }}</td>
                                @foreach( $count_post as $count)
                                    @if( @$count->id == @$value->idPostType)
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
                                    <a href="" data-toggle="modal" data-target="#post_type_{{ @$value->idPostType }}">
                                        <button class=" button-destroy ">Xóa
                                            <icon class="fa fa-trash"></icon>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            {{--modal confirm delete postType--}}
                            <div class="modal fade" id="post_type_{{ @$value->idPostType }}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" id="header-modal">
                                            <h4 class="modal-title"><b>Tất cả danh sách tin tức trong danh mục cũng sẽ bị xóa</b></h4>
                                            <h4 class="modal-title"><b>Bạn chắc chắn muốn xóa?</b></h4>
                                        </div>
                                        <div class="box-footer" id="footer-modal">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ
                                            </button>
                                            <a href="{{ route('admin.postType.postTypeDestroy', ['id' => @$value->idPostType]) }}">
                                                <button type="button" class="btn btn-primary">Xác nhận</button>
                                            </a>
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
