@extends('backend.master')
@section('title', ' | Test Result')
@section('test-results','active') @section('test-results-show','show')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['test-result.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-clipboard-text"></i></span> Update Test Result</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Test</label>
                        <select class="form-control selectpicker response" id="test_id" name="test_id" data-response="test" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose Test</option>
                            @forelse ($tests as $test)
                                @if ($test->id == $edit->test_id)
                                    <option selected value="{{ $test->id }}">{{ $test->test_name }}</option>
                                @else
                                    <option value="{{ $test->id }}">{{ $test->test_name }}</option>
                                @endif        
                                
                            @empty            
                            @endforelse
                          </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="sub_title">Test Date</label>
                        <input type="date" class="form-control" id="name" name="test_date" value="{{ $edit->test_date }}" required>
                    </div>  
                    <div class="form-group">
                        <label for="sub_title">Patient Name</label>
                        <input type="text" class="form-control" id="name" name="patient_name" value="{{ $edit->patient_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  value="{{ $edit->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $edit->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Age</label>
                        <input type="text" class="form-control" id="age" name="age"  value="{{ $edit->age }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Sex</label>
                        <select class="form-control selectpicker response" id="sex" name="sex" data-response="sex" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose Sex</option>
                            @if ($edit->sex == 'male')
                                <option selected value="male">Male</option>
                                <option value="female">Female</option>
                            @else
                                <option  value="male">Male</option>
                                <option selected value="female">Female</option>
                            @endif  
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Result</label>
                        @if ( !empty($edit->result) )
                            <textarea class="form-control" name="result" id="result" cols="30" rows="20">{{ $edit->result }}</textarea>
                        @else
                            <textarea class="form-control" name="result" id="result" cols="30" rows="20"></textarea>
                         @endif
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
