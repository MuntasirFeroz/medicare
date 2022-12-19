@extends('backend.master')
@section('title', ' | Ambulance')
@section('ambulances','active') @section('ambulances-show','show') @section('ambulances-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'ambulance.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-ambulance"></i></span> Add New Ambulance</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Ambulance Type</label>
                        <select class="form-control selectpicker response" id="type" name="type" data-response="department" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Type</option>
                            <option value="car">Car Ambulance</option>
                            <option value="air">Air Ambulance</option>  
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="registration_no">Ambulance name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="registration_no">Registration No</label>
                        <input type="text" class="form-control" id="registration_no" name="registration_no" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Driver Name</label>
                        <input type="text" class="form-control" id="driver" name="driver" placeholder="Enter Driver Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Driver Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Driver Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Cost Per Hour</label>
                        <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter Cost" required>
                    </div>
                </div>
            </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi  mdi-ambulance"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
    <br><br><br>

@endsection
