@include('frontend.include.head_link')
<body id="top">
    @include('frontend.include.header')
<section class="section confirmation">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="confirmation-content text-center">
            <i class="icofont-check-circled text-lg text-color-2"></i>
            @if ($value == 1)
                <h2 class="mt-3 mb-4">Thank you for your appoinment</h2>
            @elseif ($value == 2)
                <h2 class="mt-3 mb-4">Thank you for Booking Room
            @elseif ($value == 3)
                <h2 class="mt-3 mb-4">Thank you for Booking Ambulance
            @else
              <h2 class="mt-3 mb-4">Thank you for Booking Online Consultation
            @endif
              <br>
              <p>We will contact with you soon.</p>
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