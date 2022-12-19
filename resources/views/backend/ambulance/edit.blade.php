@extends('backend.master')
@section('title', ' | Ambulance')
@section('ambulances','active') @section('ambulances-show','show')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['ambulance.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi  mdi-ambulance"></i></span> Update Ambulance</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Ambulance Type</label>
                        <select class="form-control selectpicker response" id="type" name="type" data-response="department" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Type</option>
                            @if ($edit->type == 'car')
                                <option selected value="car">Car Ambulance</option>
                                <option value="air">Air Ambulance</option>
                            @else
                                <option value="car">Car Ambulance</option>
                                <option selected value="air">Air Ambulance</option>
                            @endif   
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="registration_no">Ambulance name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $edit->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="registration_no">Registration No</label>
                        <input type="text" class="form-control" id="registration_no" name="registration_no" value="{{ $edit->registration_no }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Driver Name</label>
                        <input type="text" class="form-control" id="driver" name="driver" placeholder="Enter Driver Name" value="{{ $edit->driver }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Driver Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Driver Phone Number" value="{{ $edit->driver_phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Cost Per Hour</label>
                        <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter Cost" value="{{ $edit->cost }}" required>
                    </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi  mdi-ambulance"></i> Update </button>
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

            if(response == 'department'){
                $.ajax({
                    url : '/department-doctor-find/' + value,
                    method : 'GET',
                    success : function(data){
                        if(data.length === 0){
                            toastr.error("Doctor Does Not Exist");
                            $('#doctor_name').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Doctor</option>');
                            refresh();
                        }else{
                            $('#doctor_name').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Doctor</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#doctor_name').append("<option value='" + element['id'] + "'>"+ element['name']+"</option>");
                            });
                            refresh();
                        }
                    }
                });
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
