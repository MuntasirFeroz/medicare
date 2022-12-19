<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Test;

class TestController extends Controller
{
    public function index()
    {
        $tests=Test::orderBy('id','DESC')->paginate(10);
        return view('backend.test.index',compact('tests'));
    }

    public function create()
    {
        return view('backend.test.create');
    }

    public function store(Request $request)
    {
        
        Test::create([
            'test_name' => $request->test_name,
            'cost'=>$request->cost
        ]);
        Session::flash('success','Test Created Successfully');
        return redirect()->route('backend.test.index');
    }

    public function show($id)
    {
        $show=Test::find($id);
        return view('backend.test.show',compact('show'));
    }

    public function edit($id)
    {
        
        $edit=Test::find($id);
        
        return view('backend.test.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update=Test::find($id);
    
        $update->update([
            'test_name' => $request->test_name,
            'cost'=>$request->cost
        ]);
        Session::flash('success','Test Updated Successfully');
        return redirect()->route('backend.test.index');
    }

    public function destroy($id)
    {
        $delete=Test::find($id);
        $delete->delete();
        Session::flash('success','Test Deleted Successfully');
        return redirect()->route('backend.test.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $tests=Test::where('test_name',$request->search)
                ->paginate(10);
        
        }
        else{
            $tests=Test::orderBy('id','DESC')->paginate(10);
        }
       
        return view('backend.test.index',compact('tests'));

    }

}
