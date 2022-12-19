@extends('backend.master')
@section('title', ' | Consultation')
@section('consultations','active') @section('consultations-show','show') @section('consultations-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Consultations<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'backend.consultation.search','method' => 'GET']) !!}
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
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($consultations as $consultation)
                                        <tr>
                                            <td class="text-center">{{ ($consultations->currentpage()-1) * $consultations ->perpage() + $loop->index + 1 }}</td>
                                            {{-- <td class="text-center">{{ date('Y-m-d', $consultation->consultation_date) }}</td> --}}
                                            <td class="text-center">{{ date('Y-m-d',strtotime($consultation->consultation_date)) }}</td>
                                            <td class="text-center">{{ $schedule->day[$consultation->schedule_no] }} : {{ $schedule->start_time[$consultation->schedule_no] }} - {{ $schedule->end_time[$consultation->schedule_no] }}</td>
                                            <td class="text-center">{{ $consultation->patient }}</td>
                                            <td class="text-center">{{ $consultation->phone }}</td>
                                            
                                            
                                            @if ($consultation->status == 0)
                                                <td class="text-center">
                                                    <button type="button" class="btn-floating btn-inverse-danger btn-icon" onclick="window.location='{{route('backend.consultation.status',[$consultation->id,$consultation->status])}}'">Pending</button>
                                                </td>    
                                            @else
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('backend.consultation.status',[$consultation->id,$consultation->status])}}'">Accepted</button>
                                            </td> 
                                            @endif
                                        
                                            <td class="text-center">
                                                {{-- <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('consultation.show',$consultation->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('consultation.edit',$consultation->id)}}'"><i class="mdi mdi-pencil"></i></button> --}}
                                                <div class="modal fade" id="delete_modal_{{$consultation->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This consultation</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This consultation.</p><p>Once You Delete This consultation</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['consultation.destroy',$consultation->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$consultation->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-info">{{'No consultations Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $consultations->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
