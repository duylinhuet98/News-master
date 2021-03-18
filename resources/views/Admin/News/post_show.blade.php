@extends('Admin.Layout.app')

@section('content')
<div class="post-show">
    <section class="content">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    <h1 class="box-title">Tin Tức</h1>
                </div>
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
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Thể loại:</label>
                            <div class="col-lg-10">
                                <p id="post_title" disabled>{{ @$data['post_type'] }}</p>
                            </div>
                        </div>
                        <img width="100px" src="http://localhost/news/public/upload/post/{{ @$data['post']->image }}">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tiêu đề:</label>
                            <div class="col-lg-10">
                                <textarea id="post_title" disabled>{{ @$data['post']->title }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tiêu đề không dấu:</label>
                            <div class="col-lg-10">
                                <textarea id="post_title" disabled>{{ @$data['post']->title_unsigned }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nội dung:</label>
                            <div class="col-lg-10">
                                <textarea id="post_content" disabled>{{ @$data['post']->content }}</textarea>
                            </div>
                        </div>

                        <div class="box-footer" style="text-align: center">
                            <a href="{{ route('admin.news.post') }}">
                                <input type="button" class="btn btn-default" value="Quay lại">
                            </a>

                            <a class="edit-button" href="{{ route('admin.news.postEdit',[@@$data['post']->id]) }}">
                                <input type="button" class="btn btn-primary" value="Sửa">
                            </a>
                        </div>
                    </div>
                </form>
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
