@extends('layouts.default')
@section('contents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\thanks.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\thanks.css') }}">
@endif
<div class="thanks">
    <div>
        <h2>会員登録ありがとうございます</h2>
        <button><a href="/home">ログインする</a></button>
    </div>
</div>
@endsection