@extends('backend.master')
@section('title', ' | Appointment')
@section('appointments','active') @section('appointments-show','show') @section('appointments-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'appointment.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-calendar-clock"></i></span> Add New Appointment</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Department</label>
                        <select class="form-control selectpicker response" id="department" name="department" data-response="department" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Department</option>
                            @forelse ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @empty            
                            @endforelse
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Doctor Name</label>
                        <select class="form-control selectpicker response" id="doctor_name" name="doctor_name"  data-response="sub_category" required>
                            <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Doctor</option>
                        </select>
                    </div>
            <div class="form-group">
                <label for="sub_title">Patient Name</label>
                <input type="text" class="form-control" id="name" name="patient" required>
            </div>
            <div class="form-group">
                <label for="sub_title">Appointment Date</label>
                <input type="date" class="form-control" id="name" name="date" required>
            </div>
            <div class="form-group">
                <label for="sub_title">Appointment Time</label>
                <input type="time" class="form-control" id="name" name="time"  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required>
            </div>
            <div class="form-group">
                <label for="address">Message</label>
                <textarea class="form-control" name="message" id="address" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi mdi-calendar-clock"></i> Create </button>
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
