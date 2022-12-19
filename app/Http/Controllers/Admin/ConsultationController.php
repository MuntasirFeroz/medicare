<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Consultation;
use App\Doctor;
use App\Department;
use App\Schedule;

class ConsultationController extends Controller
{
    
    public function index()
    {
        $doctor=Doctor::where('user_id',Auth::user()->id)->first();
        $consultations=Consultation::where('doctor_id',$doctor->id)->orderBy('id','DESC')->paginate(10);
       
        $schedule=Schedule::where('user_id',Auth::user()->id)->first();
        $schedule['day'] = explode(',',str_replace(str_split('[]""'),'',$schedule->day));
        $schedule['start_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->start_time));
        $schedule['end_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->end_time));
        
        return view('backend.consultation.index',compact('consultations','schedule'));
    }

    public function create()
    {
        $departments=Department::orderBy('id','DESC')->get();
        return view('backend.consultation.create',compact('departments'));
    }

    public function store(Request $request)
    {
        // $doctor_id=Doctor::find($request->doctor_name)->user_id;
        Consultation::create([
            'department_id' => $request->department,
            'doctor_id'=>$request->doctor_id,
            'schedule_id'=>$request->schedule_id,
            'schedule_no'=>$request->schedule_no,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'consultation_date'=>$request->date
        ]);
        Session::flash('success','Consultation Created Successfully');
        return redirect()->route('backend.consultation.index');
    }

    public function show($id)
    {
        $show=Consultation::find($id);
        return view('backend.consultation.show',compact('show'));
    }

    public function edit($id)
    {
        $departments=Department::orderBy('id','DESC')->get();
        $edit=Consultation::find($id);
        $doctors=Doctor::where('department_id',$edit->department_id)->orderBy('id','DESC')->get();
        return view('backend.consultation.edit',compact('edit','departments','doctors'));
    }

    public function update(Request $request, $id)
    {
        $update=Consultation::find($id);
        // $doctor_id=Doctor::find($request->doctor_name)->user_id;
        $update->update([
            'department_id' => $request->department,
            'doctor_id'=>$request->doctor_id,
            'schedule_id'=>$request->schedule_id,
            'schedule_no'=>$request->schedule_no,
            'patient'=>$request->patient,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'consultation_date'=>$request->date
        ]);
        Session::flash('success','Consultation Updated Successfully');
        return redirect()->route('backend.consultation.index');
    }

    public function destroy($id)
    {   
        $delete=Consultation::find($id);
        $delete->delete();
        Session::flash('success','Consultation Deleted Successfully');
        return redirect()->route('backend.consultation.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $doctor=Doctor::where('user_id',Auth::user()->id)->first();

        $schedule=Schedule::where('user_id',Auth::user()->id)->first();
        $schedule['day'] = explode(',',str_replace(str_split('[]""'),'',$schedule->day));
        $schedule['start_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->start_time));
        $schedule['end_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->end_time));

        if(!empty($request->search))
        {
            $Consultations=Consultation::where('doctor_id',$doctor->id)
                ->orwhere('patient_name',$request->search)
                ->orWhere('phone',$request->search)
                ->orWhere('email',$request->search)
                ->paginate(10);
        
        }
        else{
            $Consultations=Consultation::where('doctor_id',$doctor->id)->orderBy('id','DESC')->paginate(10);
        }
        // $all_departments=Department::orderBy('id','DESC')->get();
        // $doctors=Doctor::orderBy('id','DESC')->get();

        return view('backend.consultation.index',compact('consultations','schedule'));

    }
    public function status($id,$value){
        
        $update=Consultation::find($id);
        if($value == 0){
        
            $update->update([
                'status' => 1
            ]);
            Session::flash('success','Consultation Status Accepted');
        }
        else{
            $update->update([
                'status' => 0
            ]);
            Session::flash('success','Consultation Status Pending');
        }
       
        return redirect()->back();
    }
}
