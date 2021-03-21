@extends('Page.Block.app')
@section('content')
    <div class="post-mgt">
        <section class="content-header" style="margin-top: 3%; text-align: left; margin-left: 2%">
            {{ @$data['postType']->name }}
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
                <div id="post_data_list">
                    @include('Page.Home.body_data')
                </div>
            </div>
        </div>
    </div>
    <input id="val_name" value="{{ @$unsigned_name }}" hidden="hidden">

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var name = document.getElementById("val_name").value;
                fetch_post_data(page,name);
            });

            function fetch_post_data(page,name) {
                $.ajax({
                    url: "http://localhost/news/public/page/home/post-list/" + name + "/body_data?page=" + page,
                    data: name,
                    success: function (data) {
                        $('#post_data_list').html(data);
                    },
                    error: function (jqXHR, status, err) {
                        alert('lỗi máy chủ!!!' + err);
                    },
                });
            }

        });
    </script>

@endsection
