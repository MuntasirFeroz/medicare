@extends('backend.master')
@section('title', ' | Prescription')
@section('prescriptions','active') @section('prescriptions-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Prescription
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
                                <td>Prescription Date</td>
                                <td>:</td>
                                <td>{{ date('Y-m-d',strtotime($show->appointment_date))}}</td>
                            </tr>
                            <tr>
                               <td>Prescribed BY</td>
                               <td>:</td>
                               <td>{{$doctor_name}}</td>
                           </tr>

                           <tr>
                               <td>Department</td>
                               <td>:</td>
                               <td>{{$department_name}}</td>
                           </tr>
                           <tr>
                               <td>Patient Name</td>
                               <td>:</td>
                               <td>{{$patient->name}}</td>
                           </tr>
                           <tr>
                               <td>Age</td>
                               <td>:</td>
                               <td>{{$patient->age}}</td>
                           </tr>
                           <tr>
                               <td>Sex</td>
                               <td>:</td>
                               <td>{{$patient->sex}}</td>
                           </tr>
                           <tr>
                               <td>Phone</td>
                               <td>:</td>
                               <td>{{$patient->phone}}</td>
                           </tr>
                           <tr>
                               <td>Email</td>
                               <td>:</td>
                               <td>{{$patient->email}}</td>
                           </tr>
                           
                           <tr>
                                <td>Diagnosis</td>
                                <td>:</td>
                                <td>{{$show->diagnosis}}</td>
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

        {{-- <a class="btn custom_button" href="{{route('backend.department.index')}}">Go Back</a> --}}
    </div>
    <!-- ===========================================-->


@endsection
