@extends('backend.master')
@section('title', ' | Doctor')
@section('doctor','active') @section('doctor-show','show') @section('doctor-index','active') @section('doctor-myaccount-show','active')
@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Doctor Information
            <hr style="" />
        </h2>
        <br />
        <!-- Contact start-->
        <div class="card">
            <div class="card-header custom_card_head">
                All Informations
            </div>
            <div class="card-body">
               <div class="row">
                   @if(!empty($show->image))
                       <div class="col-md-3">
                           <img src="{{asset('/assets/BackEnd/images/user/'.$show->image)}}" class="img-thumbnail">
                       </div>
                   @else
                       <div class="col-md-3">
                           <h3>No Images</h3>
                       </div>
                   @endif

               </div>
                <br>
                <div class="row">
                   <div class="col-md-12">
                       <table class="custom">
                           <tbody>
                           <tr>
                               <td>Doctor Name</td>
                               <td>:</td>
                               <td>{{$show->name}}</td>
                           </tr>
                           <tr>
                               <td>Department Name</td>
                               <td>:</td>
                               @php
                                   $departments=App\Department::orderBy('id','DESC')->get();
                               @endphp
                               @foreach ( $departments as $department)
                                   @if ($department->id == $show->department_id)
                                    <td>{{ $department->department_name }}</td>        
                                   @endif
                               @endforeach
                               
                           </tr>
                           <tr>

                               <td>Title</td>
                               <td>:</td>
                               <td>{{$show->title}}</td>
                           </tr>
                           <tr>
                               <td>Email</td>
                               <td>:</td>
                               <td>{{$show->email}}</td>
                           </tr>
                           <tr>
                               <td>Contact</td>
                               <td>:</td>
                               <td>{{$show->phone}}</td>
                           </tr>
                           <tr>
                               <td>Salary</td>
                               <td>:</td>
                               <td>{{$show->salary}}</td>
                           </tr>
                           <tr>
                               <td>Address</td>
                               <td>:</td>
                               <td>{{$show->address}}</td>
                           </tr>
                           </tbody>
                       </table>
                       <br>
                       <p></p>
                   </div>
                   
               </div>
            </div>
        </div>
        <br>
        <!-- Contact End-->

        {{-- <a class="btn custom_button" href="{{route('backend.doctor.index')}}">Go Back</a> --}}
    </div>
    <!-- ===========================================-->


@endsection
