@extends('backend.master')
@section('title', ' | Ambulance')
@section('ambulances','active') @section('ambulances-show','show') @section('ambulances-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Ambulance<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'backend.ambulance.search','method' => 'GET']) !!}
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
                            <table class="custom">
                                <thead>
                                <tr>
                                    <th class="text-center"> S/L </th>
                                    <th class="text-center"> Ambulance Name </th>
                                    <th class="text-center"> Ambulance Type </th>
                                    <th class="text-center"> Registration No</th>
                                    <th class="text-center"> Driver </th>
                                    <th class="text-center"> Driver Phone </th>
                                    <th class="text-center"> Available </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($ambulances as $ambulance)
                                        <tr>
                                            <td class="text-center">{{ ($ambulances->currentpage()-1) * $ambulances ->perpage() + $loop->index + 1 }}</td>
                                            {{-- <td class="text-center">{{ date('Y-m-d', $ambulance->ambulance_date) }}</td> --}}
                                           
                                            <td class="text-center">{{ $ambulance->name }}</td>
                                            <td class="text-center">{{ $ambulance->type }}</td>
                                            <td class="text-center">{{ $ambulance->registration_no }}</td>
                                            <td class="text-center">{{ $ambulance->driver }}</td>
                                            <td class="text-center">{{ $ambulance->driver_phone }}</td>   
                                            @if ($ambulance->dispatched == 0)
                                                <td class="text-center">
                                                    <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('backend.ambulance.available',$ambulance->id)}}'">Available</button>
                                                </td>    
                                            @else
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" onclick="window.location='{{route('backend.ambulance.available',$ambulance->id)}}'">Not Available</button>
                                            </td> 
                                            @endif
                                        
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('ambulance.show',$ambulance->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('ambulance.edit',$ambulance->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$ambulance->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This ambulance</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This ambulance.</p><p>Once You Delete This ambulance</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['ambulance.destroy',$ambulance->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$ambulance->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-info">{{'No ambulances Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $ambulances->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
