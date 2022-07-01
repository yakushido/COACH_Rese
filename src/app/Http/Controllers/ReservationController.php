<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{

    public function add(ReservationRequest $request)
    {
        Reservation::create([
            'number' => $request->number,
            'date' => $request->date,
            'time' => $request->time,
            'shop_id' => $request->shop_id,
            'user_id' => Auth::id()
        ]);

        return redirect('/done');
    }

    public function done()
    {
        return view('done');
    }

    public function delete($id)
    {
        Reservation::where('id', $id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {
        $items = Reservation::where('id',$id)->get();
        return view('update', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $upadate_data = Reservation::find($id);
        $upadate_data->date = $request->input('date');
        $upadate_data->time = $request->input('time');
        $upadate_data->number = $request->input('number');
        $upadate_data->save();
        return view('update_done');

    }
}
