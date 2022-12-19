@extends('backend.master')
@section('title', ' | Prescription')
@section('prescriptions','active') @section('prescriptions-show','show') @section('prescriptions-create','active')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'prescription.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi mdi-calendar-clock"></i></span> Add New Prescription</h3></div>
            <div class="card">
                <div class="card-body">
        
                    @if (Auth::user()->role == 'admin')
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
                    @elseif (Auth::user()->role == 'doctor')
                        @php
                            $user_doctor=App\Doctor::where('user_id', Auth::user()->id)->get();
                        @endphp
                        <div class="form-group">
                            <label for="name">Department</label>
                            <select class="form-control selectpicker response" readonly id="department" name="department" data-response="department" required>
                                {{-- <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Department</option> --}}
                                @forelse ($departments as $department)
                                    @if ( $department->id == $user_doctor[0]->department_id)
                                        <option selected value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endif
                                    {{-- <option value="{{ $department->id }}">{{ $department->department_name }}</option> --}}
                                @empty            
                                @endforelse
                            </select>
                        </div>        
                        <div class="form-group">
                            <label for="name">Doctor Name</label>
                            <select class="form-control selectpicker response" readonly id="doctor" name="doctor"  data-response="sub_category" required>
                                {{-- <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Doctor</option> --}}
                                @forelse ($doctors as $doctor)
                                    @if ($doctor->id == $user_doctor[0]->id)
                                        <option selected value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endif    
                                        {{-- <option value="{{ $doctor->id }}">{{ $doctor->name }}</option> --}}
                                @empty            
                                @endforelse
                            </select>
                        </div>
                    @endif
                    
            <div class="form-group">
                <label for="sub_title">Patient Name</label>
                <input type="hidden" readonly class="form-control" id="name" name="appointment_id" value="{{ $appointment->id }}" hidden>
                <input type="hidden" readonly class="form-control" id="name" name="patient_id" value="{{ $patient[0]->id }}" hidden>
                <input type="text"  readonly class="form-control" id="name"  value="{{ $patient[0]->name }}" required>
            </div>
            <div class="form-group">
                <label for="sub_title">Appointment Date</label>
                <input type="date" readonly class="form-control" id="name" name="date" value="{{ $appointment->appointment_date }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" readonly class="form-control" id="email" value="{{ $patient[0]->email }}" >
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" readonly class="form-control" id="phone" value="{{ $patient[0]->phone }}" >
            </div>
            <div class="form-group">
                <label for="phone">Age</label>
                <input type="text" readonly class="form-control" id="age" value="{{ $patient[0]->age }}" >
            </div>
            <div class="form-group">
                <label for="name">Sex</label>
                <select class="form-control selectpicker response" id="sex" data-response="sex" readonly required>
                    {{-- <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose Sex</option> --}}
                    @if ($patient[0]->sex == 'male')
                        <option selected value="male">Male</option>
                        {{-- <option value="female">Female</option> --}}
                    @else
                        {{-- <option  value="male">Male</option> --}}
                        <option selected value="female">Female</option>
                    @endif  
                  </select>
            </div>
            <div class="form-group">
                <label for="address">Diagnosis</label>
                <textarea class="form-control" name="diagnosis" id="diagnosis" cols="30" rows="10"></textarea>
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
