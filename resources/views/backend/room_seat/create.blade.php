@extends('backend.master')
@section('title', ' | Room')
@section('rooms','active') @section('rooms-show','show') @section('rooms-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'room.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-hotel"></i></span> Add New Room</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Accomodation</label>
                        <select class="form-control selectpicker response" id="accomodation_id" name="accomodation_id" data-response="accomodation" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Accomodation</option>
                            @forelse ($accomodations as $accomodation)
                                <option value="{{ $accomodation->id }}">{{ $accomodation->name }}</option>
                            @empty            
                            @endforelse
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="room_no">Floor No</label>
                        <input type="text" class="form-control" id="floor_no" name="floor_no" required>
                    </div>    

                    <div class="form-group">
                        <label for="room_no">Room No</label>
                        <input type="text" class="form-control" id="room_no" name="room_no" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_of_seat">Available Number of Seat</label>
                        <input type="text" class="form-control input_control" id="no_of_seat"  name="no_of_seat" data-input_control="no_of_seat" placeholder="Available Number of Seat" required>
                    </div>            
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi mdi-hotel"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
    <br><br><br>

@endsection
