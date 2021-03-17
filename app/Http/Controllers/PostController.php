<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\PostRequest;
use App\Models\AppModel;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $dirView = 'News.';

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
        return view($this->dirView . 'post_create', [

        ]);

    }

    public function postStore(Request $request)
    {

        Post::create([
            'title' => $request->post_title,
            'content' => $request->post_content,
            'image' => 'jd.jpg',
            'status' => 0,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'day_update' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        return redirect()->route('news.post')->with('success', 'Tạo thông báo mới thành công!!!');;
    }

    public function postShow($id)
    {

        $data = Post::where('id', $id)->first();
        $data->status = 1;
        $data->update();
        return view($this->dirView . 'post_show', [
            'data' => $data,


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
        if ($data->title != $request->notify_title || $data->content != $request->notify_content) {
            $data->title = $request->post_title;
            $data->content = $request->post_content;
            if ($data->status == 1) {
                $data->status = 0;
            }
            $data->day_update = $data->updated_at;
            $data->update();

        }

        return redirect()->route('news.postShow', $id)->with('success', 'Cập nhật thông báo thành công!!!');
    }

    public function postDestroy($id)
    {
        $data = Post::where('id', $id)->first();
        $data->delete();

        return redirect()->route('news.post')->with('success', 'Xóa thông báo thành công!!!');
    }
}
