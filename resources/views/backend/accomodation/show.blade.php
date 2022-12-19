@extends('backend.master')
@section('title', ' | Accomodation')
@section('accomodations','active') @section('accomodations-show','show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Accomodation Information
            <hr style="" />
        </h2>
        <br />
        <!-- Contact start-->
        <div class="card">
            <div class="card-header custom_card_head">
                All Informations
            </div>
            <div class="card-body">
                <img class="img-fluid" style="padding-bottom: 31px" src="{{asset('assets/FrontEnd/images/accomodation/'. $show->image)}}">
                <br>
                <div class="row">
                   <div class="col-md-12">
                       <table class="custom">
                           <tbody>
                           <tr>
                               <td>Accomodation Name</td>
                               <td>:</td>
                               <td>{{$show->name}}</td>
                           </tr>
                           <tr>

                               <td>Cost</td>
                               <td>:</td>
                               <td>{{$show->cost}}</td>
                           </tr>
 
                           <tr>
                                <td>Details</td>
                                <td>:</td>
                                <td>{{$show->details}}</td>
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

        <a class="btn custom_button" href="{{route('backend.accomodation.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
