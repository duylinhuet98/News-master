<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $dirView = 'Page.Block.';

//    public function __construct(){
//        $data = [
//            'category' => Category::all(),
//        ];
//        view()->share('data',$data);
//    }

    public function getCategory($category_id){
        $post_type = PostType::where('category_id',$category_id)->get();
        foreach($post_type as $detail)
            echo "<option value='".$detail->id."'>".$detail->name."</option>";
    }

    public function index(){
        $data['category'] = Category::all();
        return view($this->dirView . 'index',[
            'data' => $data
        ]);
    }
}
