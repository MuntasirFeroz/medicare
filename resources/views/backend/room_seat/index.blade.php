@extends('backend.master')
@section('title', ' | Room')
@section('rooms', 'active') @section('rooms-show', 'show') @section('rooms-index', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">All Rooms
                                <hr style="" />
                            </h2><br />
                            {!! Form::open(['route' => 'backend.room.search', 'method' => 'GET']) !!}
                            <div class="row text-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="input" class="form-control" name="search"
                                            placeholder="Search Room No">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn custom_button btn-lg btn-block"
                                            id="search_balance">Search</button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <table class="custom">
                                <thead>
                                    <tr>
                                        <th class="text-center"> S/L </th>
                                        <th class="text-center"> Accomodation </th>
                                        <th class="text-center"> Floor No </th>
                                        <th class="text-center"> Room No </th>
                                        <th class="text-center"> Total Seats </th>
                                        <th class="text-center"> Seats </th>
                                        @if (Auth::user()->role == 'admin')
                                            <th class="text-center"> Option </th>
                                        @endif
                                        {{-- <th class="text-center"> Option </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rooms as $room)
                                        <tr>
                                            <td class="text-center">
                                                {{ ($rooms->currentpage() - 1) * $rooms->perpage() + $loop->index + 1 }}
                                            </td>
                                            @foreach ($accomodations as $accomodation)
                                                @if ($accomodation->id == $room->accomodation_id)
                                                    <td class="text-center">{{ $accomodation->name }}</td>
                                                @endif
                                            @endforeach

                                            <td class="text-center">{{ $room->floor_no }}</td>
                                            <td class="text-center">{{ $room->room_no }}</td>
                                            <td class="text-center">{{ $room->total_seat }}</td>
                                            <td>
                                                <table class="custom">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"> Seat No </th>
                                                            <th class="text-center"> Vacancy </th>
                                                            <th class="text-center"> Booked </th>
                                                            {{-- <th class="text-center"> Option </th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $seats = App\Seat::where('room_id', $room->id)
                                                                ->where('accomodation_id', $room->accomodation_id)
                                                                ->orderBy('id', 'ASC')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($seats as $seat)
                                                            <tr>
                                                                <td class="text-center">{{ $seat->seat_no }}</td>
                                                                @if ($seat->occupied == 0)
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            class="btn-floating btn-inverse-success btn-icon"
                                                                            onclick="window.location='{{ route('backend.room.seat_change', $seat->id) }}'">Vacant</button>
                                                                    </td>
                                                                @else
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            class="btn-floating btn-inverse-danger btn-icon"
                                                                            onclick="window.location='{{ route('backend.room.seat_change', $seat->id) }}'">Occupied</button>
                                                                    </td>
                                                                @endif

                                                                @if ($seat->booked == 0)
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            class="btn-floating btn-inverse-success btn-icon"
                                                                            onclick="window.location=''">Not Booked</button>
                                                                    </td>
                                                                @else
                                                                    <td class="text-center">
                                                                        <button type="button"
                                                                            class="btn-floating btn-inverse-danger btn-icon"
                                                                            onclick="window.location=''"> Booked</button>
                                                                    </td>
                                                                @endif

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            @if (Auth::user()->role == 'admin')
                                                <td class="text-center">
                                                    {{-- <button type="button" class="btn-floating btn-inverse-success btn-icon" onclick="window.location='{{route('room.show',$room->id)}}'"><i class="mdi mdi-eye"></i></button> --}}
                                                    <button type="button" class="btn-floating btn-inverse-info btn-icon"
                                                        onclick="window.location='{{ route('room.edit', $room->id) }}'"><i
                                                            class="mdi mdi-pencil"></i></button>
                                                    {{-- <div class="modal fade" id="delete_modal_{{$room->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete This room</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This room.</p><p>Once You Delete This room</p>
                                                                <p>You Will Delete It Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['room.destroy',$room->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-floating btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$room->id}}"><i class="mdi mdi-delete-forever"></i></button> --}}
                                                </td>
                                            @endif

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-info">{{ 'No rooms Are Created Yet' }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $rooms->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
