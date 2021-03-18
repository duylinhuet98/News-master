<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppModel;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostTypeController extends Controller
{
    protected $dirView = 'Admin.PostType.';

    public function postType(){
        $data = DB::table('post_type')->join('categories','post_type.category_id','=','categories.id')
                ->select('categories.name', 'post_type.id as idPostType','post_type.name_unsigned as namePostTypeUnsigned','post_type.name as namePostType')
                ->orderBy('post_type.created_at')->get();
        $category = Category::select('id','name')->get();
        $count_post = DB::table('post_type')->leftJoin('posts', 'post_type.id', '=', 'posts.post_type_id')
            ->select('post_type.id', DB::raw('COUNT(posts.title) as numberPost'))
            ->groupBy('post_type.id')->get();

        return view( $this->dirView . 'post_type', [
           'data' => $data,
            'category' => $category,
            'count_post' => $count_post,
            ]);
    }

    public function postTypeStore(Request $request){
        PostType::create([
            'category_id' => $request->category_list,
            'name' => $request->post_type_name,
            'name_unsigned' => $request->post_type_name_unsigned,
        ]);

        return redirect()->route('admin.postType')->with('success', 'Tạo loại tin thành công');
    }
    public function postTypeDestroy($id)
    {
        $data['post_type'] = PostType::where('category_id', $id)->first();
            $data['post'] = Post::where('post_type_id', $data['post_type']->id)->get();
            foreach ($data['post'] as $post ){
                $post->delete();
            }
        $data['post_type']->delete();


        return redirect()->route('admin.postType')->with('success', 'Xóa loại tin thành công!!!');
    }
}
