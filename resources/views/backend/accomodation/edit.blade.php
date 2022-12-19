@extends('backend.master')
@section('title', ' | Accomodation')
@section('accomodations','active') @section('accomodations-show','show')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['accomodation.update',$edit->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i class="mdi  mdi-hotel"></i></span> Update Accomodation</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Accomodation Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Accomodation Name" value="{{ $edit->name }}" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-8">
                                <label for="image" id="imageLabel">Upload Photo</label>
                                <input type="file" class="form-control" id="imageUpload" onchange="loadImg()" name="image" accept=".png, .jpg, .jpeg" required/>
                            </div>
                            <div class="col-md-4">
                                <img id="frame"  width="100px" height="100px" src="{{ asset('assets/FrontEnd/images/accomodation/'.$edit->image) }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sub_title">Cost</label>
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $edit->cost }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Details</label>
                        <textarea class="form-control" name="details" id="details" cols="30" rows="10">{{ $edit->details }}</textarea>
                    </div>
                    
            
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="custom_button "><i class="mdi  mdi-hotel"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
    <br><br><br>

    <script>
        function _(x){
            return document.getElementById(x);
        }
        // $(document).on('change','.response',function(){
        //     let value = $(this).val();
        //     let response = $(this).data('response');

        //     if(response == 'department'){
        //         $.ajax({
        //             url : '/department-doctor-find/' + value,
        //             method : 'GET',
        //             success : function(data){
        //                 if(data.length === 0){
        //                     toastr.error("Doctor Does Not Exist");
        //                     $('#doctor_name').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Doctor</option>');
        //                     refresh();
        //                 }else{
        //                     $('#doctor_name').empty().append('<option selected="" value="" disabled selected hidden style="select:invalid { color: gray; }" readonly="" data-live-search="true">Choose a Doctor</option>');
        //                     jQuery.each( data, function( item, element ) {
        //                         $('#doctor_name').append("<option value='" + element['id'] + "'>"+ element['name']+"</option>");
        //                     });
        //                     refresh();
        //                 }
        //             }
        //         });
        //     }
        // });

        function refresh(){
            $('.selectpicker').selectpicker('refresh');
        }
        function loadImg(){
            $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
@endsection
