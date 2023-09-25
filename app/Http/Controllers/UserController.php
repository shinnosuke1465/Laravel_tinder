<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
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
    public function update(Request $request, $id)
{
//$idにあうユーザー情報を取得
  $user = User::findorFail($id);

//画像ファイルがアップロードされているかどうかを判定
  if(!is_null($request['img_name'])){
      $imageFile = $request['img_name'];
//ユニークなファイル名を生成し、画像ファイルをリサイズして保存
      $list = FileUploadServices::fileUpload($imageFile);
      list($extension, $fileNameToStore, $fileData) = $list;
      
      $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
      $image = Image::make($data_url);        
      $image->resize(400,400)->save(storage_path() . '/app/public/images/' . $fileNameToStore );

      $user->img_name = $fileNameToStore;
  }
  
  $user->name = $request->name;
  $user->email = $request->email;
  $user->sex = $request->sex;
  $user->self_introduction = $request->self_introduction;

  $user->save();

  return redirect('top');
}
}
