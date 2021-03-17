<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppModel;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
    protected $dirView = 'Admin.UserList.';

    public function userList(){
        $data = Users::where('level', AppModel::ROLE_USER)->get();
        $count_comment = DB::table('users')->leftJoin('comment', 'users.id', '=', 'comment.user_id')
            ->select('users.id', DB::raw('COUNT(comment.content) as numberComment'))
            ->groupBy('users.id')->get();

        return view($this->dirView . 'user_list', [
            'data' => $data,
            'count_comment' => $count_comment,
        ]);
    }

    public function userDestroy($id){
        $data = Users::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.userList')->with('success', 'Xóa tài khoản thành công !!!');
    }
}
