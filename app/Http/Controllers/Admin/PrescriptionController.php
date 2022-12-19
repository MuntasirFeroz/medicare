<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Appointment;
use App\Prescription;
use App\Patient;
use App\Department;
use App\Doctor;
use App\User;
class PrescriptionController extends Controller
{
    
    public function index()
    {
       
        $departments=Department::orderBy('id','DESC')->get();
        $doctors=Doctor::orderBy('id','DESC')->get();
        $prescriptions=Prescription::orderBy('id','DESC')->paginate(10);
        return view('backend.prescription.index',compact('departments','doctors','prescriptions'));
    }

    public function create()
    {
        // $departments=Department::orderBy('id','DESC')->get();
        // $doctors=Doctor::orderBy('id','DESC')->get();

        // return view('backend.prescription.create',compact('departments','doctor'));
    }
    public function addPrescription($appointment_id)
    {
        $appointment=Appointment::find($appointment_id);
        $patient=Patient::where('phone',$appointment->phone)
            ->orWhere('email',$appointment->email)
            ->distinct()
            ->get();
        $departments=Department::orderBy('id','DESC')->get();
        $doctors=Doctor::orderBy('id','DESC')->get();

        return view('backend.prescription.create',compact('departments','doctors','patient','appointment'));
    }

    public function store(Request $request)
    {
    //    dd($request->all());
        $prescription=Prescription::create([
            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor,
            'department_id' => $request->department,
            'appointment_id'=>$request->appointment_id,
            'appointment_date'=>$request->date,
            'diagnosis'=>$request->diagnosis
        ]);

        $appointment=Appointment::find($request->appointment_id);
        $appointment->update([
            'prescription_id'=>$prescription->id,
            'completed'=>1
        ]);

        Session::flash('success','Prescription Created Successfully');
        return redirect()->route('backend.appointment.index');
        // return redirect()->back();
    }

    public function show($id)
    {
        //id = Prescription id
        $show=Prescription::find($id);
        $patient=Patient::find($show->patient_id);
        $doctor_name=Doctor::find($show->doctor_id)->name;
        $department_name=Department::find($show->department_id)->department_name;
        return view('backend.prescription.show',compact('show','patient','doctor_name','department_name'));
    }

    public function showPrescription($apointment_id)
    {
        
        $apointment=Appointment::find($apointment_id);
        $show=Prescription::find($apointment->prescription_id);
        $patient=Patient::find($show->patient_id);
        $doctor_name=Doctor::find($show->doctor_id)->name;
        $department_name=Department::find($show->department_id)->department_name;
        return view('backend.prescription.show',compact('show','patient','doctor_name','department_name'));
    }

    public function edit($id)
    {
        // $departments=Department::orderBy('id','DESC')->get();
        // $edit=Appointment::find($id);
        // $doctors=Doctor::where('department_id',$edit->department_id)->orderBy('id','DESC')->get();
        // return view('backend.prescription.edit',compact('edit','departments','doctors'));
    }

    public function update(Request $request, $id)
    {
        // $update=Appointment::find($id);
        // $doctor_id=Doctor::find($request->doctor_name)->user_id;
        // $update->update([
        //     'department_id' => $request->department,
        //     'doctor_id'=>$doctor_id,
        //     'patient_name'=>$request->patient,
        //     'phone'=>$request->phone,
        //     'email'=>$request->email,
        //     'appointment_date'=>$request->date,
        //     'appointment_time'=>$request->time,
        //     'message'=>$request->message
        // ]);
        // Session::flash('success','Appointment Updated Successfully');
        // return redirect()->route('backend.prescription.index');
    }

    public function destroy($id)
    {
        Session::flash('success','Appointment Deleted Successfully');
        return redirect()->route('backend.prescription.index');
    }

    public function search(Request $request)
    {
        // // dd($request->all());
        // if(!empty($request->search))
        // {
        //     $appointments=appointment::where('patient_name',$request->search)
        //         ->orWhere('phone',$request->search)
        //         ->orWhere('email',$request->search)
        //         ->paginate(10);
        
        // }
        // else{
        //     $appointments=Appointment::orderBy('id','DESC')->paginate(10);
        // }
        // $all_departments=Department::orderBy('id','DESC')->get();
        // $doctors=Doctor::orderBy('id','DESC')->get();

        // return view('backend.doctor.index',compact('appointments','all_departments','doctors'));

    }
}
