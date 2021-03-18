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
        $data = Users::all();
        return view($this->dirView . 'user_list', [
            'data' => $data,
        ]);
    }

    public function userDestroy($id){
        $data = Users::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.userList')->with('success', 'Xóa tài khoản thành công !!!');
    }
}
