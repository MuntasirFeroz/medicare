<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Ambulance;

class AmbulanceController extends Controller
{
    public function index()
    {       
        $ambulances=Ambulance::orderBy('id','DESC')->paginate(10);
        return view('backend.ambulance.index',compact('ambulances'));
    }

    public function create()
    {
        return view('backend.ambulance.create');
    }

    public function store(Request $request)
    {
        Ambulance::create([
            'name' => $request->name,
            'type' => $request->type,
            'registration_no'=>$request->registration_no,
            'driver'=>$request->driver,
            'driver_phone'=>$request->phone,
            'cost'=>$request->cost
        ]);
        Session::flash('success','Ambulance Created Successfully');
        return redirect()->route('backend.ambulance.index');
    }

    public function show($id)
    {
        $show=Ambulance::find($id);
        return view('backend.ambulance.show',compact('show'));
    }

    public function edit($id)
    {
        $edit=Ambulance::find($id);
        return view('backend.ambulance.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update=Ambulance::find($id);
       
        $update->update([
            'name' => $request->name,
            'type' => $request->type,
            'registration_no'=>$request->registration_no,
            'driver'=>$request->driver,
            'driver_phone'=>$request->phone,
            'cost'=>$request->cost
        ]);
        Session::flash('success','Ambulance Updated Successfully');
        return redirect()->route('backend.ambulance.index');
    }

    public function destroy($id)
    {   
        $delete=Ambulance::find($id);
        $delete->delete();
        Session::flash('success','Ambulance Deleted Successfully');
        return redirect()->route('backend.ambulance.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $ambulances=Ambulance::where('driver',$request->search)
                ->orWhere('driver_phone',$request->search)
                ->orWhere('registration_no',$request->search)
                ->paginate(10);
        }
        else{
            $ambulances=Ambulance::orderBy('id','DESC')->paginate(10);
        }
        return view('backend.ambulance.index',compact('ambulances'));

    }
    public function available($id){
        
        $update=Ambulance::find($id);
        if($update->dispatched == 0){
        
            $update->update([
                'dispatched' => 1
            ]);
            Session::flash('success','Ambulance is Dispatched');
        }
        else{
            $update->update([
                'dispatched' => 0
            ]);
            Session::flash('success','Ambulance Have Returned');
        }
       
        return redirect()->back();
    }

    public function ambulanceFind($type){
        $ambulance_availables=Ambulance::where('type',$type)
            ->where('dispatched',0)
            ->orderBy('id','DESC')
            ->get();
        return response()->json($ambulance_availables);
    }

}
