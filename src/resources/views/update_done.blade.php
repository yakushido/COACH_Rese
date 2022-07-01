@extends('layouts.default')
@section('contents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\done.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\done.css') }}">
@endif
<div class="done">
    <div>
        <h2>ご予約の変更ありがとうございます。</h2>
        <button type="button"><a href="{{ route('home') }}">戻る</a></button>
    </div>
</div>
@endsection