<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/BackEnd/images/user/' . Auth::user()->image)}}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                    <span class="text-secondary text-small">{{Auth::user()->role}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </div>
        </li>
        <li class="collapsed active" style="margin-left: 34px;cursor: pointer;display: none">
            <a onclick="holdCollapse();" data-toggle="collapse" data-target="#accounting" class="dropdown-toggle  collapsed">Accounting </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
    <!----------------- ADMIN ------------------------>
        @if (Auth::user()->role == 'admin')
            <li class="nav-item" @yield('users')">
                <a class="nav-link" data-toggle="collapse" href="#user-basic" @if(View::hasSection('users')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ui-basic">
                    <span class="menu-title">User's</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('users-show')" id="user-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('users-create')" href="{{route('user.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('users-index')" href="{{route('user.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @yield('employees-departments')">
                <a class="nav-link" data-toggle="collapse" href="#employees-departments-basic" @if(View::hasSection('employees-departments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="employees-departments-basic">
                    <span class="menu-title">Employee's & Dept's</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi  mdi-hospital-building menu-icon"></i>
                </a>
                <div class="collapse @yield('employees-departments-show')" id="employees-departments-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item @yield('doctor')">
                            <a class="nav-link" data-toggle="collapse" href="#doctor-basic" @if(View::hasSection('doctor')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="doctor-basic">
                                <span class="menu-title">Doctors's</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('doctor-show')" id="doctor-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link @yield('doctor-create')" href="{{ route('backend.doctor.create') }}">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('doctor-index')" href="{{ route('backend.doctor.index') }}">Index</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item @yield('department')">
                            <a class="nav-link" data-toggle="collapse" href="#grade-basic" @if(View::hasSection('department')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="head-basic">
                                <span class="menu-title">Department</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('department-show')" id="grade-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('department-create')" href="{{ route('backend.department.create') }}">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('department-index')" href="{{ route('backend.department.index') }}">Index</a></li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item @yield('zone')">
                            <a class="nav-link" data-toggle="collapse" href="#zone-basic" @if(View::hasSection('zone')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="zone-basic">
                                <span class="menu-title">Zone</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('zone-show')" id="zone-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('zone-create')" href="#">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('zone-index')" href="#">Index</a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('accomodations')">
                <a class="nav-link" data-toggle="collapse" href="#accomodations-basic" @if(View::hasSection('accomodations')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="accomodations-basic">
                    <span class="menu-title">Accomodations</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hotel menu-icon"></i>
                </a>
                <div class="collapse @yield('accomodations-show')" id="accomodations-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('accomodations-create')" href="{{route('accomodation.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('accomodations-index')" href="{{route('accomodation.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('rooms')">
                <a class="nav-link" data-toggle="collapse" href="#rooms-basic" @if(View::hasSection('rooms')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="rooms-basic">
                    <span class="menu-title">Rooms</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hotel menu-icon"></i>
                </a>
                <div class="collapse @yield('rooms-show')" id="rooms-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('rooms-create')" href="{{route('room.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('rooms-index')" href="{{route('room.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('room_bookings')">
                <a class="nav-link" data-toggle="collapse" href="#room_bookings-basic" @if(View::hasSection('room_bookings')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="room_bookings-basic">
                    <span class="menu-title">Room Booking</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hotel menu-icon"></i>
                </a>
                <div class="collapse @yield('room_bookings-show')" id="room_bookings-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('room_bookings-create')" href="{{route('room-booking.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('room_bookings-index')" href="{{route('room-booking.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('appointments')">
                <a class="nav-link" data-toggle="collapse" href="#appointment-basic" @if(View::hasSection('appointments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="appointments-basic">
                    <span class="menu-title">Appointments</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-calendar-clock menu-icon"></i>
                </a>
                <div class="collapse @yield('appointments-show')" id="appointment-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('appointments-create')" href="{{route('backend.appointment.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('appointments-index')" href="{{route('backend.appointment.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('patient')">
                <a class="nav-link" data-toggle="collapse" href="#patient-basic" @if(View::hasSection('patients')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="patients-basic">
                    <span class="menu-title">Patient</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('patients-show')" id="patient-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('patients-create')" href="{{route('backend.patient.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('patients-index')" href="{{route('backend.patient.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('tests')">
                <a class="nav-link" data-toggle="collapse" href="#tests" @if(View::hasSection('tests')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="tests-basic">
                    <span class="menu-title">Tests</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                </a>
                <div class="collapse @yield('tests-show')" id="tests">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @yield('tests-create')" href="{{route('backend.test.create')}}">Create</a></li>
                        <li class="nav-item"> <a class="nav-link @yield('tests-index')" href="{{route('backend.test.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('test-results')">
                <a class="nav-link" data-toggle="collapse" href="#test-results" @if(View::hasSection('test-results')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="test-results-basic">
                    <span class="menu-title">Test Results</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                </a>
                <div class="collapse @yield('test-results-show')" id="test-results">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @yield('test-results-create')" href="{{route('backend.test_result.create')}}">Create</a></li>
                        <li class="nav-item"> <a class="nav-link @yield('test-results-index')" href="{{route('backend.test_result.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('ambulances')">
                <a class="nav-link" data-toggle="collapse" href="#ambulances-basic" @if(View::hasSection('ambulances')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ambulances-basic">
                    <span class="menu-title">Ambulances</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-ambulance menu-icon"></i>
                </a>
                <div class="collapse @yield('ambulances-show')" id="ambulances-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('ambulances-create')" href="{{route('ambulance.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('ambulances-index')" href="{{route('ambulance.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('ambulance-bookings')">
                <a class="nav-link" data-toggle="collapse" href="#ambulance-bookings-basic" @if(View::hasSection('ambulance-bookings')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ambulance-bookings-basic">
                    <span class="menu-title">Ambulance Booking</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-ambulance menu-icon"></i>
                </a>
                <div class="collapse @yield('ambulance-bookings-show')" id="ambulance-bookings-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('ambulance-bookings-create')" href="{{route('backend.ambulance_booking.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('ambulance-bookings-index')" href="{{route('backend.ambulance_booking.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('contact_messages')">
                <a class="nav-link" data-toggle="collapse" href="#contact_messages" @if(View::hasSection('contact_messages')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ui-basic">
                    <span class="menu-title">Messages</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-message-text menu-icon"></i>
                </a>
                <div class="collapse @yield('contact_messages-show')" id="contact_messages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @yield('contact_messages-index')" href="{{route('contact.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
    <!----------------- Hospital ------------------------>
        @elseif (Auth::user()->role == 'hospital')
            <li class="nav-item @yield('employees-departments')">
                <a class="nav-link" data-toggle="collapse" href="#employees-departments-basic" @if(View::hasSection('employees-departments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="employees-departments-basic">
                    <span class="menu-title">Employee's & Dept's</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('employees-departments-show')" id="employees-departments-basic">
                    <ul class="nav flex-column sub-menu">
                        {{-- <li class="nav-item @yield('employee')">
                            <a class="nav-link" data-toggle="collapse" href="#employee-basic" @if(View::hasSection('employee')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ui-basic">
                                <span class="menu-title">Employee's</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('employee-show')" id="employee-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link @yield('employee-create')" href="#">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('employee-index')" href="#">Index</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        <li class="nav-item @yield('department')">
                            <a class="nav-link" data-toggle="collapse" href="#grade-basic" @if(View::hasSection('department')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="head-basic">
                                <span class="menu-title">Department</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('department-show')" id="grade-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('department-create')" href="{{ route('backend.department.create') }}">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('department-index')" href="{{ route('backend.department.index') }}">Index</a></li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item @yield('zone')">
                            <a class="nav-link" data-toggle="collapse" href="#zone-basic" @if(View::hasSection('zone')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="zone-basic">
                                <span class="menu-title">Zone</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('zone-show')" id="zone-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('zone-create')" href="#">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('zone-index')" href="#">Index</a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('patient')">
                <a class="nav-link" data-toggle="collapse" href="#patient-basic" @if(View::hasSection('patients')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="patients-basic">
                    <span class="menu-title">Patient</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('patients-show')" id="patient-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('patients-create')" href="{{route('backend.patient.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('patients-index')" href="{{route('backend.patient.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>  
            <li class="nav-item" @yield('rooms')">
                <a class="nav-link" data-toggle="collapse" href="#rooms-basic" @if(View::hasSection('rooms')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="rooms-basic">
                    <span class="menu-title">Rooms</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hotel menu-icon"></i>
                </a>
                <div class="collapse @yield('rooms-show')" id="rooms-basic">
                    <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"> <a class="nav-link @yield('rooms-create')" href="{{route('room.create')}}">Create</a></li> --}}
                            <li class="nav-item"> <a class="nav-link @yield('rooms-index')" href="{{route('room.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('room_bookings')">
                <a class="nav-link" data-toggle="collapse" href="#room_bookings-basic" @if(View::hasSection('room_bookings')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="room_bookings-basic">
                    <span class="menu-title">Room Booking</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hotel menu-icon"></i>
                </a>
                <div class="collapse @yield('room_bookings-show')" id="room_bookings-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('room_bookings-create')" href="{{route('room-booking.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('room_bookings-index')" href="{{route('room-booking.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('appointments')">
                <a class="nav-link" data-toggle="collapse" href="#appointment-basic" @if(View::hasSection('appointments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="appointments-basic">
                    <span class="menu-title">Appointments</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-calendar-clock menu-icon"></i>
                </a>
                <div class="collapse @yield('appointments-show')" id="appointment-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('appointments-create')" href="{{route('backend.appointment.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('appointments-index')" href="{{route('backend.appointment.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('test-results')">
                <a class="nav-link" data-toggle="collapse" href="#test-results" @if(View::hasSection('test-results')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="test-results-basic">
                    <span class="menu-title">Test Results</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                </a>
                <div class="collapse @yield('test-results-show')" id="test-results">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @yield('test-results-create')" href="{{route('backend.test_result.create')}}">Create</a></li>
                        <li class="nav-item"> <a class="nav-link @yield('test-results-index')" href="{{route('backend.test_result.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('ambulances')">
                <a class="nav-link" data-toggle="collapse" href="#ambulances-basic" @if(View::hasSection('ambulances')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ambulances-basic">
                    <span class="menu-title">Ambulances</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-ambulance menu-icon"></i>
                </a>
                <div class="collapse @yield('ambulances-show')" id="ambulances-basic">
                    <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"> <a class="nav-link @yield('ambulances-create')" href="{{route('ambulance.create')}}">Create</a></li> --}}
                            <li class="nav-item"> <a class="nav-link @yield('ambulances-index')" href="{{route('ambulance.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('ambulance-bookings')">
                <a class="nav-link" data-toggle="collapse" href="#ambulance-bookings-basic" @if(View::hasSection('ambulance-bookings')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ambulance-bookings-basic">
                    <span class="menu-title">Ambulance Booking</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-ambulance menu-icon"></i>
                </a>
                <div class="collapse @yield('ambulance-bookings-show')" id="ambulance-bookings-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('ambulance-bookings-create')" href="{{route('backend.ambulance_booking.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('ambulance-bookings-index')" href="{{route('backend.ambulance_booking.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('contact_messages')">
                <a class="nav-link" data-toggle="collapse" href="#contact_messages" @if(View::hasSection('contact_messages')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ui-basic">
                    <span class="menu-title">Messages</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-message-text menu-icon"></i>
                </a>
                <div class="collapse @yield('contact_messages-show')" id="contact_messages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @yield('contact_messages-index')" href="{{route('contact.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            
    <!----------------- Doctor ------------------------>  
        @elseif (Auth::user()->role == 'doctor')
            <li class="nav-item @yield('employees-departments')">
                <a class="nav-link" data-toggle="collapse" href="#employees-departments-basic" @if(View::hasSection('employees-departments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="employees-departments-basic">
                    <span class="menu-title">My Account</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi  mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('employees-departments-show')" id="employees-departments-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item @yield('doctor')">
                            <a class="nav-link" data-toggle="collapse" href="#doctor-basic" @if(View::hasSection('doctor')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="doctor-basic">
                                <span class="menu-title">Profile</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('doctor-show')" id="doctor-basic">
                                <ul class="nav flex-column sub-menu">
                                    @php
                                        $doctor=App\Doctor::where('user_id',Auth::user()->id)->get(); 
                                    @endphp
                                    <li class="nav-item"> <a class="nav-link @yield('doctor-myaccount-show')" href="{{ route('doctor.show',$doctor[0]->id) }}">View</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('doctor-myaccount-edit')" href="{{ route('doctor.edit',$doctor[0]->id) }}">Edit</a></li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item @yield('department')">
                            <a class="nav-link" data-toggle="collapse" href="#grade-basic" @if(View::hasSection('department')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="head-basic">
                                <span class="menu-title">Department</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('department-show')" id="grade-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('department-create')" href="{{ route('backend.department.create') }}">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('department-index')" href="{{ route('backend.department.index') }}">Index</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item @yield('zone')">
                            <a class="nav-link" data-toggle="collapse" href="#zone-basic" @if(View::hasSection('zone')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="zone-basic">
                                <span class="menu-title">Zone</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('zone-show')" id="zone-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('zone-create')" href="#">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('zone-index')" href="#">Index</a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </li>   
            <li class="nav-item" @yield('appointments')">
                <a class="nav-link" data-toggle="collapse" href="#appointment-basic" @if(View::hasSection('appointments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="appointments-basic">
                    <span class="menu-title">Appointments</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-calendar-clock menu-icon"></i>
                </a>
                <div class="collapse @yield('appointments-show')" id="appointment-basic">
                    <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"> <a class="nav-link @yield('appointments-create')" href="{{route('backend.appointment.create')}}">Create</a></li> --}}
                            <li class="nav-item"> <a class="nav-link @yield('appointments-index')" href="{{route('backend.appointment.myappointment')}}">History</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('patient')">
                <a class="nav-link" data-toggle="collapse" href="#patient-basic" @if(View::hasSection('patients')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="patients-basic">
                    <span class="menu-title">Patient</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('patients-show')" id="patient-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('patients-create')" href="{{route('backend.patient.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('patients-index')" href="{{route('backend.patient.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('schedules')">
                <a class="nav-link" data-toggle="collapse" href="#schedules-basic" @if(View::hasSection('schedules')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="schedules-basic">
                    <span class="menu-title">My Schedule</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-calendar-clock menu-icon"></i>
                </a>
                <div class="collapse @yield('schedules-show')" id="schedules-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('schedules-create')" href="{{route('backend.schedule.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('schedules-index')" href="{{route('backend.schedule.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('consultations')">
                <a class="nav-link" data-toggle="collapse" href="#consultations-basic" @if(View::hasSection('consultations')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="consultations-basic">
                    <span class="menu-title">Consultation</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-calendar-clock menu-icon"></i>
                </a>
                <div class="collapse @yield('consultations-show')" id="consultations-basic">
                    <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"> <a class="nav-link @yield('appointments-create')" href="{{route('backend.appointment.create')}}">Create</a></li> --}}
                            <li class="nav-item"> <a class="nav-link @yield('consultations-index')" href="{{route('backend.consultation.index')}}">History</a></li>
                    </ul>
                </div>
            </li>
    <!----------------- Patient ------------------------>
        @elseif (Auth::user()->role == 'patient')
            <li class="nav-item @yield('employees-departments')">
                <a class="nav-link" data-toggle="collapse" href="#employees-departments-basic" @if(View::hasSection('employees-departments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="employees-departments-basic">
                    <span class="menu-title">My Account</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi  mdi-account menu-icon"></i>
                </a>
                <div class="collapse @yield('employees-departments-show')" id="employees-departments-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item @yield('doctor')">
                            <a class="nav-link" data-toggle="collapse" href="#doctor-basic" @if(View::hasSection('doctor')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="doctor-basic">
                                <span class="menu-title">Profile</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('doctor-show')" id="doctor-basic">
                                <ul class="nav flex-column sub-menu">
                                    @php
                                        $patient=App\Patient::where('user_id',Auth::user()->id)->get(); 
                                    @endphp
                                    <li class="nav-item"> <a class="nav-link @yield('doctor-myaccount-show')" href="{{ route('patient.show',$patient[0]->id) }}">View</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('doctor-myaccount-edit')" href="{{ route('patient.edit',$patient[0]->id) }}">Edit</a></li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item @yield('department')">
                            <a class="nav-link" data-toggle="collapse" href="#grade-basic" @if(View::hasSection('department')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="head-basic">
                                <span class="menu-title">Department</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('department-show')" id="grade-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('department-create')" href="{{ route('backend.department.create') }}">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('department-index')" href="{{ route('backend.department.index') }}">Index</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item @yield('zone')">
                            <a class="nav-link" data-toggle="collapse" href="#zone-basic" @if(View::hasSection('zone')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="zone-basic">
                                <span class="menu-title">Zone</span><i class="menu-arrow"></i>
                            </a>
                            <div class="collapse @yield('zone-show')" id="zone-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link  @yield('zone-create')" href="#">Create</a></li>
                                    <li class="nav-item"> <a class="nav-link @yield('zone-index')" href="#">Index</a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </li>   
            <li class="nav-item" @yield('appointments')">
                <a class="nav-link" data-toggle="collapse" href="#appointment-basic" @if(View::hasSection('appointments')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="appointments-basic">
                    <span class="menu-title">Appointments</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-calendar-clock menu-icon"></i>
                </a>
                <div class="collapse @yield('appointments-show')" id="appointment-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('appointments-create')" href="{{route('backend.appointment.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('appointments-index')" href="{{route('backend.appointment.myappointment')}}">History</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('test-results')">
                <a class="nav-link" data-toggle="collapse" href="#test-results" @if(View::hasSection('test-results')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="test-results-basic">
                    <span class="menu-title">MY Tests</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                </a>
                <div class="collapse @yield('test-results-show')" id="test-results">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link @yield('test-results-index')" href="{{route('backend.test_result.index')}}">History</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('room_bookings')">
                <a class="nav-link" data-toggle="collapse" href="#room_bookings-basic" @if(View::hasSection('room_bookings')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="room_bookings-basic">
                    <span class="menu-title">Room Booking</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hotel menu-icon"></i>
                </a>
                <div class="collapse @yield('room_bookings-show')" id="room_bookings-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('room_bookings-create')" href="{{route('room-booking.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('room_bookings-index')" href="{{route('room-booking.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item" @yield('ambulance-bookings')">
                <a class="nav-link" data-toggle="collapse" href="#ambulance-bookings-basic" @if(View::hasSection('ambulance-bookings')) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="ambulance-bookings-basic">
                    <span class="menu-title">Ambulance Booking</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-ambulance menu-icon"></i>
                </a>
                <div class="collapse @yield('ambulance-bookings-show')" id="ambulance-bookings-basic">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link @yield('ambulance-bookings-create')" href="{{route('backend.ambulance_booking.create')}}">Create</a></li>
                            <li class="nav-item"> <a class="nav-link @yield('ambulance-bookings-index')" href="{{route('backend.ambulance_booking.index')}}">History</a></li>
                    </ul>
                </div>
            </li>   
        @endif
        
       
    </ul>
</nav>
