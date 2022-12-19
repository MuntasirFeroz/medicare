@extends('backend.master')
@section('title', ' | Tests')
@section('tests','active') @section('tests-show','show') @section('tests-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Tests<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'backend.test.search','method' => 'GET']) !!}
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
                                    <th class="text-center"> Test Name </th>
                                    <th class="text-center"> Cost </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($tests as $test)
                                        <tr>
                                            <td class="text-center">{{ ($tests->currentpage()-1) * $tests ->perpage() + $loop->index + 1 }}</td>
                                            
                                            <td class="text-center">{{ $test->test_name }}</td>
                                            <td class="text-center">{{ $test->cost }}</td>
                                            
                                            
                                        
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('test.show',$test->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('test.edit',$test->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$test->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This test</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This test.</p><p>Once You Delete This test</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['test.destroy',$test->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$test->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-info">{{'No tests Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $tests->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
