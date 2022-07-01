<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Owner;
use App\models\Shop;
use App\models\Reservation;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    public function index()
    {
        $myshop = Owner::where('id', Auth::id())->first();
        $reservations = Reservation::where('shop_id', $myshop['shop_id'])->get();
        return view('owner', compact('myshop','reservations'));
    }

    public function update(Request $request)
    {
        $myshop = Owner::where('id', Auth::id())->first();
        $upadate_data = Shop::where('id', $myshop['shop_id'])->first();
        $upadate_data->detail = $request->input('detail');
        $upadate_data->save();
        return redirect()->route('owner.index');
    }
}
