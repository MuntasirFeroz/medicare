<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Doctor;
use App\Deapartment;
use App\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('frontend.appointment');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $doctor=Doctor::find($request->doctor_name);
        Appointment::create([
            'department_id' => $request->department,
            'doctor_id'=>$doctor->id,
            'patient_name'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'appointment_date'=>$request->date,
            'appointment_time'=>$request->time,
            'message'=>$request->message
        ]);
        Session::flash('success','Appointment Created Successfully');
        return redirect()->route('frontend.confirmation',1);
        return redirect()->back();
        
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

    public function findDoctor($department_id){
        $doctors=Doctor::where('department_id',$department_id)->orderBy('id','DESC')->get();
        return response()->json($doctors);
    }
}
