<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        Favorite::create([
            "user_id" => Auth::id(),
            "shop_id" => $request->shop_id,
        ]);

        return redirect()->back();
    }
    public function delete($id)
    {
        $delete_item = Favorite::where('shop_id', $id)->where('user_id', Auth::id())->first();
        $delete_item->delete();

        return redirect()->back();
    }
}
