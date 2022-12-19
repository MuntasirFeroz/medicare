@extends('backend.master')
@section('title', ' | Appointment')
@section('appointments','active') @section('appointments-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Appointment Information
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
                               <td>Patient Name</td>
                               <td>:</td>
                               <td>{{$show->patient_name}}</td>
                           </tr>
                           <tr>

                               <td>Phone</td>
                               <td>:</td>
                               <td>{{$show->phone}}</td>
                           </tr>
                           @php
                               $department=App\Department::find($show->department_id)->department_name;
                               $doctor=App\Doctor::find($show->doctor_id);
                           @endphp
                           <tr>
                               <td>Appointment Doctor</td>
                               <td>:</td>
                               <td>{{$doctor ->name}}</td>
                           </tr>
                           <tr>
                               <td>Department</td>
                               <td>:</td>
                               <td>{{$department}}</td>
                           </tr>
                           
                           <tr>
                                <td>Appointment Time</td>
                                <td>:</td>
                                <td>{{$show->appointment_time}}</td>
                            </tr>
                           <tr>
                                <td>Appointment Date</td>
                                <td>:</td>
                                <td>{{ date('Y-m-d',strtotime($show->appointment_date))}}</td>
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

        {{-- <a class="btn custom_button" href="{{route('backend.appointment.index')}}">Go Back</a> --}}
    </div>
    <!-- ===========================================-->


@endsection
