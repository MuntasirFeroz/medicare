@extends('backend.master')
@section('title', ' | Ambulance')
@section('ambulances','active') @section('ambulances-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Ambulance Information
            <hr style="" />
        </h2>
        <br />
        <!-- Contact start-->
        <div class="card">
            <div class="card-header custom_card_head">
                All Informations
            </div>
            <div class="card-body">
                <br>
                <div class="row">
                   <div class="col-md-12">
                       <table class="custom">
                           <tbody>
                           <tr>
                               <td> Ambulance Type</td>
                               <td>:</td>
                               <td>{{$show->type}}</td>
                           </tr>
                           <tr>

                               <td>Registration No</td>
                               <td>:</td>
                               <td>{{$show->registration_no}}</td>
                           </tr>
                          
                           <tr>
                               <td>Driver Name</td>
                               <td>:</td>
                               <td>{{$show->driver}}</td>
                           </tr>
                           <tr>
                               <td>Driver phone</td>
                               <td>:</td>
                               <td>{{$show->driver_phone}}</td>
                           </tr>
                           
                           <tr>
                                <td>Cost Per Hour</td>
                                <td>:</td>
                                <td>{{$show->cost}}</td>
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

        <a class="btn custom_button" href="{{route('backend.ambulance.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
