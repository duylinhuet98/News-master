@extends('Admin.Layout.app')
@section('content')
    <div class="user-list">
        <section class="content-header">
            <h3 class="box-title">Danh sách người dùng</h3>
        </section>
        <section class="content">
            <div class="box row">
                <div class="box-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if($message = Session::get('error'))
                        <div class="alert alert-error alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <table style="font-size: 14px; text-align: center" id="table-user-list" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                        <tr>
                            <th style="width:10px; text-align: center;">STT</th>
                            <th style="width:150px; text-align: center;">Tên</th>
                            <th style="width:140px; text-align: center;">Email</th>
                            <th style="width:95px; text-align: center;">Ngày tạo</th>
                            <th style="width:95px; text-align: center;">trạng thái</th>
                            <th style="width:60px; text-align: center;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $user )
                            <tr>
                                <td>{{ @$loop->index + 1 }}</td>
                                <td>{{ @$user->name }}</td>
                                <td>{{ @$user->email }}</td>
                                <td></td>
                                <td>
                                        <a href="" data-toggle="modal" data-target="#user_management_{{ @$user->id }}">
                                            <button class=" button-destroy ">xóa <icon class="fa fa-trash"></icon></button>
                                        </a>
                                </td>
                            </tr>
                            {{--modal confirm delete room--}}
                            <div class="modal fade" id="user_management_{{ @$user->id }}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <form id="edit-user" class="form-horizontal" action=""
                                              method="post">
                                            {{ csrf_field() }}
                                            <div class="modal-header" id="header-modal">
                                                <h4 class="modal-title" style="text-align: center"><b>Bạn chắc chắn muốn xóa tài khoản này ?</b></h4>
                                            </div>
                                            <div class="box-footer" id="footer-modal">
                                                <button type="reset" class="btn btn-default" data-dismiss="modal">Huỷ</button>
                                                <a href="{{ route('admin.userDestroy', ['id' => @$user->id]) }}">
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                </a>
                                            </div>
                                        </form>
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
