<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\AppModel;
use App\Models\Post;
use App\Models\PostType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $dirView = 'Admin.News.';

    public function post(Request $request)
    {
        $data = Post::orderBy('created_at', 'desc')->paginate(3);
        $search = $request->keySearch;
        if (!empty($search)) {
            $data = Post::Where('title', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')->paginate(3);
        }
        return view($this->dirView . 'post', [
            'data' => $data,
            'search' => $search,
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
            $post->title_unsigned = $request->post_title_unsigned;
            $post->content = $request->post_content;
            $post->post_type_id = $request->post_type_list;

            if($request->hasFile('image')) // Kiểm tra upload hình hay không
            {
                $img_file = $request->file('image');
                $img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

                if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jfif')
                {
                    return redirect()->route('admin.news.postCreate')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
                }

                $img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

                $random_file_name = Str::random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL

                $img_file->move('upload/post',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
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
        $data = Post::where('id', $id)->first();


        return view($this->dirView . 'post_edit', [
            'data' => $data,
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
