@extends('backend.master')
@section('title', ' | Test Result')
@section('test-results','active') @section('test-results-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Test Result Information
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
                                $test=App\test::find($show->test_id)->test_name;
                            @endphp
                            <tr>
                                <td>Test Name</td>
                                <td>:</td>
                                <td>{{$test}}</td>
                            </tr>
                            <tr>
                                <td>Test Date</td>
                                <td>:</td>
                                <td>{{ date('Y-m-d',strtotime($show->test_date))}}</td>
                            </tr>
                            <tr>
                               <td>Patient Name</td>
                               <td>:</td>
                               <td>{{$show->patient_name}}</td>
                            </tr>
                            <tr>
                               <td>Age</td>
                               <td>:</td>
                               <td>{{$show->age}}</td>
                            </tr>
                            <tr>
                               <td>Sex</td>
                               <td>:</td>
                               <td>{{$show->sex}}</td>
                            </tr>
                           
                           <tr>
                               <td>Phone</td>
                               <td>:</td>
                               <td>{{$show->phone}}</td>
                           </tr>
                           <tr>
                               <td>Email</td>
                               <td>:</td>
                               <td>{{$show->phone}}</td>
                           </tr>
                           <tr>
                               <td>Test Result</td>
                               <td>:</td>
                               <td>{{$show->result}}</td>
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

        <a class="btn custom_button" href="{{route('backend.test_result.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
