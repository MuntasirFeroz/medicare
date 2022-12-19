@extends('backend.master')
@section('title', ' | Schedule')
@section('schedules', 'active') @section('schedules-show', 'show')

@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
           My Schedule
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
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>  
                            <tbody>
                                @for( $i=0; $i < count($show->day) ; $i++)
                                <tr>
                                    <td>{{ $show->day[$i] }}</td>
                                    <td>{{$show->start_time[$i]}}</td>
                                    <td>{{ $show->end_time[$i] }}</td>
                                </tr>
                                @endfor
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

        <a class="btn custom_button" href="{{route('backend.schedule.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
