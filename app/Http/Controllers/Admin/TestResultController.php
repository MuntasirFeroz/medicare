<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\TestResult;
use App\Test;
use App\Patient;
use App\User;

class TestResultController extends Controller
{
    public function index()
    {     
        $tests=Test::orderBy('id','DESC')->get();

        if(Auth::user()->role == 'patient')
        {
            $user=User::find(Auth::user()->id);
            $test_results=TestResult::where('phone',$user->phone)
                ->orWhere('email',$user->phone)
                ->orderBy('id','DESC')->paginate(10);
            return view('backend.test_result.index',compact('test_results','tests'));
        }
        
        $test_results=TestResult::orderBy('id','DESC')->paginate(10);
        return view('backend.test_result.index',compact('test_results','tests'));
    }

    public function create()
    {
        $tests=Test::orderBy('id','DESC')->get();
        return view('backend.test_result.create',compact('tests'));
    }

    public function store(Request $request)
    {
       
        TestResult::create([
            'test_id'=>$request->test_id,
            'patient_name'=>$request->patient_name,
            'age'=>$request->age,
            'sex'=>$request->sex,
            'test_date'=>$request->test_date,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        Session::flash('success','TestResult Created Successfully');
        return redirect()->route('backend.test_result.index');
    }

    public function show($id)
    {
        $show=TestResult::find($id);
        return view('backend.test_result.show',compact('show'));
    }

    public function edit($id)
    {
        $tests=Test::orderBy('id','DESC')->get();
        $edit=TestResult::find($id);
        // dd($edit);
        return view('backend.test_result.edit',compact('edit','tests'));
    }

    public function update(Request $request, $id)
    {
        $update=TestResult::find($id);
        $update->update([
            'test_id'=>$request->test_id,
            'patient_name'=>$request->patient_name,
            'age'=>$request->age,
            'sex'=>$request->sex,
            'test_date'=>$request->test_date,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'result'=>$request->result,
            'completed'=>1
        ]);
        Session::flash('success','TestResult Updated Successfully');
        return redirect()->route('backend.test_result.index');
    }

    public function destroy($id)
    {
        $delete=TestResult::find($id)->delete();
        Session::flash('success','TestResult Deleted Successfully');
        return redirect()->route('backend.test_result.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if(!empty($request->search))
        {
            $test_results=TestResult::where('patient_name',$request->search)
                ->orWhere('phone',$request->search)
                ->orWhere('email',$request->search)
                ->paginate(10);
        
        }
        else{
            $test_results=TestResult::orderBy('id','DESC')->paginate(10);
        }
        
        $tests=Test::orderBy('id','DESC')->get();
        return view('backend.test_result.index',compact('test_results','tests'));

    }
}
