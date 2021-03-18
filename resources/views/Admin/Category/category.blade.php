@extends('Admin.Layout.app')
@section('content')
    <div class="category-mgt">
        <section class="content-header">
            <h3 class="box-title" style="text-align: center">Quản lý Danh Mục</h3>
        </section>
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <section class="container-fluid">
            <div class="box row">
                <div class="box-header">
                    <div class="box-header">

                        <div class="form-group">
                            <div class="col-lg-8" style="margin-left: 15%">
                                <form id="create-post" class="form-horizontal"
                                      action="{{ route('admin.category.categoryStore') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">* Tên danh mục:</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="category_name">
                                            @if ($errors->has('category_name'))
                                                <span class="text-error">{{ $errors->first('category_name') }}</span>
                                            @endif
                                            <span class="text-error" id="category_name"></span>
                                        </div>
                                        <label class="col-lg-2 control-label">* Tên không dấu:</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="category_name_unsigned">
                                            @if ($errors->has('category_name_unsigned'))
                                                <span
                                                    class="text-error">{{ $errors->first('category_name_unsigned') }}</span>
                                            @endif
                                            <span class="text-error" id="category_name_unsigned"></span>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-primary" type="submit">Tạo danh mục</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table style="width: 60%; margin-left: 20%; text-align: center" id="table-post-type"
                               class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                            <tr>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">danh mục</th>
                                <th style="text-align: center">tên không dấu</th>
                                <th style="text-align: center">tổng số loại tin</th>
                                <th style="text-align: center">Sửa</th>
                                <th style="text-align: center">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $data as $value )
                                <tr>
                                    <td>{{ @$loop->index + 1 }}</td>
                                    <td>{{ @$value->name }}</td>
                                    <td>{{ @$value->name_unsigned }}</td>
                                    @foreach( $count_post_type as $count)
                                        @if( @$count->id == @$value->id)
                                            <td>{{ @$count->numberPostType }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        {{--                                    <a href="{{ route('admin.category.categoryEdit', ['id' => @$value->id]) }}">--}}
                                        <button class="button-edit">Sửa
                                            <icon class="fa fa-edit"></icon>
                                        </button>
                                        {{--                                    </a>--}}
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#category_{{ @$value->id }}">
                                            <button class=" button-destroy ">Xóa
                                                <icon class="fa fa-trash"></icon>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                {{--modal confirm delete category--}}
                                <div class="modal fade" id="category_{{ @$value->id }}" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" id="header-modal">
                                                <h4 class="modal-title"><b>Tất cả danh sách loại tin và tin tức trong danh mục cũng sẽ bị xóa</b></h4>
                                                <h4 class="modal-title"><b>Bạn chắc chắn muốn xóa?</b></h4>
                                            </div>
                                            <div class="box-footer" id="footer-modal">
                                                <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ
                                                </button>
                                                <a href="{{ route('admin.category.categoryDestroy', ['id' => @$value->id]) }}">
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
