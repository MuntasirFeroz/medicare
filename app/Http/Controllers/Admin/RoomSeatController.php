<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Room;
use App\Seat;
use App\Accomodation;

class RoomSeatController extends Controller
{
    public function index()
    {       
        $rooms=Room::orderBy('id','DESC')->paginate(10);
        $accomodations=Accomodation::orderBy('id','DESC')->get();
        return view('backend.room_seat.index',compact('rooms','accomodations'));
    }

    public function create()
    {
        $accomodations=Accomodation::orderBy('id','DESC')->get();
        return view('backend.room_seat.create',compact('accomodations'));
    }

    public function store(Request $request)
    {
        
        $room=Room::create([
            'accomodation_id' => $request->accomodation_id,
            'floor_no'=>$request->floor_no,
            'room_no'=>$request->room_no,
            'total_seat'=>$request->no_of_seat,
        ]);

        for($i=1 ; $i<= $request->no_of_seat; $i++)
        {
            Seat::create([
                'accomodation_id' => $request->accomodation_id,
                'room_id' => $room->id,
                'floor_no'=>$request->floor_no,
                'room_no'=>$request->room_no,
                'seat_no'=>$i
            ]);
        }
        Session::flash('success','Room Created Successfully');
        return redirect()->route('backend.room.index');
    }

    public function show($id)
    {
        $show=Seat::find($id);
        return view('backend.room_seat.show',compact('show'));
    }

    public function edit($id)
    {
        $edit=Room::find($id);
        $accomodations=Accomodation::orderBy('id','DESC')->get();
        return view('backend.room_seat.edit',compact('edit','accomodations'));
    }

    public function update(Request $request, $id)
    {
        $update=Room::find($id);

        if( $update->total_seat != $request->no_of_seat )
        {
            $deletes=Seat::where('room_id',$update->id)->get();
            foreach($deletes as $delete)
            {
                $delete->delete();
            }
           
            $update->update([
                'accomodation_id' => $request->accomodation_id,
                'floor_no'=>$request->floor_no,
                'room_no'=>$request->room_no,
                'total_seat'=>$request->no_of_seat
            ]);

            for($i=1 ; $i<= $request->no_of_seat; $i++)
             {
                Seat::create([
                    'accomodation_id' => $request->accomodation_id,
                    'room_id' => $update->id,
                    'floor_no'=>$request->floor_no,
                    'room_no'=>$request->room_no,
                    'seat_no'=>$i
                ]);
            }
        }
        else
        {
            $update->update([
                'accomodation_id' => $request->accomodation_id,
                'floor_no'=>$request->floor_no,
                'room_no'=>$request->room_no,
            ]);
            
            for($i=1 ; $i<= $request->no_of_seat; $i++)
             {
                $seat_update = Seat::where('room_id',$update->id)
                ->where('seat_no',$i)
                ->get();
                $seat_update[0] ->update([
                    'accomodation_id' => $request->accomodation_id,
                    'room_id' => $update->id,
                    'floor_no'=>$request->floor_no,
                    'room_no'=>$request->room_no,
                ]);
            }
        }
 
        Session::flash('success','Room Updated Successfully');
        return redirect()->route('backend.room.index');
    }

    public function destroy($id)
    {   //id=seat_id
        //deletes seats
        $delete=Seat::find($id);
        $room=Room::find($delete->room_id);
        $room->update([
            'total_seat'=>$room->total_seat - 1
        ]);
        $delete->delete();

        Session::flash('success','Seat Deleted Successfully');
        return redirect()->route('backend.room.index');
    }

    public function search(Request $request)
    {
        $accomodations=Accomodation::orderBy('id','DESC')->get();
        // dd($request->all());
        if(!empty($request->search))
        {
            $rooms=Room::where('room_no',$request->search)
                ->orderBy('id','DESC')
                ->paginate(10);
        
        }
        else{
            $rooms=Room::orderBy('id','DESC')->paginate(10);
        }
        
        return view('backend.room_seat.index',compact('accomodations','rooms'));

    }
    public function changeVacancy($id)
    {
        $seat=Seat::find($id);
        if($seat->occupied == 0)
        {
            $seat->update([
                'occupied'=>1
            ]);
            Session::flash('success','Seat Occupied Successfully');
        }
        else
        {
            $seat->update([
                'occupied'=>0
            ]);
            Session::flash('success','Seat Vacant Successfully');
        }

        return redirect()->back();
    }
}
