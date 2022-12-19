@extends('backend.master')
@section('title', ' | Doctor')
@section('doctor','active') @section('doctor-show','show') @section('doctor-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Doctors<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'backend.doctor.search','method' => 'GET']) !!}
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
                                    <th class="text-center"> Doctor Name </th>
                                    <th class="text-center"> Department </th>
                                    <th class="text-center"> Title </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($doctors as $doctor)
                                        <tr>
                                            <td class="text-center">{{ ($doctors->currentpage()-1) * $doctors ->perpage() + $loop->index + 1 }}</td>
                                            <td class="text-center">{{ $doctor->name }}</td>
                                            @forelse ( $all_departments as $department )
                                                @if ($department->id == $doctor->department_id)
                                                    <td class="text-center">{{ $department->department_name }}</td>
                                                @endif
                                            @empty
                                                <td class="text-center">No Department Assigned</td>
                                            @endforelse
                                            
                                            <td class="text-center">{{ $doctor->title }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('doctor.show',$doctor->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('doctor.edit',$doctor->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$doctor->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This doctor</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This doctor.</p><p>Once You Delete This doctor</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['doctor.destroy',$doctor->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$doctor->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-info">{{'No doctors Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $doctors->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
