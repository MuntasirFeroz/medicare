@include('frontend.include.head_link')
@section('packages', 'active')

<body id="top">
    @include('frontend.include.header')

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Our All Packages</span>
                        <h1 class="text-capitalize mb-5 text-lg"> Health Packages</h1>

                        <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Department</a></li>
          </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section service-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <h2>Health Packages Facilities for patient </h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>Patient can view their own Health Packages based on their budget</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                        <img src="{{ asset('assets/FrontEnd/images/packages/package1.jpg') }}" alt="" class="img-fluid w-100">
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Pre-marital Check-up Program
                                <a href="#" class="text-warning">
                                    <p class="font-weight-bold">Tk 500</p>
                                </a>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="department-block mb-5 justify-content-center">
                        <ul>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Hepatities Screeening</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Bllod group and Rh</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Anti HIV 1+2</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Haemoglobin Electrophesis</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> VDRL</span>
                            </li>
                        </ul>
                	</div>
            	</div>
			</div>
			
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="department-block mb-5">
                        <img src="{{ asset('assets/FrontEnd/images/packages/package2.jpg') }}" alt="" class="img-fluid w-100">
                        <div class="content">
                            <h4 class="mt-4 mb-2  title-color">Regular Checkup Programmes
                                <a href="#" class="text-warning">
                                    <p class="font-weight-bold">$150</p>
                                </a>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                        <ul>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Complete Blood Cell (CBC)</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Bllod group and Rh</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Uric Acid</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Haemoglobin Electrophesis</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Urine Routine Examination</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Chest X-Ray</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Fasting Blood Sugar</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="department-block mb-5">
                        <img src="{{ asset('assets/FrontEnd/images/packages/package3.jpg') }}" alt="" class="img-fluid w-100">
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Comprehensive check up programmes ( over 40)
                                <a href="#" class="text-warning">
                                    <p class="font-weight-bold">$350</p>
                                </a>
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                        <ul>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Complete Blood Cell (CBC)</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Bllod group and Rh</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span>Fasting Sugar Test</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Haemoglobin Electrophesis</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> VDRL</span>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Tumer Markers</span>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="{{ asset('assets/FrontEnd/images/check.png') }}" alt="">
                                <span> Liver Function Test</span>
                            </li>
                        </ul>
                    </div>
                </div>      
            </div> 
		</div>
    </section>
	
    <!-- footer Start -->
    <!-- footer Start -->
    @include('frontend.include.footer')

    @include('frontend.include.js')
</body>

</html>
