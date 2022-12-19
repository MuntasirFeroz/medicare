@extends('backend.master')
@section('title', ' | patient')
@section('patients','active') @section('patients-show','show')
@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           patient Information
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
                               <td>Patient Name</td>
                               <td>:</td>
                               <td>{{$show->name}}</td>
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
