<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    
    public function index()
    {
        $user_id=Auth::user()->id;
        $schedules=Schedule::where('user_id',$user_id)->orderBy('id','DESC')->paginate(10);     
        return view('backend.schedule.index',compact('schedules'));

    }

    
    public function create()
    {
        return view('backend.schedule.create');
    }

    public function store(Request $request)
    {
        // dd( $request->all());
        Schedule::create([
            'user_id' => Auth::user()->id,
            'no_days' => $request->no_days,
            'day' => json_encode($request->day),
            'start_time' => json_encode($request->start_time), 
            'end_time' => json_encode($request->end_time)
        ]);
        Session::flash('success','Scehdule is created Successfully');
        return redirect()->route('backend.schedule.index');
    }

    public function show($id)
    {
        $show=Schedule::find($id);
        $show['day'] = explode(',',str_replace(str_split('[]""'),'',$show->day));
        $show['start_time'] = explode(',',str_replace(str_split('[]""'),'',$show->start_time));
        $show['end_time'] = explode(',',str_replace(str_split('[]""'),'',$show->end_time));
        return view('backend.schedule.show',compact('show'));
    }

    public function edit($id)
    {
        $edit=Schedule::find($id);
        $edit['day'] = explode(',',str_replace(str_split('[]""'),'',$edit->day));
        $edit['start_time'] = explode(',',str_replace(str_split('[]""'),'',$edit->start_time));
        $edit['end_time'] = explode(',',str_replace(str_split('[]""'),'',$edit->end_time));

        //  dd($edit->day[0]);
        return view('backend.schedule.edit',compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update=Schedule::find($id);
        $update->update([
            'user_id' => Auth::user()->id,
            'no_days' => $request->no_days,
            'day' => json_encode($request->day),
            'start_time' => json_encode($request->start_time), 
            'end_time' => json_encode($request->end_time)
        ]);
        Session::flash('success','Scehdule is Updated Successfully');
        return redirect()->route('backend.schedule.index');
    }

    public function destroy($id)
    {
        $delete=Schedule::find($id);
        Session::flash('success','Scehdule is deleted Successfully');
        return redirect()->route('backend.schedule.index');
    }
}
