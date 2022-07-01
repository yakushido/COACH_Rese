<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shops = Shop::all();
        $owners = Owner::all();
        return view('admin', compact('shops', 'owners'));
    }

    public function add(Request $request)
    {
        Owner::create([
            'name' => $request->owner_name,
            'shop_id' => $request->shop_name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password)
        ]);
        return redirect('/admin');
    }

}
