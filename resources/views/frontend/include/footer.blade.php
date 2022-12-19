<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="assets/FrontEnd/images/logo.png" alt="" class="img-fluid">
					</div>
					<p>Medicare is an online platform that effortlessly connects
						doctors and patients, with online booking made simple.</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item">
							<a href="#"><i class="icofont-facebook"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#"><i class="icofont-twitter"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#"><i class="icofont-linkedin"></i></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Department</h4>
					<div class="divider mb-4"></div>
					@php
						$departments=App\Department::orderBy('id','DESC')->get();
					@endphp
					<ul class="list-unstyled footer-menu lh-35">
						@forelse ($departments as $department)
						<li><a class="dropdown-item" href="{{ route('frontend.department_single',$department->id) }}">{{ $department->department_name }}</a></li>
						@empty
							
						@endforelse
						{{-- <li><a href="#!">Surgery </a></li>
						<li><a href="#!">Wome's Health</a></li>
						<li><a href="#!">Radiology</a></li>
						<li><a href="#!">Cardioc</a></li>
						<li><a href="#!">Medicine</a></li> --}}
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Pages</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="{{ route('frontend.home') }}">Home </a></li>
						<li><a href="{{ route('frontend.about') }}">About</a></li>
						<li><a href="{{ route('frontend.services') }}">Services</a></li>
						<li><a href="{{ route('frontend.ambulance') }}">Ambulance</a></li>
						<li><a href="{{ route('contact-us.index') }}">Contact</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Get in Touch</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="mailto:support@email.com">Support@email.com</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+tel:+017-50041553">01750041553</a></h4>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						Copyright &copy; 2022
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email address" required>
							<button type="submit" class="btn btn-main-2 btn-round-full">Subscribe</button>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop scroll-top-to" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>