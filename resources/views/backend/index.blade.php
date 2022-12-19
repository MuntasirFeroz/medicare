@extends('backend.master')
@section('title',' | DashBoard')
@section('content')
    @if (Auth::user()->role == 'admin')
        <div class="row">

            <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Users <i class="mdi mdi-account mdi-24px float-right"></i>
                        </h4>
                       @php
                           $user_count=App\User::count();
                       @endphp
                        <h2 class="mb-5">{{ $user_count }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Doctor <i class="mdi mdi-account mdi-24px float-right"></i>
                        </h4>
                        @php
                           $doctor_count=App\Doctor::count();
                        @endphp
                        <h2 class="mb-5">{{ $doctor_count}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
                <div class="card bg-gradient-dark card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Patient<i class="mdi mdi-account mdi-24px float-right"></i>
                        </h4>
                        @php
                           $patient_count=App\Patient::count();
                        @endphp
                        {{-- <h2 class="mb-5">{{$sales}}</h2> --}}
                        <h2 class="mb-5">{{ $patient_count }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Test<i class="mdi mdi-clipboard-text mdi-24px float-right"></i>
                        </h4>
                        @php
                           $test_count=App\Test::count();
                        @endphp
                        <h2 class="mb-5">{{ $test_count }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
                <div class="card bg-gradient-dark card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Ambulance <i class="mdi mdi-ambulance mdi-24px float-right"></i>
                        </h4>
                        @php
                           $ambulance_count=App\Ambulance::count();
                        @endphp
                        <h2 class="mb-5">{{ $ambulance_count }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Accomodation<i class="mdi mdi-hotel mdi-24px float-right"></i>
                        </h4>
                        @php
                           $accomodation_count=App\Accomodation::count();
                        @endphp
                        <h2 class="mb-5">{{ $accomodation_count }}</h2>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="card-title">Current User's</h4>
                        <table class="table custom">
                            <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Image </th>
                                <th> Name </th>
                                <th> Role </th>
                                <th> Email </th>
                                <th> Phone </th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $users=App\User::orderBy('id','DESC')->paginate(5);
                                @endphp
                            @forelse($users as $user)
                                <tr class="text-center">
                                    <td>{{ ($users->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}</td>
                                    <td><img src="{{asset('assets/BackEnd/images/user/'.$user->image)}}" alt=""></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"><div class="text-danger"> No User Found</div></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 id="monthAndYear"></h3>
                        <div class="button-container-calendar">
                            <button id="previous" onclick="previous()">&#8249;</button>
                            <button id="next" onclick="next()">&#8250;</button>
                        </div>
                        <table class="table-calendar" id="calendar" data-lang="en">
                            <thead id="thead-month"></thead>
                            <tbody id="calendar-body"></tbody>
                        </table>
                        <div class="footer-container-calendar">
                            <label for="month">Jump To: </label>
                            <select id="month" onchange="jump()">
                                <option value=0>Jan</option>
                                <option value=1>Feb</option>
                                <option value=2>Mar</option>
                                <option value=3>Apr</option>
                                <option value=4>May</option>
                                <option value=5>Jun</option>
                                <option value=6>Jul</option>
                                <option value=7>Aug</option>
                                <option value=8>Sep</option>
                                <option value=9>Oct</option>
                                <option value=10>Nov</option>
                                <option value=11>Dec</option>
                            </select>
                            <select id="year" onchange="jump()"></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    @elseif (Auth::user()->role == 'hospital')
    <div class="row">

        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Messages <i class="mdi mdi-message-text mdi-24px float-right"></i>
                    </h4>
                   @php
                       $contact_count=App\Contact::count();
                   @endphp
                    <h2 class="mb-5">{{ $contact_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Doctor <i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    @php
                       $doctor_count=App\Doctor::count();
                    @endphp
                    <h2 class="mb-5">{{ $doctor_count}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Patient<i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    @php
                       $patient_count=App\Patient::count();
                    @endphp
                    {{-- <h2 class="mb-5">{{$sales}}</h2> --}}
                    <h2 class="mb-5">{{ $patient_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Test<i class="mdi mdi-clipboard-text mdi-24px float-right"></i>
                    </h4>
                    @php
                       $test_count=App\Test::count();
                    @endphp
                    <h2 class="mb-5">{{ $test_count }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Ambulance <i class="mdi mdi-ambulance mdi-24px float-right"></i>
                    </h4>
                    @php
                       $ambulance_count=App\Ambulance::count();
                    @endphp
                    <h2 class="mb-5">{{ $ambulance_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Accomodation<i class="mdi mdi-hotel mdi-24px float-right"></i>
                    </h4>
                    @php
                       $accomodation_count=App\Accomodation::count();
                    @endphp
                    <h2 class="mb-5">{{ $accomodation_count }}</h2>
                </div>
            </div>
        </div>
        
    </div>
  
    @elseif (Auth::user()->role == 'doctor')
    <div class="row">
        @php
            $doctor=App\Doctor::where('user_id',Auth::user()->id)->get();
            $appointment_count=App\Appointment::where('doctor_id',$doctor[0]->id)               
                                    ->count();
            $appointment_completed_count=App\Appointment::where('doctor_id',$doctor[0]->id)
                                    ->where('completed',1)                 
                                    ->count();
            $appointment_pending_count=App\Appointment::where('doctor_id',$doctor[0]->id)
                                    ->where('status',0)                 
                                    ->count();
        @endphp
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointments <i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                    </h4>
                   
                    <h2 class="mb-5">{{ $appointment_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointment Completed<i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                    </h4>
                   
                    <h2 class="mb-5">{{ $appointment_completed_count}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointment Pending<i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                    </h4>
                
                    {{-- <h2 class="mb-5">{{$sales}}</h2> --}}
                    <h2 class="mb-5">{{ $appointment_pending_count }}</h2>
                </div>
            </div>
        </div>
        
        
    </div>


    @elseif (Auth::user()->role == 'patient')
    <div class="row">
        @php
            $patient=App\Patient::where('user_id',Auth::user()->id)->get();
            $appointment_count=App\Appointment::where('email',$patient[0]->email)               
                                    ->count();
            $appointment_completed_count=App\Appointment::where('email',$patient[0]->email)
                                    ->where('completed',1)                 
                                    ->count();
            $appointment_pending_count=App\Appointment::where('email',$patient[0]->email)
                                    ->where('status',0)                 
                                    ->count();
        @endphp
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointments <i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                    </h4>
                   
                    <h2 class="mb-5">{{ $appointment_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointment Completed<i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                    </h4>
                   
                    <h2 class="mb-5">{{ $appointment_completed_count}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin card_design_custom_dashboard">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Appointment Pending<i class="mdi mdi-calendar-clock mdi-24px float-right"></i>
                    </h4>
                
                    {{-- <h2 class="mb-5">{{$sales}}</h2> --}}
                    <h2 class="mb-5">{{ $appointment_pending_count }}</h2>
                </div>
            </div>
        </div>
        
        
    </div>
    @endif
    



    <script src="{{asset('assets/js/calender.js')}}"></script>
@endsection

