@extends('layouts.default')
@section('contents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\login.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\login.css') }}">
@endif
<div class="login">
    <h2>Login</h2>
    @if (isset($login_error))
    <div id="error_explanation" class="text-danger">
        <ul>
            <li>メールアドレスまたはパスワードが一致しません。</li>
        </ul>
    </div>
@endif
    <form action="/login" method="post">
    @csrf
        <div>
            <img src="{{ asset('storage/mail.png') }}" alt="メールのアイコン">
            <input type="email" name="email">
        </div>
        <div>
        <img src="{{ asset('storage/lock.png') }}" alt="パスワードのアイコン">
            <input type="password" name="password">
        </div>
        <button type="submit">ログイン</button>
    </form>
</div>
@endsection