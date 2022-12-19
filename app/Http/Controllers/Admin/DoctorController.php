<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Doctor;
use App\Department;
use App\User;

use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
   
    public function index()
    {
        $doctors=Doctor::orderBy('id','DESC')->paginate(10);
        $all_departments=Department::orderBy('id','DESC')->get();
        return view('backend.doctor.index',compact('doctors','all_departments'));
    }

    
    public function create()
    {
        $departments=Department::orderBy('id','DESC')->get();
        return view('backend.doctor.create',compact('departments'));
    }

    public function store(Request $request)
    {
        //have to input values in both doctor and user table
       // dd($request->all());
        $request->validate([
            'email' => 'unique:users',
            'password' => 'required|confirmed|',
        ]);
        $document = $request->file('image');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/BackEnd/images/user/',$document_name);
        $user=User::create([
            'name' => $request->doctor_name,
            'role'=>$request->role,
            'image'=>$document_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'password' => bcrypt($request->password)
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'department_id' => $request->department,
            'name' => $request->doctor_name,
            'title'  => $request->title,
            'email'  => $request->email,
            'salary'  => $request->salary
        ]);

        Session::flash('success','Doctor Created Successfully');
        return redirect()->route('backend.doctor.index');
    }

    public function show($id)
    {
        //try to fetch doctor information by merging Doctors table & User Table
        $show=Doctor::find($id);
        $user=User::find($show->user_id);
        
        $show->image = $user->image;
        $show->phone = $user->phone;
        $show->address = $user->address;

        return view('backend.doctor.show', compact('show'));
    }

    public function edit($id)
    {
        $edit=Doctor::find($id);
        $user=User::find($edit->user_id);
        
        $edit->image = $user->image;
        $edit->phone = $user->phone;
        $edit->address = $user->address;

        $departments=Department::orderBy('id','DESC')->get();

        return view('backend.doctor.edit', compact('edit','departments'));
    }

    public function update(Request $request, $id)
    {
        $doctor_update=Doctor::find($id);

        $request->validate([
            'email' => 'unique:users,email,'.$doctor_update->user_id,
            'password' => 'confirmed'
        ]);
        $update = User::find($doctor_update->user_id);
        $d = User::find($doctor_update->user_id);
        if(!empty($request->file('image'))) {
            if (!empty($d->image)) {
                unlink('assets/BackEnd/images/user/' . $d->image);
            }
            $document = $request->file('image');
            $document_name = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path() . '/assets/BackEnd/images/user/', $document_name);
            $update->update([
                'name' => $request->doctor_name,
                'role'=>$request->role,
                'image'=>$document_name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email,
            ]);

            $doctor_update->update([
                'department_id' => $request->department,
                'name' => $request->doctor_name,
                'title'  => $request->title,
                'email'  => $request->email,
                'salary'  => $request->salary
            ]);
        }
        else{
            $update->update([
                'name' => $request->doctor_name,
                'role'=>$request->role,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email,
            ]);

            $doctor_update->update([
                'department_id' => $request->department,
                'name' => $request->doctor_name,
                'title'  => $request->title,
                'email'  => $request->email,
                'salary'  => $request->salary
            ]);
        }
        if(!empty($request->password)){
            $update->update([
                'password' => bcrypt($request->password),
            ]);
        }

        if(Auth::user()->role == 'doctor'){
            $show=Doctor::where('user_id',Auth::user()->id)->get();
            $id=$show[0]->id;
            Session::flash('success','Account Updated Successfully');
            return redirect()->route('doctor.show',$id);
        }

        Session::flash('success','Doctor Updated Successfully');
        return redirect()->route('backend.doctor.index');
    }

    public function destroy($id)
    {
        $doctor_delete=Doctor::find($id);

        $delete = User::find($doctor_delete->user_id);
        if(!empty($delete->image)){
            unlink('assets/BackEnd/images/user/'.$delete->image);
        }
        $delete->delete();
        Session::flash('success','Doctor Deleted Successfully');
        return redirect()->route('backend.doctor.index');
    }
    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $department=Department::where('department_name',$request->search)
                ->get();
            $doctors=Doctor::where('department_id',$department[0]->id)
                ->orWhere('name',$request->search)
                ->paginate(10);
        }
        else{
            $doctors=Doctor::orderBy('id','DESC')->paginate(10);
        }
        $all_departments=Department::orderBy('id','DESC')->get();

        return view('backend.doctor.index',compact('doctors','all_departments'));

    }
}
