@extends('backend.master')
@section('title', ' | Ambulance Booking')
@section('ambulance-bookings','active') @section('ambulance-bookings-show','show') @section('ambulance-bookings-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Ambulance Booking<hr style=""/></h2><br/>
                            @if (Auth::user()->role != 'patient')
                                {!! Form::open(['route' => 'backend.ambulance_booking.search','method' => 'GET']) !!}
                                <div class="row text-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="input" class="form-control" name="search">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn custom_button btn-lg btn-block" id="search_balance">Search</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endif 
                           
                            <table class="custom">
                                <thead>
                                <tr>
                                    <th class="text-center"> S/L </th>
                                    <th class="text-center"> Booking Date </th>
                                    <th class="text-center"> Ambulance</th>
                                    <th class="text-center"> Ambulance Type</th>
                                    <th class="text-center"> Patient </th>
                                    <th class="text-center"> Patient Phone </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                        <tr>
                                            <td class="text-center">{{ ($bookings->currentpage()-1) * $bookings ->perpage() + $loop->index + 1 }}</td>
                                            {{-- <td class="text-center">{{ date('Y-m-d', $booking->booking_date) }}</td> --}}
                                           
                                            <td class="text-center">{{ $booking->booking_date }}</td>
                                            @php
                                                $ambulance=App\Ambulance::find($booking->ambulance_id);
                                            @endphp
                                            <td class="text-center">{{ $ambulance->name }}</td>
                                            <td class="text-center">{{ $ambulance->type }}</td>
                                            <td class="text-center">{{ $booking->patient }}</td>   
                                            <td class="text-center">{{ $booking->phone }}</td>   
                                            
                        
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('ambulance-booking.show',$booking->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                {{-- <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('ambulance-booking.edit',$booking->id)}}'"><i class="mdi mdi-pencil"></i></button> --}}
                                                <div class="modal fade" id="delete_modal_{{$booking->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This booking</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This booking.</p><p>Once You Delete This booking</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['ambulance-booking.destroy',$booking->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$booking->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-info">{{'No bookings Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $bookings->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
