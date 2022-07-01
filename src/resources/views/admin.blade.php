@extends('layouts.adminDefault')
@section('adminContents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\admin.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\admin.css') }}">
@endif
<div class="admin">
    <h1>管理者画面</h1>
    <div>
        <div class="admin_add">
            <form action="{{ route('admin.add') }}" method="POST">
            @csrf
                <table>
                    <tr>
                        <td>店舗名：</td>
                        <td>
                            <select name="shop_name">
                                @foreach($shops as $shop)
                                <option value="{{ $shop['id'] }}">{{ $shop['name']  }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>店舗管理者名：</td>
                        <td><input type="text" name="owner_name"></td>
                    </tr>
                    <tr>
                        <td>メールアドレス:</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>パスワード:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                </table>
                <div class="button"><button>追加</button></div>
            </form>
        </div>
        <div class="owner_list">
            <h2>店舗管理者一覧</h2>
            <div>
                <table class="owner_list_table">
                    <tr>
                        <th>店舗名</th>
                        <th>店舗管理者名</th>
                    </tr>
                    @foreach($owners as $owner)
                    <tr>
                        <td>{{ $owner['shop']['name'] }}</td>
                        <td>{{ $owner['name'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection