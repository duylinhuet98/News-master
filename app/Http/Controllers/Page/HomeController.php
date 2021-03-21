<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Users;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $dirView = 'Page.Home.';

    public function create()
    {
        $admin1 = Users::find('1');
        if ($admin1 != null) {
            return redirect()->route('web.auth.login');
        } else {
            Users::create([
                'email' => 'admin@gmail.com',
                'name' => 'Duy Linh',
                'remember_token' => null,
                'password' => Hash::make('12345678'),
            ]);
        }

        return redirect()->route('page.home.index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            //Xu li login
            $account = $request['email'];
            $password = $request['password'];
            $remember = $request->has('remember') ? true : false;
            if ((Auth::attempt(['email' => $account, 'password' => $password], $remember)) || (Auth::attempt(['phone' => $account, 'password' => $password], $remember))) {
                    return redirect()->route('admin.news.post');
            }
            return redirect()->route('page.home.index')
                ->withErrors(['Tài khoản hoặc mật khẩu không chính xác!']);
        }

        return view($this->dirView . 'login', [
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('page.home.index');
    }


    public function index()
    {
        if (Session::has('posts')) {
            $posts_session = Session('posts');
            $posts_arr = explode(",", $posts_session);
        }else{
            $posts_arr = null;
        };
        $data['post'] = Post::orderBy('created_at', 'desc')->paginate(2);
        $data['category'] = Category::all();
        return view($this->dirView . 'index', [
            'data' => $data,
            'posts_arr' => $posts_arr,
        ]);

    }

    public function bodyData()
    {
        if (Session::has('posts')) {
            $posts_session = Session('posts');
            $posts_arr = explode(",", $posts_session);
        }else{
            $posts_arr = null;
        };
        $data['post'] = Post::orderBy('created_at', 'desc')->paginate(2);

        return view($this->dirView . 'body_data', [
            'data' => $data,
            'posts_arr' => $posts_arr,
        ]);
    }

    public function postData(Request $request, $name)
    {
        if (Session::has('posts')) {
            $posts_session = Session('posts');
            $posts_arr = explode(",", $posts_session);
        }else{
            $posts_arr = null;
        };
        $data['postType'] = PostType::where('name_unsigned', '=', $name)->first();
        $data['post'] = Post::where('post_type_id', '=', $data['postType']->id)
            ->orderBy('created_at', 'desc')->paginate(2);

        return view($this->dirView . 'body_data', [
            'data' => $data,
            'posts_arr' => $posts_arr
        ]);
    }

    public function postList($unsigned_name)
    {
        if (Session::has('posts')) {
            $posts_session = Session('posts');
            $posts_arr = explode(",", $posts_session);
        }else{
            $posts_arr = null;
        };
        $data['postType'] = PostType::where('name_unsigned', '=', $unsigned_name)->first();
        $data['post'] = Post::where('post_type_id', '=', $data['postType']->id)
            ->orderBy('created_at', 'desc')->paginate(2);
        $data['category'] = Category::all();

        return view($this->dirView . 'post_list', [
            'data' => $data,
            'unsigned_name' => $unsigned_name,
            'posts_arr' => $posts_arr

        ]);
    }

    public function postView( $unsigned_title)
    {

        $data['post'] = Post::where('title_unsigned', '=', $unsigned_title)->first();
        if (Session::has('posts')) {
            $posts = Session('posts');
            $posts_arr = explode(",", $posts);
            if(!in_array($data['post']->id, $posts_arr)){
                $posts_put = $posts . ',' . $data['post']->id;
                Session(['posts' => $posts_put]);
            };
        }else{
            $posts_put = $data['post']->id;
            Session(['posts' => $posts_put]);
        };

        $data['category'] = Category::all();
        return view($this->dirView . 'post_view', [
            'data' => $data
        ]);
    }
}
