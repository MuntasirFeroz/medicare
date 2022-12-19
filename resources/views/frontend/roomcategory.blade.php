@include('frontend.include.head_link')
@section('booking','active')
<body id="top">
    @include('frontend.include.header')
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">All Rooms</span>
                        <h1 class="text-capitalize mb-5 text-lg">Room Category</h1>

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
                        <h2>Room Facilities for patient </h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>Patient can choose their own room based on their budget</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @php
                     $accomodations =App\Accomodation::orderBy('id','DESC')->get();
                @endphp
            
                @forelse ( $accomodations as $accomodation)
                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                        <img src="{{ asset('assets/FrontEnd/images/accomodation/'.$accomodation->image) }} " alt="{{ $accomodation->name }} image" class="img-fluid w-100">
                        <div class="content">
                           
                            <h4 class="mt-4 mb-2 title-color">
                                {{ $accomodation->name }}
                                <a href="#" class="text-warning">
                                    <p class="font-weight-bold">Tk {{ $accomodation->cost }}</p>
                                </a>
                                @php
                                    $available_seats_count=App\Seat::where('accomodation_id',$accomodation->id)
                                    ->where('occupied',0)
                                    ->where('booked',0)        
                                    ->count();
                                @endphp
                                <h6 class="mt-2 mb-3"> Available Seat: {{ $available_seats_count }}</h6>
                            </h4>

                            <a href="{{ route('frontend.bookaccomodation',$accomodation->id) }}" class="read-more"><button type="button"
                                    class="btn btn-main-2 btn-round-full">Book Now</button><i
                                    class="icofont-simple-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 ">
                    <div class="department-block mb-5">
                    
                        <div class="content">  
                            <h4 class="mt-4 mb-2 title-color">No Rooms Exist</h4>
                        </div>
                    </div>
                </div>
                @endforelse
 
            </div>
        </div>
    </section>

    <!-- footer Start -->
    <!-- footer Start -->
    @include('frontend.include.footer')

    @include('frontend.include.js')
</body>

</html>
