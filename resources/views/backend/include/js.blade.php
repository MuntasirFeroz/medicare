<script src="{{asset('assets/BackEnd/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/BackEnd/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/misc.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/dashboard.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/todolist.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/custom.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/chart.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/file-upload.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/bootstrap-select.min.js')}}"></script>
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
