@extends('backend.master')
@section('title', ' | Department')
@section('products','active') @section('products-show','show')
@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           Department Information
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
                           <img src="{{asset('/assets/frontend/images/department/'.$show->image)}}" class="img-thumbnail">
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
                               <td>Department Name</td>
                               <td>:</td>
                               <td>{{$show->department_name}}</td>
                           </tr>
                           <tr>

                               <td>Sub Title</td>
                               <td>:</td>
                               <td>{{$show->sub_title}}</td>
                           </tr>
                           <tr>
                               <td>Content</td>
                               <td>:</td>
                               <td>{{$show->content}}</td>
                           </tr>
                           <tr>
                               <td>Service Features</td>
                               <td>:</td>
                               <td>{{$show->service_features}}</td>
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

        <a class="btn custom_button" href="{{route('backend.department.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
