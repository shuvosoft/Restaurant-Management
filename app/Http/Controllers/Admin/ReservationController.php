<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\Reservationconfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index(){

        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();

        Notification::route('mail',$reservation->email )
            ->notify(new Reservationconfirmed());

//        Notification::route('mail', $reservation->email)
//
//            ->notify(new Reservationconfirmed());


        return redirect()->back()->with('successMsg','Reservation Successfully Confirmed');
    }

    public  function destory($id){

        Reservation::find($id)->delete();
        return redirect()->back()->with('successMsg','Reservation Successfully Deleted');
    }
}
