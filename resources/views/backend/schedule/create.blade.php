@extends('backend.master')
@section('title', ' | Schedule')
@section('schedules', 'active') @section('schedules-show', 'show') @section('schedules-create', 'active')
@section('content')
    {!! Form::open(['class' => 'form-sample', 'route' => 'schedule.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose">
                <h3 class="page-title"><span class="page-title-icon bg-gradient-success text-white mr-2"><i
                            class="mdi mdi-calendar-clock"></i></span> My Schedule</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="size">Number of Days</label>
                        <input type="text" class="form-control input_control" name="no_days" id="no_days"
                            data-input_control="num_of_days" placeholder="Number of Days" required>
                    </div>

                    <div id="days"></div>
                    {{-- <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="size">Day From</label>
                            <select name="day_from[]" id="day_from" required>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="size">Day To</label>
                            <select name="day_to[]" id="day_to">
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <input type="time" class="form-control" name="start_time[]" id="start_time"
                            data-input_control="num_of_days" placeholder="Start Time" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="time" class="form-control" name="end_time[]" id="end_time"
                            data-input_control="num_of_days" placeholder="End Time" required>
                        </div>
                    </div> --}}
                    

                </div>
            </div>
            <br /><br />
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="custom_button "><i class="mdi mdi-calendar-clock"></i> Create </button>
                </div>
            </div>
            {!! Form::close() !!}
            <br><br><br>

            <script>
                function _(x){
                    return document.getElementById(x);
                }
              
                $(document).on('input','.input_control',function(){
                    let input_control = $(this).data('input_control');
                    if(input_control == 'num_of_days'){
                        let num_of_days = $(this).val();
                        let i;
                        let html = '';
                        for(i = 0 ; i < num_of_days ; i++){
                            html+=` <h5>----------- Day ${i+1} ---------------</h5>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label for="size">Day</label>
                                            <select class="form-control" name="day[]" id="day" required>
                                                <option>Choose a day</option>
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <input type="time" class="form-control" name="start_time[]" id="start_time"
                                            data-input_control="num_of_days" placeholder="Start Time" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="time" class="form-control" name="end_time[]" id="end_time"
                                            data-input_control="num_of_days" placeholder="End Time" required>
                                        </div>
                                    </div>` ;   
                        }
                        $('#days').empty().append(html);
                        refresh();
                    }
                });
        
                function refresh(){
                    $('.selectpicker').selectpicker('refresh');
                }
                function loadImg(id){
                    $('#frame_'+id).attr('src', URL.createObjectURL(event.target.files[0]));
                }
            </script>
        @endsection
