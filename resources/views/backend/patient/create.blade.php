@extends('backend.master')
@section('title', ' | patient')
@section('patients','active') @section('patients-show','show') @section('patients-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'patient.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Patient</h3></div>
            <div class="card">
                <div class="card-body">
            <div class="form-group">
                <label for="name">Patient Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Patient Name" required>
            </div>
            <div class="form-group">
                <label for="select_role" >Upload Photo size(380 X 380)px</label>
                <input type='file' class="form-control" id="imageUpload" name="image" accept=".png, .jpg, .jpeg"/>
            </div>
            
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Enter Patient Age" required>
            </div>

            <div class="form-group">
                <label for="name">Sex</label>
                <select class="form-control selectpicker response" id="sex" name="sex" data-response="sex" required>
                    <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose Sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Patient Email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Patient Phone Number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="role" name="role" value="patient" hidden required>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi mdi-account"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
    <br><br><br>
@endsection
