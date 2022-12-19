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
          <span class="text-white">Book your Seat</span>
          <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>

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
            <h2 class="mb-2 title-color">Book an appoinment</h2>
            <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
            {!! Form::open(['class' =>'form-sample','route' => 'make-appointment.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                              @php
                                $departments=App\Department::orderBy('id','DESC')->get();
                              @endphp  
                              <select class="form-control response" id="department" name="department" data-response="department" required>
                                  <option>Choose Department</option>
                                  @foreach ( $departments as $department )
                                    <option value='{{ $department->id }}'>{{ $department->department_name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control response" id="doctor_name" name="doctor_name">
                                  <option>Select Doctors</option>
                                  
                                </select>
                                {{-- <select class="form-control selectpicker response" id="exampleFormControlSelect2" name="doctor_name"  data-response="sub_category" required>
                                  <option value="" disabled selected hidden style="select:invalid { color: gray; }">Choose a Doctor</option>
                              </select> --}}
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="time" id="time" type="time" class="form-control" placeholder="Time">
                            </div>
                        </div>
                         <div class="col-lg-12">
                            <div class="form-group">
                                <input name="patient" id="name" type="text" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder=" Email">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
                    </div>

                    {{-- <a class="btn btn-main btn-round-full" type="submit">Make Appoinment<i class="icofont-simple-right ml-2"></i></a> --}}
                    <button type="submit" class="btn btn-main btn-round-full">Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
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

      if(response == 'department'){
          $.ajax({
              url : '/make-appointment-department-doctor-find/' + value,
              method : 'GET',
              success : function(data){
                  if(data.length === 0){
                      toastr.error("Doctor Does Not Exist");
                      $('#doctor_name').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Doctor</option>');
                      // refresh();
                  }else{
                      $('#doctor_name').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Doctor</option>');
                      jQuery.each( data, function( item, element ) {
                          $('#doctor_name').append("<option value='" + element['id'] + "'>"+ element['name']+"</option>");
                      });
                      // refresh();
                  }
              }
          });
      }
  });

  // function refresh(){
  //     $('.selectpicker').selectpicker('refresh');
  // }
  function loadImg(id){
      $('#frame_'+id).attr('src', URL.createObjectURL(event.target.files[0]));
  }
</script>  
</body>
</html> 