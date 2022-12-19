<!-- 
    Essential Scripts
    =====================================-->
    <script src="{{ asset('assets/FrontEnd/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/FrontEnd/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/FrontEnd/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/FrontEnd/plugins/shuffle/shuffle.min.js') }}"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="{{ asset('assets/FrontEnd/plugins/google-map/gmap.js') }}"></script>
    
    <script src="{{ asset('assets/FrontEnd/js/script.js') }}"></script>

    <script src="{{asset('assets/BackEnd/js/toastr.min.js')}}"></script>
    <script>
        toastr.options = {"debug": false, "positionClass": "toast-top-left", "onclick": null, "fadeIn": 300, "fadeOut": 1000, "timeOut": 5000, "extendedTimeOut": 1000};
        @if(Session::has('success'))toastr.success("{{Session::get('success')}}");@endif
        @if(Session::has('error'))toastr.error("{{Session::get('error')}}");@endif
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-title="tooltip"]').tooltip();
        });
    </script>
    