<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Consultation;
use App\Doctor;
use App\Department;
use App\Schedule;
use App\User;

class ConsultationController extends Controller
{
   
    public function index()
    {
        $doctors=Doctor::orderBy('id','DESC')->get();
        return view('frontend.doctor',compact('doctors'));
    }

   
    public function create()
    {
        $departments=Department::orderBy('id','DESC')->get();
        return view('frontend.consultation',compact('departments'));
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        Consultation::create([
            'department_id' => $request->department,
            'doctor_id'=>$request->doctor_name,
            'schedule_id'=>$request->schedule_id,
            'schedule_no'=>$request->schedule,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'consultation_date'=>$request->date
        ]);
        Session::flash('success','Consultation Created Successfully');
        return redirect()->route('frontend.confirmation',4);
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
    public function getSchedule($doctor_id)
    {
        $doctor=Doctor::find($doctor_id);
        $schedules=Schedule::where('user_id', $doctor->user_id)->get();
        $schedule=$schedules[0];
        $schedule['day'] = explode(',',str_replace(str_split('[]""'),'',$schedule->day));
        $schedule['start_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->start_time));
        $schedule['end_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->end_time));

        return response()->json($schedule);
    }
}
