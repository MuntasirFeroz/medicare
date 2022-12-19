@extends('backend.master')
@section('title', ' | Department')
@section('department','active') @section('department-show','show')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['department.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi  mdi-hospital-building"></i></span> Edit Department</h3></div>
            <div class="card">
                <div class="card-body">
            <div class="form-group">
                <label for="name">Department Name</label>
                <input type="text" class="form-control" id="name" name="department_name" value={{ $edit->department_name }} placeholder="Enter Department Name" required>
            </div>
            <div class="form-group">
                <label for="select_role" >Upload Photo size(1920 X 1280)</label>
                <input type='file' class="form-control" id="imageUpload" name="image" value={{ $edit->image }} accept=".png, .jpg, .jpeg" required/>
            </div>
            
            <div class="form-group">
                <label for="sub_title">Sub Title</label>
                <textarea class="form-control" name="sub_title" id="" cols="30" rows="10"> {{ $edit->sub_title }}</textarea>
            </div>
            <div class="form-group">
                <label for="Content">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10"> {{ $edit->content }} </textarea>
            </div>
            <div class="form-group">
                <label for="Content">Service Features</label>
                <textarea class="form-control" name="service_features" id="" cols="30" rows="10">{{ $edit->features }}</textarea>
            </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi  mdi-hospital-building"></i> Edit </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
