@extends('layouts.default')
@section('contents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\register.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\register.css') }}">
@endif
<div class="register">
    <h2>Registration</h2>
    <form action="{{ route('register') }}" method="POST">
    @csrf
        @if($errors->has('name'))
            <p class="message">{{$errors -> first('name')}}</p>
        @endif
        <div>
            <img src="{{asset('storage/user.png')}}" alt="ユーザーのアイコン">
            <input type="text" name="name">
        </div>
        @if($errors->has('email'))
            <p class="message">{{$errors -> first('email')}}</p>
        @endif
        <div>
            <img src="{{asset('storage/mail.png')}}" alt="メールのアイコン">
            <input type="email" name="email">
        </div>
        @if($errors->has('password'))
            <p class="message">{{$errors -> first('password')}}</p>
        @endif
        <div>
            
            <img src="{{asset('storage/lock.png')}}" alt="パスワードのアイコン">
            <input type="password" name="password" id="password" value=""  onKeyUp="copy()">
        </div>
        <div>
            <input name="password_confirmation" type="hidden" id="confirm" value="">
        </div>
        <button type="submit">登録</button>
    </form>
</div>

<script>
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm');
    function copy(){
        confirm.value = password.value;
    }
</script>
@endsection