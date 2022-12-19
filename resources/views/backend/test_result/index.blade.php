@extends('backend.master')
@section('title', ' | Test Result')
@section('test-results','active') @section('test-results-show','show') @section('test-results-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Test Results<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'backend.test_result.search','method' => 'GET']) !!}
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
                                    <th class="text-center"> Test Date </th>
                                    <th class="text-center"> Test name </th>
                                    <th class="text-center"> Patient Name </th>
                                    <th class="text-center"> Patient Phone </th>
                                    <th class="text-center"> Patient Email </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($test_results as $test_result)
                                        <tr>
                                            <td class="text-center">{{ ($test_results->currentpage()-1) * $test_results ->perpage() + $loop->index + 1 }}</td>
                                    
                                            <td class="text-center">{{ date('Y-m-d',strtotime($test_result->test_date)) }}</td>
                            
                                            @forelse ( $tests as $test )
                                                @if ($test->id == $test_result->test_id)
                                                    <td class="text-center">{{ $test->test_name }}</td>
                                                @endif
                                            @empty
                                                <td class="text-center">No Test Assigned</td>
                                            @endforelse

                                            <td class="text-center">{{ $test_result->patient_name }}</td>
                                            <td class="text-center">{{ $test_result->phone }}</td>
                                            <td class="text-center">{{ $test_result->email }}</td>
                                            @if ( $test_result->completed == 1)
                                                <td class="text-center">
                                                    <button type="button" class="btn-floating btn-inverse-success btn-icon">Completed</button>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <button type="button" class="btn-floating btn-inverse-danger btn-icon">Pending</button>
                                                </td>
                                            @endif
                                            

                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('test-result.show',$test_result->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                @if (Auth::user()->role != 'patient')
                                                    <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('test-result.edit',$test_result->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                @endif
                                                <div class="modal fade" id="delete_modal_{{$test_result->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This test_result</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This Test Result.</p><p>Once You Delete This Test Result</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['test-result.destroy',$test_result->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$test_result->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-info">{{'No Test Result Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $test_results->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
