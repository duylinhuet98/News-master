@extends('Page.Block.app')
@section('content')
    <!-- Page Content -->
    <div class="container" style="padding-top: 4%">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-10">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ @$data['post']->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img width="900px" height="400px" src="http://localhost/newsTest/public/upload/post/{{ @$data['post']->image }}" alt="hinh anh">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>
                    @if(!empty(@$data['post']->created_at))
                    Đăng lúc: {{ date('h:i a d-m-Y', strtotime(@$data['post']->created_at)) }}
                    @else
                        {{ 'Không Xác Định' }}
                    @endif
                </p>
                <hr>



                <p>
                    {!! @$data['post']->content !!}
                </p>

                <hr>

            </div>
        </div>
    </div>
@endsection
