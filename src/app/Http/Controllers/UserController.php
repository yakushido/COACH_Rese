<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;

class UserController extends Controller
{
    public function home()
    {
        $items = Reservation::where('user_id', Auth::id())->get();
        $favorites = Favorite::where('user_id', Auth::id())->get();

        return view('home', compact('items','favorites'));
    }
}
