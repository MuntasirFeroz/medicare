<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@email.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Mirpur-12,Dhaka,Bangladesh </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+017-50041553">
							<span>Call Now : </span>
							<span class="h4">01750041553</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="index-2.html">
				<img src="assets/FrontEnd/images/logo.png" alt="" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item @yield('home')"><a class="nav-link" href="{{ route('frontend.home') }}">Home</a></li>
					{{-- <li class="nav-item "><a class="nav-link" href="{{ route('frontend.appointment') }}">Appointment</a></li> --}}
					<li class="nav-item @yield('about')"><a class="nav-link" href="{{ route('frontend.about') }}">About</a></li>
					<li class="nav-item @yield('service')"><a class="nav-link" href="{{ route('frontend.services') }}">Services</a></li>
					<li class="nav-item @yield('packages')"><a class="nav-link" href="{{ route('frontend.packages') }}">Packages</a></li>
					<li class="nav-item @yield('consultation')"><a class="nav-link" href="{{ route('frontend.consultation') }}">Online Consultation</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle @yield('booking')" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
							<li><a class="dropdown-item" href="{{ route('frontend.appointment') }}">Appointment</a></li>
							<li><a class="dropdown-item" href="{{ route('frontend.roomcategory') }}">Accomodation</a></li>
						</ul>
					  </li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle @yield('department')" href="department.html" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Department <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
							{{-- <li><a class="dropdown-item" href="department.html">Departments</a></li> --}}
							@php
								$departments=App\Department::orderBy('id','DESC')->get();
							@endphp

							@foreach ( $departments as $department)
								<li><a class="dropdown-item" href="{{ route('frontend.department_single',$department->id) }}">{{ $department->department_name }}</a></li>
							@endforeach
							
                    
							{{-- <li class="dropdown dropdown-submenu dropright">
								<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
			
								<ul class="dropdown-menu" aria-labelledby="dropdown0301">
									<li><a class="dropdown-item" href="index-2.html">Submenu 01</a></li>
									<li><a class="dropdown-item" href="index-2.html">Submenu 02</a></li>
								</ul>
							</li> --}}
						</ul>
					</li>

					{{-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="doctor.html" id="dropdown03" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown03">
							<li><a class="dropdown-item" href="doctor.html">Doctors</a></li>
							<li><a class="dropdown-item" href="doctor-single.html">Doctor Single</a></li>
							<li><a class="dropdown-item" href="appoinment.html">Appoinment</a></li>

							<li class="dropdown dropdown-submenu dropleft">
								<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
			
								<ul class="dropdown-menu" aria-labelledby="dropdown0501">
									<li><a class="dropdown-item" href="index-2.html">Submenu 01</a></li>
									<li><a class="dropdown-item" href="index-2.html">Submenu 02</a></li>
								</ul>
							</li>
						</ul>
					</li> --}}

					{{-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>
							<li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
						</ul>
					</li> --}}
					<li class="nav-item @yield('ambulance')"><a class="nav-link" href="{{ route('frontend.ambulance') }}">Ambulance</a></li>
					<li class="nav-item @yield('contact')"><a class="nav-link" href="{{ route('contact-us.index') }}">Contact</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
