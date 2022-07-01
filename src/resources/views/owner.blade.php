@extends('layouts.adminDefault')
@section('adminContents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\owner.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\owner.css') }}">
@endif
<h1>店舗代表者画面</h1>
<div class="owner">

    <div class="detail">
        <h2>{{ $myshop['shop']['name'] }}</h2>
        <img src="{{ $myshop['shop']['picture'] }}" alt="店舗画像">
        <div class="detail_tags">
        <p>#{{ $myshop['shop']['area']['name'] }}</p>
        <p>#{{ $myshop['shop']['genre']['name'] }}</p>
        </div>
        <div>
            <form action="{{ route('owner.update')}}" method="POST">
                @csrf
                <textarea name="detail" id="">{{ $myshop['shop']['detail'] }}</textarea>
                <div class="update_button">
                    <button>更新</button>
                </div>
            </form>
        </div>
    </div>

    <div class="shop_reservation">
        <h2>予約状況</h2>
            @foreach($reservations as $reservation)
                <div class="shop_reservation_card">
                    <table>
                        <tr>
                            <td>UserName</td>
                            <td>{{ $reservation['user']['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{ $reservation['date'] }}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ substr($reservation['time'], 0, 5) }}</td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>{{ $reservation['number'] }}人</td>
                        </tr>
                    </table>
                </div>
            @endforeach
    </div>

</div>
@endsection