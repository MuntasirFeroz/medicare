<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Department;
use App\Doctor;
class DepartmentController extends Controller
{
    
    public function index()
    {
        $departments=Department::orderBy('id','DESC')->paginate(20);
        return view('backend.department.index',compact('departments'));
    }

    
    public function create()
    {
        return view('backend.department.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'department_name' => 'unique:department_name',
        //     'image' => 'required',
        // ]);
        $document = $request->file('image');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/FrontEnd/images/department/',$document_name);
        Department::create([
            'department_name' => $request->department_name,
            'sub_title'=>$request->sub_title,
            'image'=>$document_name,
            'content'=>$request->content,
            'service_features'=>$request->service_features
        ]);
        Session::flash('success','Department Created Successfully');
        return redirect()->route('backend.department.index');
    }

    public function show($id)
    {
        $show=Department::find($id);
        return view('backend.department.show',compact('show'));
    }

    public function edit($id)
    {
        $edit=Department::find($id);
        return view('backend.department.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'department_name' => 'unique:department_name'
        // ]);
        $update = Department::find($id);
        $d = Department::find($id);
        if(!empty($request->file('image'))) {
            if (!empty($d->image)) {
                unlink('assets/FrontEnd/images/department/' . $d->image);
            }
            $document = $request->file('image');
            $document_name = rand() . '.' . $document->getClientOriginalExtension();
            $document->move(public_path() . '/assets/FrontEnd/images/department/', $document_name);
            $update->update([
                'department_name' => $request->department_name,
                'sub_title'=>$request->sub_title,
                'image'=>$document_name,
                'content'=>$request->content,
                'service_features'=>$request->service_features
            ]);
        }
        else{
            $update->update([
                'department_name' => $request->department_name,
                'sub_title'=>$request->sub_title,
                'content'=>$request->content,
                'service_features'=>$request->service_features
            ]);
        }
        Session::flash('success','Department Updated Successfully');
        return redirect()->route('backend.department.index');
    }

    public function destroy($id)
    {
        $delete = Department::find($id);
        if(!empty($delete->image)){
            unlink('assets/FrontEnd/images/department/'.$delete->image);
        }
        $delete->delete();
        Session::flash('success','Department Deleted Successfully');
        return redirect()->route('backend.department.index');
    }
    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $departments=Department::where('department_name',$request->search)
                ->paginate(20);
        }
        else{
            $departments=Department::orderBy('id','DESC')->paginate(20);
        }

        return view('backend.department.index',compact('departments'));

    }

    public function findDoctor($department_id){
        $doctors=Doctor::where('department_id',$department_id)->orderBy('id','DESC')->get();
        return response()->json($doctors);
    }
}
