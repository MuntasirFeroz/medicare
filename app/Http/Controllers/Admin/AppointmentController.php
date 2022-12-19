<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Department;
use App\User;

class AppointmentController extends Controller
{
    public function index()
    {
        $all_departments=Department::orderBy('id','DESC')->get();
        $doctors=Doctor::orderBy('id','DESC')->get();

        $user=User::find(Auth::user()->id);

        if($user->role == 'doctor'){
            $user_doctor = Doctor::where('user_id',$user->id)->get();
            $appointments = Appointment::where('doctor_id',$user_doctor[0]->id)
            ->orderBy('id','DESC')->paginate(10);
        }
        elseif($user->role == 'patient'){
            $appointments=Appointment::where('phone',$user->phone)->where('email',$user->email)
            ->orderBy('id','DESC')->paginate(10);
        }
        else
        {       
            $appointments=Appointment::orderBy('id','DESC')->paginate(10);
        }
 
        return view('backend.appointment.index',compact('all_departments','doctors','appointments'));
    }

    public function create()
    {
        $departments=Department::orderBy('id','DESC')->get();
        return view('backend.appointment.create',compact('departments'));
    }

    public function store(Request $request)
    {
        // $doctor_id=Doctor::find($request->doctor_name)->id;
        Appointment::create([
            'department_id' => $request->department,
            'doctor_id'=>$request->doctor_name,
            'patient_name'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'appointment_date'=>$request->date,
            'appointment_time'=>$request->time,
            'message'=>$request->message
        ]);
        Session::flash('success','Appointment Created Successfully');
        return redirect()->route('backend.appointment.index');
    }

    public function show($id)
    {
        $show=Appointment::find($id);
        return view('backend.appointment.show',compact('show'));
    }

    public function edit($id)
    {
        $departments=Department::orderBy('id','DESC')->get();
        $edit=Appointment::find($id);
        $doctors=Doctor::where('department_id',$edit->department_id)->orderBy('id','DESC')->get();
        return view('backend.appointment.edit',compact('edit','departments','doctors'));
    }

    public function update(Request $request, $id)
    {
        $update=Appointment::find($id);
        // $doctor_id=Doctor::find($request->doctor_name)->user_id;
        $update->update([
            'department_id' => $request->department,
            'doctor_id'=>$request->doctor_name,
            'patient_name'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'appointment_date'=>$request->date,
            'appointment_time'=>$request->time,
            'message'=>$request->message
        ]);
        Session::flash('success','Appointment Updated Successfully');
        return redirect()->route('backend.appointment.index');
    }

    public function destroy($id)
    {
        Session::flash('success','Appointment Deleted Successfully');
        return redirect()->route('backend.appointment.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $appointments=appointment::where('patient_name',$request->search)
                ->orWhere('phone',$request->search)
                ->orWhere('email',$request->search)
                ->paginate(10);
        
        }
        else{
            $appointments=Appointment::orderBy('id','DESC')->paginate(10);
        }
        $all_departments=Department::orderBy('id','DESC')->get();
        $doctors=Doctor::orderBy('id','DESC')->get();

        return view('backend.doctor.index',compact('appointments','all_departments','doctors'));

    }

    public function status($id,$value){
        
        $update=Appointment::find($id);
        if($value == 0){
        
            $update->update([
                'status' => 1
            ]);
            Session::flash('success','Appointment Status Accepted');
        }
        else{
            $update->update([
                'status' => 0
            ]);
            Session::flash('success','Appointment Status Pending');
        }
       
        return redirect()->back();
    }

    public function myAppointments()
    {
        $all_departments=Department::orderBy('id','DESC')->get();
        $doctors=Doctor::orderBy('id','DESC')->get();

        $user=User::find(Auth::user()->id);

        if($user->role == 'doctor'){
            $user_doctor = Doctor::where('user_id',$user->id)->get();
            $appointments = Appointment::where('doctor_id',$user_doctor[0]->id)
            ->orderBy('id','DESC')->paginate(10);
        }
        elseif($user->role == 'patient'){
            $appointments=Appointment::where('phone',$user->phone)->where('email',$user->email)
            ->orderBy('id','DESC')->paginate(10);
        }
    
        return view('backend.appointment.myappointment',compact('all_departments','doctors','appointments'));
    }

}   
