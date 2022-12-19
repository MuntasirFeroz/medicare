@extends('backend.master')
@section('title', ' | Messages')
@section('contact_messages','active') @section('contact_messages-show','show') @section('contact_messages-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Contact Messages<hr style=""/></h2><br/>
                            {!! Form::open(['route' => 'contact.search','method' => 'GET']) !!}
                            <div class="row text-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="search" name="search" value="{{!empty($searched) ? $searched : "" }}" placeholder="Search in table.....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn custom_button btn-lg btn-block" id="search_balance">Search</button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <table class="custom ">
                                <thead>
                                <tr>
                                    <th class="text-center"> S/L </th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Email </th>
                                    <th class="text-center"> Phone </th>
                                    <th class="text-center"> Subject </th>
                                    <th class="text-center"> Created At </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($messages->count() ==! 0)
                                    @foreach($messages as $message)
                                        <tr>
                                            <td class="text-center">{{ ($messages->currentpage()-1) * $messages ->perpage() + $loop->index + 1 }}</td>
                                            <td class="text-center">{{$message->name}}</td>
                                            <td class="text-center">{{$message->email}}</td>
                                            <td class="text-center">{{$message->phone}}</td>
                                            <td class="text-center">{{$message->subject}}</td>
                                            <td class="text-center">{{date('d-m-y',strtotime($message->created_at))}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('backend.contacts.details',$message->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$message->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Message</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete This Message.</p>
                                                                <p>Once You Delete This Message</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['contact.destroy',$message->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$message->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-info">{{'No One Contacted Yet'}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        {!! $messages->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
