@extends('backend.master')
@section('title', ' | Appointment')
@section('appointments','active') @section('appointments-show','show') @section('appointments-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Appointments<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'backend.appointment.search','method' => 'GET']) !!}
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
                                    <th class="text-center"> Date </th>
                                    <th class="text-center"> Time </th>
                                    <th class="text-center"> Patient Name </th>
                                    <th class="text-center"> Patient Phone </th>
                                    <th class="text-center"> Doctor Name </th>
                                    <th class="text-center"> Department </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appointment)
                                        <tr>
                                            <td class="text-center">{{ ($appointments->currentpage()-1) * $appointments ->perpage() + $loop->index + 1 }}</td>
                                            {{-- <td class="text-center">{{ date('Y-m-d', $appointment->appointment_date) }}</td> --}}
                                            <td class="text-center">{{ date('Y-m-d',strtotime($appointment->appointment_date)) }}</td>
                                            
                                            <td class="text-center">{{ $appointment->appointment_time }}</td>
                                            <td class="text-center">{{ $appointment->patient_name }}</td>
                                            <td class="text-center">{{ $appointment->phone }}</td>
                                            @forelse ( $doctors as $doctor )
                                                @if ($doctor->id == $appointment->doctor_id)
                                                    <td class="text-center">{{ $doctor->name }}</td>
                                                @endif
                                            @empty
                                                <td class="text-center">No Doctor Assigned</td>
                                            @endforelse

                                            @forelse ( $all_departments as $department )
                                                @if ($department->id == $appointment->department_id)
                                                    <td class="text-center">{{ $department->department_name }}</td>
                                                @endif
                                            @empty
                                                <td class="text-center">No Department Assigned</td>
                                            @endforelse
                                            
                                            @if ($appointment->status == 0)
                                                <td class="text-center">
                                                    <button type="button" class="btn-floating btn-inverse-danger btn-icon" onclick="window.location='{{route('backend.appointment.status',[$appointment->id,$appointment->status])}}'">Pending</button>
                                                </td>    
                                            @else
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('backend.appointment.status',[$appointment->id,$appointment->status])}}'">Accepted</button>
                                            </td> 
                                            @endif
                                        
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('appointment.show',$appointment->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('appointment.edit',$appointment->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$appointment->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This appointment</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This appointment.</p><p>Once You Delete This appointment</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['appointment.destroy',$appointment->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$appointment->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-info">{{'No appointments Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $appointments->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
