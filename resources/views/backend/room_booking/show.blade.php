@extends('backend.master')
@section('title', ' | Room Booking')
@section('room_bookings','active') @section('room_bookings-show','show') 

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Room Booking Information
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
                                   $accomodation=App\Ambulance::find($show->accomodation_id);
                               @endphp
                            <tr>
                                <td> Booking Date</td>
                                <td>:</td>
                                <td>{{$show->booking_date}}</td>
                            </tr>
                            <tr>
                                <td> Entry Time</td>
                                <td>:</td>
                                <td>{{$show->entry_time}}</td>
                            </tr>
                            <tr>
                                <td> Accomdation</td>
                                <td>:</td>
                                <td>{{$accomodation->name}}</td>
                            </tr>
                            <tr>
                               <td> Accomdation Cost</td>
                               <td>:</td>
                               <td>{{$accomodation->Cost}}</td>
                           </tr>
                            <tr>
                               <td> Room No</td>
                               <td>:</td>
                               <td>{{$show->room_no}}</td>
                           </tr>
                            <tr>
                               <td> Seat No</td>
                               <td>:</td>
                               <td>{{$show->seat_no}}</td>
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

        <a class="btn custom_button" href="{{route('backend.room_booking.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
