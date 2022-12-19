<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\Accomodation;
use App\Seat;
use App\RoomBooking;

class RoomBookingController extends Controller
{
    public function index()
    {
        // $ambulances=Accomodations::orderBy('id','DESC')->get();
        if(Auth::user()->role == 'patient'){
            $bookings=RoomBooking::where('phone',Auth::user()->phone)
                ->orWhere('email',Auth::user()->email)
                ->orderBy('id','DESC')->paginate(10);
        }
        else
        {
            $bookings=RoomBooking::orderBy('id','DESC')->paginate(10);
        }
        $accomodations=Accomodation::orderBy('id','DESC')->get();
       
        return view('backend.room_booking.index',compact('bookings','accomodations'));
    }

    public function create()
    {
        $accomodations=Accomodation::orderBy('id','DESC')->get();
        return view('backend.room_booking.create',compact('accomodations'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->seat_id);
        $accomodation=Accomodation::find($request->accomodation_id);
        $seat=Seat::find($request->seat_id);
        $room=Room::find($request->room_id);
        RoomBooking::create([
            'accomodation_id'=>$request->accomodation_id,
            'room_id'=> $request->room_id,
            'seat_id'=> $request->seat_id,
            'room_no'=> $room->room_no,
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

        Session::flash('success','RoomBooking Created Successfully');
        return redirect()->route('backend.room_booking.index');
    }

    public function show($id)
    {
        $show=RoomBooking::find($id);
        return view('backend.room_booking.show',compact('show'));
    }

    public function edit($id)
    {
        $accomodations=Accomodation::orderBy('id','DESC')->get();
        $edit=RoomBooking::find($id);
        return view('backend.room_booking.edit',compact('edit','accomodations'));
    }

    public function update(Request $request, $id)
    {
        $update=RoomBooking::find($id);
        $accomodation=Accomodation::find($request->accomodation_id);
        $seat=Seat::find($request->seat_id);
        $room=Room::find($request->room_id);
        $update->update([
            'accomodation_id'=>$request->accomodation_id,
            'room_id'=> $request->room_id,
            'seat_id'=> $request->seat_id,
            'room_no'=> $room->room_no,
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

        Session::flash('success','RoomBooking Updated Successfully');
        return redirect()->route('backend.room_booking.index');
    }

    public function destroy($id)
    {   
        $delete=RoomBooking::find($id);
        $delete->delete();
        Session::flash('success','RoomBooking Deleted Successfully');
        return redirect()->route('backend.room_booking.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            
            $bookings=RoomBooking::where('patient',$request->search)
                ->orWhere('phone',$request->search)
                ->orWhere('email',$request->search)
                ->paginate(10);

        }
        else{
            
            if(Auth::user()->role == 'patient'){
                $bookings=RoomBooking::where('phone',Auth::user()->phone)
                    ->orWhere('email',Auth::user()->email)
                    ->orderBy('id','DESC')->paginate(10);
            }
            else
            {
                $bookings=RoomBooking::orderBy('id','DESC')->paginate(10);
            }

            
        }
        // $ambulances=Accomodations::orderBy('id','DESC')->get();

        return view('backend.room_booking.index',compact('bookings'));

    }
    public function availableRoomFind($accomodation_id){
        $room_availables=Seat::where('accomodation_id',$accomodation_id)
            ->where('occupied',0)
            ->where('booked',0)
            ->distinct()
            ->orderBy('id','DESC')
            ->get();
        return response()->json($room_availables);
    }
    public function availableSeatFind($room_id){
        $seat_availables=Seat::where('room_id',$room_id)
            ->where('occupied',0)
            ->where('booked',0)
            ->orderBy('id','DESC')
            ->get();
        return response()->json($seat_availables);
    }
    
}
