<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    
    
    // 飲食店一覧表示
    public function shops()
    {
        $items = Shop::all();
        $areaLists = Area::all();
        $genreLists = Genre::all();
        if( Auth::check() ){
            $favorites = Favorite::where('user_id', Auth::id())->get();
            return view('shop',compact('items', 'areaLists', 'genreLists', 'favorites'));
        }else{
            return view('shop',compact('items', 'areaLists', 'genreLists'));
        }
    }

    // 検索機能
    public function search(Request $request)
    {
        $searchArea = $request->input('searchArea');
        $searchGenre = $request->input('searchGenre');
        $searchKeyWord = $request->input('searchKeyWord');

        $query = Shop::select('shops.id', 'shops.name', 'shops.detail', 'shops.picture', 'shops.area_id', 'shops.genre_id');
        $query->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id');

        if(!empty($searchArea)) {
            $items = $query->where('area_id', '=', $searchArea)->get();
        }
        if(!empty($searchGenre)) {
            $items = $query->where('genre_id', '=', $searchGenre)->get();
        }
        if(!empty($searchKeyWord)) {
            $items = $query->where('shops.name', 'LIKE', '%'.$searchKeyWord.'%')->get();
        }

        $areaLists = Area::all();
        $genreLists = Genre::all();

        return view('shop', compact('items', 'areaLists', 'genreLists'));
    }

    public function detail($shop_id)
    {
        $shop = Shop::find($shop_id);

        $items = Reservation::where('shop_id', $shop_id)->get();
        return view('detail', compact('shop', 'items'));
    }
}
