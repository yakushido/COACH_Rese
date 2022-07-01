@extends('layouts.default')
@section('contents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\update.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\update.css') }}">
@endif
<div class="update">
@foreach($items as $item)
    <div class="update_detail">
        <div>
            <a href="/"><</a>
            <h2>{{ $item['shop']['name'] }}</h2>
        </div>
        <img src="{{ $item['shop']['picture'] }}" alt="店舗画像">
        <div class="detail_tags">
            <p>#{{ $item['shop']['area']['name'] }}</p>
            <p>#{{ $item['shop']['genre']['name'] }}</p>
        </div>
        <div>
            <p>{{ $item['shop']['detail'] }}</p>
        </div>
    </div>
@endforeach

    <div class="update_reservation">
        <h2>予約変更</h2>
        <form action="{{ route('update', $item->id) }}" method="POST">
        @csrf
            <div>
                <input type="date" name="date" value="{{ $item['date'] }}">
                <select name="time" value="{{ substr($item['time'], 0, 5) }}" >
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                </select>
                <select name="number" value="{{ $item['number'] }}">
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                    <option value="5">5人</option>
                    <option value="6">6人</option>
                    <option value="7">7人</option>
                    <option value="8">8人</option>
                    <option value="9">9人</option>
                    <option value="10">10人</option>
                </select>
            </div>

            @foreach($items as $item)
            <h2>予約状況</h2>
            <table class="update_reservation_table">
                <tr>
                    <td>Shop</td>
                    <td>{{ $item['shop']['name'] }}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>{{ $item['date']}}</td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>{{ substr($item['time'], 0, 5) }}</td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>{{ $item['number'] }}人</td>
                </tr>
            </table>
            @endforeach
            <button>変更する</button>
        </form>
    </div>


</div>
@endsection


