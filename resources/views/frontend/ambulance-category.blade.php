@include('frontend.include.head_link')
@section('ambulance','active')
<body id="top">
    @include('frontend.include.header')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">All Ambulances</span>
                        <h1 class="text-capitalize mb-5 text-lg">Ambulances Category</h1>

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
                        <h2>Ambulance Facilities for patient </h2>
                        <div class="divider mx-auto my-4"></div>
                        <p> Patient Within Dhaka Region can choose Vechile Ambulance And Air Ambulance is Within Bangladesh </p>
                    </div>
                </div>
            </div>

            <div class="row">
                
            
                
                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                        <img src="{{ asset('assets/FrontEnd/images/ambulance/a-1.png') }} " alt="" class="img-fluid w-100">
                        <div class="content">
                            @php
                                $available_car_count=App\Ambulance::where('type','car')
                                ->where('dispatched',0)   
                                ->count();
                                $ambulance_car=App\Ambulance::where('type','car')->get();
                            @endphp
                            <h4 class="mt-4 mb-2 title-color">
                                Vechile Ambulance
                                <a href="#" class="text-warning">
                                    <p class="font-weight-bold">Tk {{ $ambulance_car[0]->cost }}</p>
                                </a>
                                
                                <h6 class="mt-2 mb-3"> Available Seat: {{ $available_car_count }}</h6>
                            </h4>

                            <a href="{{ route('frontend.ambulance_book') }}" class="read-more"><button type="button"
                                    class="btn btn-main-2 btn-round-full">Book Now</button><i
                                    class="icofont-simple-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                        <img src="{{ asset('assets/FrontEnd/images/ambulance/a-2.png') }} " alt="" class="img-fluid w-100">
                        <div class="content">
                            @php
                                $available_heli_count=App\Ambulance::where('type','air')
                                ->where('dispatched',0)   
                                ->count();
                                $ambulance_heli=App\Ambulance::where('type','air')->get();
                            @endphp
                            <h4 class="mt-4 mb-2 title-color">
                                Helicopter Ambulance
                                <a href="#" class="text-warning">
                                    <p class="font-weight-bold">Tk {{ $ambulance_heli[0]->cost }}</p>
                                </a>
                                
                                <h6 class="mt-2 mb-3"> Available Seat: {{ $available_heli_count }}</h6>
                            </h4>

                            <a href="{{ route('frontend.ambulance_book') }}" class="read-more"><button type="button"
                                    class="btn btn-main-2 btn-round-full">Book Now</button><i
                                    class="icofont-simple-right ml-2"></i></a>
                        </div>
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
