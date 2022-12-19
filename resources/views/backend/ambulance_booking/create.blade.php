@extends('backend.master')
@section('title', ' | Ambulance Booking')
@section('ambulance-bookings','active') @section('ambulance-bookings-show','show') @section('ambulance-bookings-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'ambulance-booking.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-ambulance"></i></span> Add New Ambulance</h3></div>
            <div class="card">
                <div class="card-body">
                    @if (empty($ambulances))
                        <h3>Sorry no Ambulances are available</h3>
                    @else
                        <div class="form-group">
                            <label for="name">Ambulance Type</label>
                            <select class="form-control selectpicker response" id="type" name="type" data-response="ambulance_type" required>
                                <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Type</option>
                                <option value="car">Car Ambulance</option>
                                <option value="air">Air Ambulance</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Choose Ambulance</label>
                            <select class="form-control selectpicker response" id="ambulance_id" name="ambulance_id" data-response="ambulance" required>
                                <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Ambulance</option>  
                            </select>
                        </div>
                    @endif
                   
                    <div class="form-group">
                        <label for="email">Booking Date</label>
                        <input type="date" class="form-control" id="date" name="date"  required>
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
                    <div class="form-group">
                        <label for="phone">Address</label>
                        <textarea  type="text" class="form-control" name="address" id="" cols="30" rows="10" required></textarea>
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

            if(response == 'ambulance_type'){
                $.ajax({
                    url : '/ambulance-find/' + value,
                    method : 'GET',
                    success : function(data){
                        if(data.length === 0){
                            toastr.error("Ambulances is Not Available");
                            $('#ambulance_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Ambulance</option>');
                            refresh();
                        }else{
                            toastr.success("Ambulances is Available");
                            $('#ambulance_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Ambulance</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#ambulance_id').append("<option value='" + element['id'] + "'>"+ element['name']+"</option>");
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
