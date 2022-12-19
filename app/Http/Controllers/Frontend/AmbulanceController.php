<?php

namespace App\Http\Controllers\Frontend;

use App\Ambulance;
use App\AmbulanceBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AmbulanceController extends Controller
{
    
    public function index()
    {
        return view('frontend.ambulance-category');
    }

    
    public function create()
    {
        return view('frontend.ambulance');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        AmbulanceBooking::create([
            'ambulance_id' => $request->ambulance_id,
            'booking_date'=>$request->date,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address
        ]);
        Session::flash('success','AmbulanceBooking Created Successfully');
        return redirect()->route('frontend.confirmation',3);
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
    public function ambulanceFind($type){
        $ambulance_availables=Ambulance::where('type',$type)
            ->where('dispatched',0)
            ->orderBy('id','DESC')
            ->get();
        return response()->json($ambulance_availables);
    }
}
