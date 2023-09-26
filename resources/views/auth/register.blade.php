@extends('layouts.layout')

@section('content')
<div class="signupPage">
  <header class="header">
    <div>アカウントを作成</div>
  </header>
  <div class='container m-0 m-auto'>
    <form class="form mt-5" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

      <label for="file_photo" class="rounded-full userProfileImg">
        <div class="userProfileImg_description">画像をアップロード</div>
        <i class="fas fa-camera fa-3x"></i>
        <input type="file" id="file_photo" name="file_photo" accept="image/*">

      </label>
      <div class="userImgPreview" id="userImgPreview">
        <img id="thumbnail" class="userImgPreview_content" src="">
        <p class="userImgPreview_text">画像をアップロード済み</p>
      </div>
      <div class="form-group p-2 w-full mx-auto @error('name')has-error @enderror">
        <label>名前</label>
        <input type="text" name="name" class="form-control w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="名前を入力してください">
        @error('name')
            <span class="errorMessage">
              {{ $message }}
            </span>
        @enderror
    </div>
      <div class="form-group p-2 mx-auto @error('email')has-error @enderror">
        <label>メールアドレス</label>
        <input type="email" name="email" class="form-control w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="メールアドレスを入力してください">
        @error('email')
            <span class="errorMessage">
              {{ $message }}
            </span>
        @enderror
      </div>
      <div class="form-group p-2 mx-auto @error('password')has-error @enderror">
        <label>パスワード</label>
        <em>6文字以上入力してください</em>
        <input type="password" name="password" class="form-control w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="パスワードを入力してください">
        @error('password')
            <span class="errorMessage">
              {{ $message }}
            </span>
        @enderror
    </div>
      <div class="form-group p-2 mx-auto">
        <label>確認用パスワード</label>
        <input type="password" name="password_confirmation" class="form-control w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="パスワードを再度入力してください">
      </div>
      <div class="form-group p-2 mx-auto">
        <div><label>性別</label></div>
        <div class="relative flex">
        <div class="form-check form-check-inline mr-2">
          <input class="form-check-input mr-2" name="sex" value="0" type="radio" id="inlineRadio1" checked>
          <label class="form-check-label" for="inlineRadio1">男</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input mr-2" name="sex" value="1" type="radio" id="inlineRadio2">
          <label class="form-check-label" for="inlineRadio2">女</label>
        </div>
    </div>
      </div>
      <div class="form-group p-2 mx-auto @error('self_introduction')has-error @enderror">
        <label>自己紹介文</label>
        <textarea class="form-control w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" name="self_introduction" rows="10"></textarea>
          @error('self_introduction')
          <span class="errorMessage">
            {{ $message }}
          </span>
          @enderror
        </div>
    </div>

      <div class="text-center">
      <button type="submit" class="btn submitBtn">はじめる</button>
      <div class="linkToLogin">
        <a href="{{ route('login') }}">ログインはこちら</a>
      </div>
      </div>
    </form>
  </div>
</div>
@endsection

