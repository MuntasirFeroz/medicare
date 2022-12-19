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
          <span class="text-white">Book Ambulance</span>
          <h1 class="text-capitalize mb-5 text-lg">Ambulance</h1>

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
            <h2 class="mb-2 title-color">Book Ambulance</h2>
            <p class="mb-4">Vechile Ambulance Service Within Only Dhaka Region And Air Ambulance is Within Bangladesh </p>
            {!! Form::open(['class' =>'form-sample','route' => 'ambulances.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control selectpicker response" id="type" name="type" data-response="ambulance_type" required>
                                    <option >Choose Ambulance Type</option>
                                    <option value="car">Car Ambulance</option>
                                    <option value="air">Air Ambulance</option>  
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control selectpicker response" id="ambulance_id" name="ambulance_id" data-response="ambulance" required>
                                    <option>Choose a Ambulance</option>  
                                </select>
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy" required>
                            </div>
                        </div>

                         <div class="col-lg-12">
                            <div class="form-group">
                                <input name="patient" id="name" type="text" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder=" Email" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="address" id="address" class="form-control" rows="6" placeholder="Patient Address" required></textarea>
                    </div>

                    {{-- <a class="btn btn-main btn-round-full" type="submit">Make Appoinment<i class="icofont-simple-right ml-2"></i></a> --}}
                    <button type="submit" class="btn btn-main btn-round-full">Book Ambulance<i class="icofont-simple-right ml-2"></i></button>
                {!! Form::close() !!}
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
<script>
    function _(x){
        return document.getElementById(x);
    }
    $(document).on('change','.response',function(){
        let value = $(this).val();
        let response = $(this).data('response');

        if(response == 'ambulance_type'){
            $.ajax({
                url : '/ambulances-find/' + value,
                method : 'GET',
                success : function(data){
                    if(data.length === 0){
                        toastr.error("Ambulances is Not Available");
                        $('#ambulance_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Ambulance</option>');
                        // refresh();
                    }else{
                        toastr.success("Ambulances is Available");
                        $('#ambulance_id').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Ambulance</option>');
                        jQuery.each( data, function( item, element ) {
                            $('#ambulance_id').append("<option value='" + element['id'] + "'>"+ element['name']+"</option>");
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

    function refresh(){
        $('.selectpicker').selectpicker('refresh');
    }
    function loadImg(id){
        $('#frame_'+id).attr('src', URL.createObjectURL(event.target.files[0]));
    }
</script> 
</body>
</html> 