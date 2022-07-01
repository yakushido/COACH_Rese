@extends('layouts.default')
@section('contents')
@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\shop.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css\shop.css') }}">
@endif
<!-- 検索機能 -->
<div class="search">
    <form action="/search" onchange="submit(this.form)" method="GET" id="form">
        @csrf
            <select name="searchArea" id="submit_area">
                <option value="" selected>All area</option>
                @foreach ($areaLists as $areaList)
                    <option value="{{ $areaList['id'] }}">{{ $areaList['name'] }}</option>
                @endforeach
            </select>
            <select name="searchGenre" id="submit_genre">
                <option value="" selected>All genre</option>
                @foreach ($genreLists as $genreList)
                    <option value="{{ $genreList['id'] }}">{{ $genreList['name'] }}</option>
                @endforeach
            </select>
            <input type="search" name="searchKeyWord" placeholder="Search...">
    </form>
</div>
<!-- 検索機能終わり -->

<!-- 店舗カード -->
<div class="shops">
    @foreach ($items as $item)
        <div class="card">
            <img src="{{ $item['picture'] }}" alt="店舗画像">
            <div class="card_content">
                <h2>{{ $item['name'] }}</h2>
                <div class="card_tag">
                    <p>#{{ $item['area']['name'] }}</p>
                    <p>#{{ $item['genre']['name'] }}</p>
                </div>
                <div class="card_button">  
                <a href="{{ route('shops.detail', ['shop_id' => $item->id ]) }}">詳しく見る</a>
                @if($item->is_liked_by_auth_user())
                    @foreach($favorites as $favorite)
                        @if( $favorite['shop_id'] === $item['id'] )  
                            <form action="{{ route('favorite.delete', [ 'shop_id' => $item['id'] ]) }}" method="POST">
                            @csrf
                                <input type="hidden" name="shop_id" value="{{ $item->id }}">
                                <button tupe="submit" class="heart"></button>
                            </form>
                        @endif
                    @endforeach
                @else
                    <form action="{{ route('favorite.add', [ 'shop_id' => $item['id'] ]) }}" method="POST">
                    @csrf
                        <input type="hidden" name="shop_id" value="{{ $item->id }}">
                        <button tupe="submit" class="heart gray"></button>
                    </form>
                @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- 店舗カード終わり -->

<script>
    $(function(){
        $("#submit_area").change(function(){
            $("#form").submit();
        });
        $("#submit_genre").change(function(){
            $("#form").submit();
        });
    });
</script>
@endsection

