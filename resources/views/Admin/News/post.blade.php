@extends('Admin.Layout.app')
@section('content')
    <div class="post-mgt">
        <section class="content-header">
            <h3 class="box-title">Tin Tức </h3>
        </section>
        {{--    <section class="content">--}}
        <div class="box row">
            <div class="box-header">
                <div class="form-group">
                    <div class="col-lg-3" style="margin-top: 4px">
                        <a href="{{ route('admin.news.postCreate') }}">
                            <button class="btn btn-primary">Tạo tin mới</button>
                        </a>
                    </div>
                    <form class="col-lg-4" action="" method="GET">
                        <div class="search">
                            <div class="form-group has-feedback">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                <input name="keySearch" type="text" class="form-control" value="{{@$search}}"
                                       placeholder="Tìm kiếm tin tức" aria-controls="table-question">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                <div id="list_data">
                    @include('Admin.News.pagination_data')
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {

                $.ajax({
                    url: "http://localhost/newsTest/public/admin/post/fetch_data?page=" + page,
                    success: function (data) {
                        $('#list_data').html(data);
                    },
                    error: function (jqXHR, status, err) {
                        alert('lỗi máy chủ!!!' + err);
                    },
                });
            }

        });
    </script>
@endsection
