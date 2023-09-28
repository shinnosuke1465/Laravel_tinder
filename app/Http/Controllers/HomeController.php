<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //自分以外のユーザー情報を取得
        $users = User::where('id', '<>', \Auth::user()->id)->get();

        return view('home', compact('users'));
    }
}
