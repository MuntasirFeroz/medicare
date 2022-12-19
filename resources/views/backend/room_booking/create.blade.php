@extends('backend.master')
@section('title', ' | Room Booking')
@section('room_bookings','active') @section('room_bookings-show','show') @section('room_bookings-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'room-booking.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-ambulance"></i></span> Add New Room Booking</h3></div>
            <div class="card">
                <div class="card-body">
                    
                        <div class="form-group">
                            <label for="name">Accomodation</label>
                            <select class="form-control selectpicker response" id="type" name="accomodation_id" data-response="accomodation" required>
                                <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Accomodation</option>
                                @foreach ( $accomodations as $accomodation)
                                    <option value="{{ $accomodation->id }}">{{ $accomodation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Choose Room</label>
                            <select class="form-control selectpicker response" id="room_id" name="room_id" data-response="room" required>
                                <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Room</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Choose Seat</label>
                            <select class="form-control selectpicker response" id="seat_id" name="seat_id" data-response="seat" required>
                                <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Seat No</option>  
                            </select>
                        </div>
                  
                   
                    <div class="form-group">
                        <label for="email">Booking Date</label>
                        <input type="date" class="form-control" id="date" name="date"  required>
                    </div>
                    <div class="form-group">
                        <label for="email">Entry Time</label>
                        <input type="time" class="form-control" id="time" name="time"  required>
                    </div>
                    <div class="form-group">
                        <label for="email">Patient Name</label>
                        <input type="text" class="form-control" id="driver" name="patient"  required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Patient Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"  required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Patient Email</label>
                        <input type="text" class="form-control" id="email" name="email"  required>
                    </div>
                
                </div>
            </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button id="submit_btn" class="custom_button "><i class="mdi mdi-ambulance"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
    <br><br><br>
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change','.response',function(){
            let value = $(this).val();
            let response = $(this).data('response');

            if(response == 'accomodation'){
                $.ajax({
                    url : '/room-booking-find/' + value,
                    method : 'GET',
                    success : function(data){
                        if(data.length === 0){
                            toastr.error("Room is Not Available");
                            $('#room_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Room</option>');
                            refresh();
                        }else{
                            toastr.success("Room is Available");
                            $('#room_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Room</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#room_id').append("<option value='" + element['room_id'] + "'>"+ element['room_no']+"</option>");
                            });
                            refresh();
                        }
                    }
                });
            }
            else if(response == 'room')
            {
                $.ajax({
                    url : '/room-booking-seat-find/' + value,
                    method : 'GET',
                    success : function(data){
                        // console.log(data)
                        if(data.length === 0){
                            toastr.error("Seat is Not Available");
                            $('#seat_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Seat No</option>');
                            refresh();
                        }else{
                            toastr.success("Seat is Available");
                            $('#seat_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Seat No</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#seat_id').append("<option value='" + element['id'] + "'>"+ element['seat_no']+"</option>");
                            });
                            refresh();
                        }
                    }
                });
            }
            else if(response == 'ambulance')
            {   
                console.log(value)
                if(value != null)
                {
                    $('#ambulance_id').attr('type','sybmit')
                }
                    
            }
        });

        function refresh(){
            $('.selectpicker').selectpicker('refresh');
        }
        function loadImg(id){
            $('#frame_'+id).attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>

@endsection
