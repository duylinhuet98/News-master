<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppModel;
use App\Models\PostType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostTypeController extends Controller
{
    protected $dirView = 'Admin.PostType.';

    public function postType(){
        $data = PostType::orderby('updated_at')->get();
        $count_post = DB::table('post_type')->leftJoin('posts', 'post_type.id', '=', 'posts.post_type_id')
            ->select('post_type.id', DB::raw('COUNT(posts.title) as numberPost'))
            ->groupBy('post_type.id')->get();

        return view( $this->dirView . 'post_type', [
           'data' => $data,
            'count_post' => $count_post,
            ]);
    }

    public function postTypeStore(Request $request){
        $this->validate($request,
            [
                'name' => 'required|unique:post_type| min:3',
            ],
            [
                'name.required' => 'Vui lòng điền tên loại tin',
                'name.unique' => 'Tên Loại Tin đã tồn tại, vui lòng nhập tên khác!',
                'name.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
            ]);
        PostType::create([
            'name' => $request->post_type_name,
        ]);

        return redirect()->route('admin.postType')->with('success', 'Tạo loại tin thành công');
    }
}
