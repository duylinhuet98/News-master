@extends('Page.Block.app')
@section('content')
    <div class="post-mgt">

        <section class="content-header" style="padding-top:5%">
            Tổng hợp các tin
        </section>

        {{--    <section class="content">--}}
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
                <div id="data_list">
                    @include('Page.Home.body_data')
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
                    url: "http://localhost/news/public/page/home/body_data?page=" + page,
                    success: function (data) {
                        $('#data_list').html(data);
                    },
                    error: function (jqXHR, status, err) {
                        alert('lỗi máy chủ!!!' + err);
                    },
                });
            }

        });
    </script>

@endsection
