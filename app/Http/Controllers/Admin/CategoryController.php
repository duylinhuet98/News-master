<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $dirView = 'Admin.Category.';

    public function category(){
        $data = Category::orderby('updated_at')->get();
        $count_post_type = DB::table('categories')->leftJoin('post_type', 'categories.id', '=', 'post_type.category_id')
            ->select('categories.id', DB::raw('COUNT(post_type.name) as numberPostType'))
            ->groupBy('categories.id')->get();
        return view( $this->dirView . 'category', [
            'data' => $data,
            'count_post_type' => $count_post_type,
        ]);
    }

    public function categoryStore(Request $request){

        Category::create([
            'name' => $request->category_name,
            'name_unsigned' => $request->category_name_unsigned,
        ]);

        return redirect()->route('admin.category')->with('success', 'Tạo danh mục thành công');
    }
    public function categoryDestroy($id)
    {
        $data['category'] = Category::where('id', $id)->first();
        $data['post_type'] = PostType::where('category_id', $id)->get();
        foreach ($data['post_type'] as $post_type ){
                $data['post'] = Post::where('post_type_id', $post_type->id)->get();
            foreach ($data['post'] as $post ){
                $post->delete();
            }
            $post_type->delete();

        };
        $data['category']->delete();

        return redirect()->route('admin.category')->with('success', 'Xóa danh mục thành công!!!');
    }
}
