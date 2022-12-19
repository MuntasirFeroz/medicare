<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Doctor;
use App\Department;
use App\User;
class PatientController extends Controller
{
    
    public function index()
    {
        $patients=Patient::orderBy('id','DESC')->paginate(10);
        return view('backend.patient.index',compact('patients'));
    }

    
    public function create()
    {
        return view('backend.patient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
            'password' => 'required|confirmed|',
        ]);
        $document = $request->file('image');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/BackEnd/images/user/',$document_name);
        $user=User::create([
            'name' => $request->name,
            'role'=>'patient',
            'image'=>$document_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'password' => bcrypt($request->password)
        ]);

        Patient::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'age' => $request->age,
            'sex' => $request->sex,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email
        ]);

        Session::flash('success','Patient Created Successfully');
        return redirect()->route('backend.patient.index');
    }

    public function show($id)
    {
        $show=Patient::find($id);
        
        return view('backend.patient.show', compact('show'));
    }

    public function edit($id)
    {
        $edit=Patient::find($id);
        

        return view('backend.patient.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $patient_update=Doctor::find($id);

        $request->validate([
            'email' => 'unique:users,email,'.$patient_update->user_id,
            'password' => 'confirmed'
        ]);
        $update = User::find($patient_update->user_id);
        $d = User::find($patient_update->user_id);
        if(!empty($request->file('image'))) {
            if (!empty($d->image)) {
                unlink('assets/BackEnd/images/user/' . $d->image);
            }
            $document = $request->file('image');
            $document_name = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path() . '/assets/BackEnd/images/user/', $document_name);
            $update->update([
                'name' => $request->name,
                'image'=>$document_name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email,
                'password' => bcrypt($request->password)
            ]);

            $patient_update->update([
                'name' => $request->name,
                'phone'=>$request->phone,
                'age' => $request->age,
                'sex' => $request->sex,
                'address'=>$request->address,
                'email'=>$request->email
            ]);
        }
        else{
            $update->update([
                'name' => $request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email,
                'password' => bcrypt($request->password)
            ]);

            $patient_update->update([
                'name' => $request->name,
                'age' => $request->age,
                'sex' => $request->sex,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email
            ]);
        }
        if(!empty($request->password)){
            $update->update([
                'password' => bcrypt($request->password),
            ]);
        }

        if(Auth::user()->role == 'patient'){
            $show=Patient::where('user_id',Auth::user()->id)->get();
            $id=$show[0]->id;
            Session::flash('success','Account Updated Successfully');
            return redirect()->route('patient.show',$id);
        }

        Session::flash('success','Patient Updated Successfully');
        return redirect()->route('backend.patient.index');
    
    }

    public function destroy($id)
    {
        $patient_delete=Patient::find($id);

        $delete = User::find($patient_delete->user_id);
        if(!empty($delete->image)){
            unlink('assets/BackEnd/images/user/'.$delete->image);
        }
        $delete->delete();
        Session::flash('success','Patient Deleted Successfully');
        return redirect()->route('backend.patient.index');
    }
    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $patients=Patient::where('name',$request->search)
                ->orWhere('phone',$request->search)
                ->orWhere('email',$request->search)
                ->paginate(10);
        
        }
        else{
            $patients=Patient::orderBy('id','DESC')->paginate(10);
        }
        

        return view('backend.patient.index',compact('patients'));

    }
}
