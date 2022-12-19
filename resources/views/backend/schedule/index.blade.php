@extends('backend.master')
@section('title', ' | Schedule')
@section('schedules','active') @section('schedules-show','show') @section('schedules-index','active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">My Schedules<hr style=""/></h2><br/>
                            {{-- {!! Form::open(['route' => 'backend.schedule.search','method' => 'GET']) !!}
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
                            {!! Form::close() !!} --}}
                            <table class="custom">
                                <thead>
                                <tr>
                                    {{-- <th class="text-center"> S/L </th> --}}
                                    <th class="text-center"> Time Schedule </th>
                                    <th class="text-center"> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($schedules as $schedule)
                                        <tr>
                                            {{-- <td class="text-center">{{ ($schedules->currentpage()-1) * $schedules ->perpage() + $loop->index + 1 }}</td> --}}
                                            {{-- <td class="text-center">{{ date('Y-m-d', $schedule->schedule_date) }}</td> --}} 
                                                 @php
                                                        $schedule['day'] = explode(',',str_replace(str_split('[]""'),'',$schedule->day));
                                                        $schedule['start_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->start_time));
                                                        $schedule['end_time'] = explode(',',str_replace(str_split('[]""'),'',$schedule->end_time));
                                                 @endphp  

                                             <td class="text-center">
                                               @for ($i=0 ; $i < count($schedule->day); $i++)
                                                    <table class="custom">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">{{ $schedule->day[$i] }}  : {{ $schedule->start_time[$i] }} - {{ $schedule->end_time[$i] }} </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    
                                               @endfor 
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('schedule.show',$schedule->id)}}'"><i class="mdi mdi-eye"></i></button>
                                                <button type="button" class="btn-floating btn-inverse-info btn-icon" onclick="window.location='{{route('schedule.edit',$schedule->id)}}'"><i class="mdi mdi-pencil"></i></button>
                                                <div class="modal fade" id="delete_modal_{{$schedule->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This schedule</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This schedule.</p><p>Once You Delete This schedule</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['schedule.destroy',$schedule->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$schedule->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                            </td>
                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-info">{{'No schedules Are Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            @if (empty($schedules))
                                <div class="text-center">
                                    <button class="btn btn-success" onclick="window.location='{{route('schedule.create')}}'">Create</button>
                                </div>
                            @endif
                            

                        </div>
                        {!! $schedules->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
