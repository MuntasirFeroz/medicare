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
          <span class="text-white">Book your Room</span>
          <h1 class="text-capitalize mb-5 text-lg">Book Room</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Book your Seat</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h2 class="text-color mt-3">+01750041553 </h2>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Book A Room Now</h2>
            <p class="mb-4">Patient can  book their room from online based on their buddget </p>
               {!! Form::open(['class' =>'form-sample','route' => 'book-room.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                                @php
                                    $accomodations=App\Accomodation::orderBy('id','DESC')->get();
                                 @endphp 
                                <select class="form-control response" id="accomodation" name="accomodation" data-response="accomodation" required>
                                    <option>Choose Room</option>
                                    @foreach ( $accomodations as $accomodation)
                                        @if ($accomodation->id == $selected_id)
                                            <option selected value='{{ $accomodation->id }}'>{{ $accomodation->name }}</option>
                                        @else
                                            <option value='{{ $accomodation->id }}'>{{ $accomodation->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control selectpicker response" id="room_no" name="room_no" data-response="room" required>
                                    <option>Choose a Room No</option>  
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control selectpicker response" id="seat_id" name="seat_id" data-response="seat" required>
                                    <option>Choose a Seat No</option>  
                                </select>
                            </div>

                        </div>
            


                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="date" id="date" type="date" class="form-control" placeholder=" dd/mm/yyyy" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="time" id="time" type="time" class="form-control" placeholder="Time" required>
                            </div> 
                       </div>
            
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="patient" id="patient" type="text" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="text" class="form-control" placeholder="Email" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-main btn-round-full">Book Now<i class="icofont-simple-right ml-2"></i></button>
                    

                    </div>
                </div>

                    {!! Form::close() !!}
        </div>
    </div>
</div>
    
</section>


  <!-- footer Start -->
    <!-- footer Start -->
    @include('frontend.include.footer')

    @include('frontend.include.js')
    <script>
        function _(x){
            return document.getElementById(x);
        }
        
        function getValue(){
            let value = $('#accomodation').val();
            let response = $('#accomodation').data('response');
            if(response == 'accomodation'){
                $.ajax({
                    url : '/book-room-find/' + value,
                    method : 'GET',
                    success : function(data){
                        if(data.length === 0){
                            toastr.error("Room is Not Available");
                            $('#room_no').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Room</option>');
                            // refresh();
                        }else{
                            toastr.success("Room is Available");
                            $('#room_no').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Room</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#room_no').append("<option value='" + element['room_no'] + "'>"+ element['room_no']+"</option>");
                            });
                            // refresh();
                        }
                    }
                });
            }
        }
        getValue();

        $(document).on('change','.response',function(){
            let value = $(this).val();
            let response = $(this).data('response');

            if(response == 'accomodation'){
                $.ajax({
                    url : '/book-room-find/' + value,
                    method : 'GET',
                    success : function(data){
                        if(data.length === 0){
                            toastr.error("Room is Not Available");
                            $('#room_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Room</option>');
                            // refresh();
                        }else{
                            toastr.success("Room is Available");
                            $('#room_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Room</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#room_id').append("<option value='" + element['room_no'] + "'>"+ element['room_no']+"</option>");
                            });
                            // refresh();
                        }
                    }
                });
            }
            else if(response == 'room')
            {
                $.ajax({
                    url : '/book-room-seat-find/' + value,
                    method : 'GET',
                    success : function(data){
                        // console.log(data)
                        if(data.length === 0){
                            toastr.error("Seat is Not Available");
                            $('#seat_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Seat No</option>');
                            // refresh();
                        }else{
                            toastr.success("Seat is Available");
                            $('#seat_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Seat No</option>');
                            jQuery.each( data, function( item, element ) {
                                $('#seat_id').append("<option value='" + element['id'] + "'>"+ element['seat_no']+"</option>");
                            });
                            // refresh();
                        }
                    }
                });
            }
            else if(response == 'ambulance')
            {   
                console.log(value)
                if(value != null)
                {
                    $('#ambulance_id').attr('type','sybmit')
                }
                    
            }
        });

        // function refresh(){
        //     $('.selectpicker').selectpicker('refresh');
        // }
        // function loadImg(id){
        //     $('#frame_'+id).attr('src', URL.createObjectURL(event.target.files[0]));
        // }
    </script>
</body>

</html>