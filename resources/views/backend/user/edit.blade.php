@extends('backend.master')
@section('title', ' | User')
@section('users','active') @section('users-show','show')
@section('content')
{!! Form::open(['class' =>'form-sample','route' => ['user.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-account"></i></span> Edit User</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$edit->name}}" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Role</option>
                            @if ($edit->role == 'admin')
                                <option selected value="admin">Admin</option>
                                <option value="hospital">Hospital</option>
                                <option value="doctor">Doctor</option>
                                <option value="patient">Patient</option>
                            @elseif ($edit->role == 'hospital')
                                <option value="admin">Admin</option>
                                <option selected value="hospital">Hospital</option>
                                <option value="doctor">Doctor</option>
                                <option value="patient">Patient</option>    
                            @elseif ($edit->role == 'doctor')
                                <option value="admin">Admin</option>
                                <option value="hospital">Hospital</option>
                                <option selected value="doctor">Doctor</option>
                                <option value="patient">Patient</option>    
                            @else
                                <option value="admin">Admin</option>
                                <option value="hospital">Hospital</option>
                                <option value="doctor">Doctor</option>
                                <option selected value="patient">Patient</option>    
                            @endif
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Upload Photo</label>
                        <input type='file' class="form-control" id="imageUpload" name="image" accept=".png, .jpg, .jpeg"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$edit->email}}" placeholder="Enter User Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$edit->phone}}" placeholder="Enter User Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$edit->address}}" placeholder="Enter User Address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button"><i class="mdi mdi-account"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

