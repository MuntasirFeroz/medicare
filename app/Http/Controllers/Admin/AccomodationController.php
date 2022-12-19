<?php

namespace App\Http\Controllers\Admin;

use App\Accomodation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccomodationController extends Controller
{
    public function index()
    {
        $accomodations=Accomodation::orderBy('id','DESC')->paginate(10);
        return view('backend.accomodation.index',compact('accomodations'));
    }

    public function create()
    {
        return view('backend.accomodation.create');
    }

    public function store(Request $request)
    {
        $document = $request->file('image');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/FrontEnd/images/accomodation/',$document_name);
        Accomodation::create([
            'name'=>$request->name,
            'image'=>$document_name,
            'cost'=>$request->cost,
            'details'=>$request->details
            
        ]);
        Session::flash('success','Accomodation Created Successfully');
        return redirect()->route('backend.accomodation.index');
    }

    public function show($id)
    {
        $show=Accomodation::find($id);
        return view('backend.accomodation.show',compact('show'));
    }

    public function edit($id)
    {
        
        $edit=Accomodation::find($id);

        return view('backend.accomodation.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update=Accomodation::find($id);
        $d = Accomodation::find($id);
        if(!empty($request->file('image'))) {
            if (!empty($d->image)) {
                unlink('assets/FrontEnd/images/accomodation/' . $d->image);
            }
            $document = $request->file('image');
            $document_name = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path() . '/assets/FrontEnd/images/accomodation/', $document_name);
            $update->update([
                'name'=>$request->name,
                'image'=>$document_name,
                'cost'=>$request->cost,
                'details'=>$request->details
            ]);
        }
        else{
            $update->update([
                'name'=>$request->name,
                'cost'=>$request->cost,
                'details'=>$request->details
            ]);
        }
        Session::flash('success','Accomodation Updated Successfully');
        return redirect()->route('backend.accomodation.index');
    }

    public function destroy($id)
    {   
        $delete=Accomodation::find($id);
        if(!empty($delete->image)){
            unlink('assets/FrontEnd/images/accomodation/'.$delete->image);
        }
        $delete->delete();
        Session::flash('success','Accomodation Deleted Successfully');
        return redirect()->route('backend.accomodation.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $accomodations=Accomodation::where('name',$request->search)
                ->orWhere('cost',$request->search)
                ->paginate(10);
        
        }
        else{
            $accomodations=Accomodation::orderBy('id','DESC')->paginate(10);
        }
       
        return view('backend.accomodation.index',compact('accomodations'));

    }
}
