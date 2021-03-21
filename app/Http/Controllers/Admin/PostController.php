<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $dirView = 'Admin.News.';

    public function post()
    {
        $data = Post::orderBy('created_at', 'desc')->paginate(3);
        return view($this->dirView . 'post', [
            'data' => $data,
        ]);

    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::orderBy('created_at', 'desc')->paginate(3);
            return view($this->dirView . 'pagination_data', [
                'data' => $data
            ]);
        }
    }

    public function postCreate()
    {
        $data= PostType::select('id','name')->orderBy('created_at','asc')->get();
        return view($this->dirView . 'post_create', [
            'data' => $data,
        ]);

    }

    public function postStore(Request $request)
    {
        $post = new Post;
            $post->title = $request->post_title;
            $post->title_unsigned = $request->post_title;
            $post->content = $request->post_content;
            $post->post_type_id = $request->post_type_list;

            if($request->hasFile('image'))
            {
                $img_file = $request->file('image');
                $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file  ảnh
                if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jfif')
                {
                    return redirect()->route('admin.news.postCreate')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
                }
                $img_file_name = $img_file->getClientOriginalName();
                $random_file_name = Str::random(4).'_'.$img_file_name;
                $img_file->move('upload/post',$random_file_name);
                $post->image = $random_file_name;
            }
            else {
                $post->image = '';
            }
            $post->save();

        return redirect()->route('admin.news.post')->with('success', 'Tạo tin tức mới thành công!!!');
    }

    public function postShow($id)
    {

        $data['post'] = Post::where('id', $id)->first();
        $data['post_type'] = PostType::where('id',$data['post']->post_type_id)->value('name');
        return view($this->dirView . 'post_show', [
            'data'  => $data,
        ]);
    }

    public function postEdit($id)
    {
        $data = DB::table('posts')->leftJoin('post_type','posts.post_type_id','=','post_type.id')->where('posts.id', $id)->first();
        $data2= PostType::select('id','name')->orderBy('created_at','asc')->get();
        return view($this->dirView . 'post_edit', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $data = Post::where('id', $id)->first();
        if ($data->title != $request->post_title || $data->content != $request->post_content) {
            $data->title = $request->post_title;
            $data->content = $request->post_content;
            if ($data->status == 1) {
                $data->status = 0;
            }
            $data->day_update = $data->updated_at;
            $data->update();

        }

        return redirect()->route('admin.news.postShow', $id)->with('success', 'Cập nhật thông báo thành công!!!');
    }

    public function postDestroy($id)
    {
        $data = Post::where('id', $id)->first();

        $data->delete();

        return redirect()->route('admin.news.post')->with('success', 'Xóa thông báo thành công!!!');
    }
}
