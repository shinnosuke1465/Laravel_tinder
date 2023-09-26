<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use InterventionImage;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;
use App\Models\User; //この行を追記
use Intervention\Image\Facades\Image; //追加
use App\Services\CheckExtensionServices; //追加
use App\Services\FileUploadServices; //追加
use App\Http\Requests\ProfileRequest; //ここを追加


class UserController extends Controller
{
  public function show($id)
  {
    $user = User::findorFail($id);

    return view('users.show', compact('user'));
  }

  // ここから追加
  public function edit($id)
  {
    $user = User::findorFail($id);

    return view('users.edit', compact('user'));
  }
  public function update($id, Request $request)
  {
    //$idにあうユーザー情報を取得
    $user = User::findorFail($id);

    $imageFile = $request->image;
    //画像ファイルがアップロードされているかどうかを判定
    if (!is_null($imageFile)) {
      //画像とフォルダ名を渡す
      $fileNameToStore = ImageService::upload($imageFile, 'images');
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->sex = $request->sex;
    $user->self_introduction = $request->self_introduction;
    if (!is_null($imageFile)) {
    $user->img_name = $fileNameToStore;
    }

    $user->save();

    return redirect('top');
  }
}
