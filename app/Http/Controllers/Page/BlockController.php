<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PostType;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    protected $dirView = 'Page.Block.';

    public function postChild($id){
        $data['post_child'] = PostType::where('category_id', $id)->get();
        return view($this->dirView . 'menu_children',[
            'data' => $data
        ]);
    }
}
