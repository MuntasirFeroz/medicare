<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\AmbulanceBooking;
use App\Ambulance;

class AmbulanceBookingController extends Controller
{
    public function index()
    {
        // $ambulances=Ambulances::orderBy('id','DESC')->get();
        if(Auth::user()->role == 'patient'){
            $bookings=AmbulanceBooking::where('phone',Auth::user()->phone)
                ->orWhere('email',Auth::user()->email)
                ->orderBy('id','DESC')->paginate(10);
        }
        else
        {
            $bookings=AmbulanceBooking::orderBy('id','DESC')->paginate(10);
        }
       
        return view('backend.ambulance_booking.index',compact('bookings'));
    }

    public function create()
    {
        $ambulances=Ambulance::where('dispatched',0)
            ->orderBy('id','DESC')->get();
        return view('backend.ambulance_booking.create',compact('ambulances'));
    }

    public function store(Request $request)
    {
        
        AmbulanceBooking::create([
            'ambulance_id' => $request->ambulance_id,
            'booking_date'=>$request->date,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address
        ]);
        Session::flash('success','AmbulanceBooking Created Successfully');
        return redirect()->route('backend.ambulance_booking.index');
    }

    public function show($id)
    {
        $show=AmbulanceBooking::find($id);
        return view('backend.ambulance_booking.show',compact('show'));
    }

    public function edit($id)
    {
        $ambulances=Ambulance::orderBy('id','DESC')->get();
        $edit=AmbulanceBooking::find($id);
        return view('backend.ambulance_booking.edit',compact('edit','ambulances'));
    }

    public function update(Request $request, $id)
    {
        $update=AmbulanceBooking::find($id);
        $update->update([
            'ambulance_id' => $request->ambulance_id,
            'booking_date'=>$request->date,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address
        ]);
        Session::flash('success','AmbulanceBooking Updated Successfully');
        return redirect()->route('backend.ambulance_booking.index');
    }

    public function destroy($id)
    {   
        $delete=AmbulanceBooking::find($id);
        $delete->delete();
        Session::flash('success','AmbulanceBooking Deleted Successfully');
        return redirect()->route('backend.ambulance_booking.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            
            $bookings=AmbulanceBooking::where('patient',$request->search)
                ->orWhere('phone',$request->search)
                ->orWhere('email',$request->search)
                ->paginate(10);

        }
        else{
            
            if(Auth::user()->role == 'patient'){
                $bookings=AmbulanceBooking::where('phone',Auth::user()->phone)
                    ->orWhere('email',Auth::user()->email)
                    ->orderBy('id','DESC')->paginate(10);
            }
            else
            {
                $bookings=AmbulanceBooking::orderBy('id','DESC')->paginate(10);
            }

            
        }
        // $ambulances=Ambulances::orderBy('id','DESC')->get();

        return view('backend.ambulance_booking.index',compact('bookings'));

    }
}
