@extends('backend.master')
@section('title', ' | Ambulance Booking')
@section('ambulance-bookings','active') @section('ambulance-bookings-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Ambulance Booking Information
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
                               @php
                                   $ambulance=App\Ambulance::find($show->ambulance_id);
                               @endphp
                            <tr>
                                <td> Booking Date</td>
                                <td>:</td>
                                <td>{{$show->booking_date}}</td>
                            </tr>
                            <tr>
                                <td> Ambulance</td>
                                <td>:</td>
                                <td>{{$ambulance->name}}</td>
                            </tr>
                            <tr>
                               <td> Ambulance Type</td>
                               <td>:</td>
                               <td>{{$ambulance->type}}</td>
                           </tr>
                            <tr>
                               <td> Driver</td>
                               <td>:</td>
                               <td>{{$ambulance->driver}}</td>
                           </tr>
                            <tr>
                               <td> Driver Phone</td>
                               <td>:</td>
                               <td>{{$ambulance->driver_phone}}</td>
                           </tr>

                            <tr>
                               <td> Ambulance Cost</td>
                               <td>:</td>
                               <td>{{$ambulance->cost}}</td>
                           </tr>

                           <tr>
                               <td>Patient Name</td>
                               <td>:</td>
                               <td>{{$show->patient}}</td>
                           </tr>
                          
                           <tr>
                               <td>Patient Phone</td>
                               <td>:</td>
                               <td>{{$show->phone}}</td>
                           </tr>
                           <tr>
                               <td>Patient Email</td>
                               <td>:</td>
                               <td>{{$show->email}}</td>
                           </tr>
                           <tr>
                               <td>Patient Address</td>
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

        <a class="btn custom_button" href="{{route('backend.ambulance_booking.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
