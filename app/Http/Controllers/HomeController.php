<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //自分以外のユーザー情報を取得
        $users = User::where('id', '<>', \Auth::user()->id)->get();

        //全ユーザーの数を取得
        $userCount = $users->count();
        //現在ログインしているユーザーのIDを取得
        $from_user_id = Auth::id();

        return view('home', compact('users', 'userCount', 'from_user_id'));
    }
}
