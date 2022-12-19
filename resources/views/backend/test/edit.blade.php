@extends('backend.master')
@section('title', ' | Tests')
@section('tests','active') @section('tests-show','show')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['test.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-clipboard-text"></i></span> Edit Test</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="sub_title">Test Name</label>
                        <input type="text" class="form-control" id="test_name" name="test_name" value="{{ $edit->test_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sub_title">Cost</label>
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $edit->cost }}" required>
                    </div>
                    
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi mdi-clipboard-text"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
    <br><br><br>

@endsection
