<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Doctor;
use App\Patient;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(20);
        return view('backend.user.index',compact('users'));
    }

    public function create()
    {
        return view('backend.user.create');
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
        User::create([
            'name' => $request->name,
            'role'=>$request->role,
            'image'=>$document_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'password' => bcrypt($request->password)
        ]);
        
        // if($request->role == 'doctor'){
        //     Doctor::create([
        //         'name' => $request->name,
        //         'role'=>$request->role,
        //         'image'=>$document_name,
        //         'phone'=>$request->phone,
        //         'address'=>$request->address,
        //         'email'=>$request->email,
        //         'password' => bcrypt($request->password)
        //     ]);
        // }

        // if($request->role == 'patient'){
        //     Patient::create([
        //         'name' => $request->name,
        //         'role'=>$request->role,
        //         'image'=>$document_name,
        //         'phone'=>$request->phone,
        //         'address'=>$request->address,
        //         'email'=>$request->email,
        //         'password' => bcrypt($request->password)
        //     ]);
        // }

        Session::flash('success','User Created Successfully');
        return redirect()->route('backend.user.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = User::find($id);
        return view('backend.user.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:users,email,'.$id,
            'password' => 'confirmed'
        ]);
        $update = User::find($id);
        $d = User::find($id);
        if(!empty($request->file('image'))) {
            if (!empty($d->image)) {
                unlink('assets/BackEnd/images/user/' . $d->image);
            }
            $document = $request->file('image');
            $document_name = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path() . '/assets/BackEnd/images/user/', $document_name);
            $update->update([
                'name' => $request->name,
                'role'=>$request->role,
                'image'=>$document_name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email,
            ]);
        }
        else{
            $update->update([
                'name' => $request->name,
                'role'=>$request->role,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'email'=>$request->email,
            ]);
        }
        if(!empty($request->password)){
            $update->update([
                'password' => bcrypt($request->password),
            ]);
        }
        Session::flash('success','User Updated Successfully');
        return redirect()->route('backend.user.index');
    }

    public function destroy($id)
    {
        $delete = User::find($id);
        if(!empty($delete->image)){
            unlink('assets/BackEnd/images/user/'.$delete->image);
        }
        $delete->delete();
        Session::flash('success','User Deleted Successfully');
        return redirect()->route('backend.user.index');
    }
}
