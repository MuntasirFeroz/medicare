@extends('backend.master')
@section('title', ' | Tests')
@section('tests','active') @section('tests-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Test Information
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
                               <td>Test Name</td>
                               <td>:</td>
                               <td>{{$show->test_name}}</td>
                           </tr>
                           <tr>

                               <td>Cost</td>
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

        <a class="btn custom_button" href="{{route('backend.test.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
