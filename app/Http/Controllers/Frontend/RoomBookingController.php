<?php

namespace App\Http\Controllers\Frontend;
use App\Room;
use App\Seat;
use App\RoomBooking;

use App\Accomodation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RoomBookingController extends Controller
{
   
    public function index()
    {
        return view();
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //  dd($request->all());
        $accomodation=Accomodation::find($request->accomodation);
        $seat=Seat::find($request->seat_id);
        $room=Room::where('room_no',$request->room_no)->get();
        RoomBooking::create([
            'accomodation_id'=>$request->accomodation,
            'room_id'=> $room[0]->id,
            'seat_id'=> $request->seat_id,
            'room_no'=> $request->room_no,
            'seat_no'=> $seat->seat_no,
            'cost'=> $accomodation->cost,
            'booking_date'=>$request->date,
            'entry_time' =>$request->time,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email
        ]);

        $seat_update=Seat::find($request->seat_id);
        $seat_update->update([
            'booked'=>1
        ]);

        Session::flash('success','Room is Booked Successfully');
        return redirect()->route('frontend.confirmation',2);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }
 
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
    public function availableRoomFind($accomodation_id){
        
        $room_availables=Seat::select('room_no')->where('accomodation_id',$accomodation_id)
            ->where('occupied',0)
            ->where('booked',0)
            ->distinct()
            ->get();

        return response()->json($room_availables);
    }
    public function availableSeatFind($room_no){
        $seat_availables=Seat::where('room_no',$room_no)
            ->where('occupied',0)
            ->where('booked',0)
            ->orderBy('id','DESC')
            ->get();
        return response()->json($seat_availables);
    }
}
