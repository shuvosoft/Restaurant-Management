<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
  public function reserve( Request $request){

      $this->validate($request,[
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required|email',
          'date_and_time' => 'required'
      ]);
      $reservation = new  Reservation();
      $reservation->name = $request->name;
      $reservation->phone = $request->phone;
      $reservation->email = $request->email;
      $reservation->date_and_time = $request->date_and_time;
      $reservation->message = $request->message;
      $reservation->status = false;
      $reservation->save();
//      return redirect()->route('welcome')->with('successMsg','Category Successfully Saved');
      return redirect()->back()->with('successMsg','Reservation Successfully Saved');
  }
}
