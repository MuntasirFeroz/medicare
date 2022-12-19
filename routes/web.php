<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

  Route::get('/','Frontend\IndexController@index')->name('frontend.home');
  // Route::get('/contact-us','Frontend\IndexController@contact')->name('frontend.contact');
  
  Route::get('/about',function(){
      return view('frontend.about');
  })->name('frontend.about');
  
  Route::get('/services',function(){
      return view('frontend.services');
  })->name('frontend.services');

  Route::get('/packages',function(){
      return view('frontend.packages');
  })->name('frontend.packages');

  Route::get('/department-single/{id}',function($id){
      $department=App\Department::find($id);
      return view('frontend.department-single',compact('department'));
  })->name('frontend.department_single');

  Route::get('/roomcategory', function(){
      return view('frontend.roomcategory');
  })->name('frontend.roomcategory');

  Route::get('/bookacccomodation/{id}', function($selected_id){
      return view('frontend.bookaccomodation',compact('selected_id'));
  })->name('frontend.bookaccomodation');

  Route::get('/confirmation/{value}',function($value){
    return view('frontend.confirmation',compact('value'));
  })->name('frontend.confirmation');

  Route::resource('/ambulances','Frontend\AmbulanceController');
  Route::get('/ambulances-index', 'Frontend\AmbulanceController@index')->name('frontend.ambulance');
  Route::get('/ambulances-book', 'Frontend\AmbulanceController@create')->name('frontend.ambulance_book');
  Route::get('/ambulances-find/{type}', 'Frontend\AmbulanceController@ambulanceFind');

  Route::resource('/book-room','Frontend\RoomBookingController');
  Route::get('book-room-find/{acccomodation_id}', 'Frontend\RoomBookingController@availableRoomFind');
  Route::get('book-room-seat-find/{room_no}', 'Frontend\RoomBookingController@availableSeatFind');
    

  
  Route::resource('/contact-us','Frontend\ContactController');

  Route::resource('/make-appointment', 'Frontend\AppointmentController');
  Route::get('/make-appointment-index', 'Frontend\AppointmentController@index')->name('frontend.appointment');
  Route::get('make-appointment-department-doctor-find/{id}', 'Frontend\AppointmentController@findDoctor');
   
  Route::resource('/make-consultation', 'Frontend\ConsultationController');
  Route::get('/make-consultation-index', 'Frontend\ConsultationController@index')->name('frontend.consultation');
  Route::get('/make-consultation-create', 'Frontend\ConsultationController@create')->name('frontend.consultation.create');
  Route::get('make-consultation-department-doctor-schedule-find/{doctor_id}', 'Frontend\ConsultationController@getSchedule');
   
  Route::get('/about',function(){
    return view('frontend.about');
})->name('frontend.about');

  Route::get('/services',function(){
    return view('frontend.services');
})->name('frontend.services');

//  Route::get('/','Frontend\IndexController@index')->name('frontend.home');

//--------------------------BACKEND-------------------------------------
 Route::get('/login', function () {return view('backend.welcome');})->name('welcome');

Auth::routes();
Route::group(['middleware' => ['preventbackbutton','auth']],function() {
Route::get('/home', 'Admin\IndexController@index')->name('home');
    Route::resource('/user', 'Admin\UserController');
    Route::get('user-index', 'Admin\UserController@index')->name('backend.user.index');
    Route::get('user-create', 'Admin\UserController@create')->name('backend.user.create');

    Route::resource('/department', 'Admin\DepartmentController');
    Route::get('department-index', 'Admin\DepartmentController@index')->name('backend.department.index');
    Route::get('department-create', 'Admin\DepartmentController@create')->name('backend.department.create');
    Route::get('department-search', 'Admin\DepartmentController@search')->name('backend.department.search');
    Route::get('department-doctor-find/{id}', 'Admin\DepartmentController@findDoctor');

    Route::resource('/doctor', 'Admin\DoctorController');
    Route::get('doctor-index', 'Admin\DoctorController@index')->name('backend.doctor.index');
    Route::get('doctor-create', 'Admin\DoctorController@create')->name('backend.doctor.create');
    Route::get('doctor-search', 'Admin\DoctorController@search')->name('backend.doctor.search');
    
    Route::resource('/appointment', 'Admin\AppointmentController');
    Route::get('appointment-index', 'Admin\AppointmentController@index')->name('backend.appointment.index');
    Route::get('appointment-create', 'Admin\AppointmentController@create')->name('backend.appointment.create');
    Route::get('appointment-search', 'Admin\AppointmentController@search')->name('backend.appointment.search');
    Route::get('appointment-status/{id}/{status}', 'Admin\AppointmentController@status')->name('backend.appointment.status');
    Route::get('my-appointment', 'Admin\AppointmentController@myAppointments')->name('backend.appointment.myappointment');

    Route::resource('/patient', 'Admin\PatientController');
    Route::get('patient-index', 'Admin\PatientController@index')->name('backend.patient.index');
    Route::get('patient-create', 'Admin\PatientController@create')->name('backend.patient.create');
    Route::get('patient-search', 'Admin\PatientController@search')->name('backend.patient.search');
    
    Route::resource('/contact','Admin\ContactController');
    Route::get('contacts-single/{id}', 'Admin\ContactController@single_message')->name('backend.contacts.details');
    Route::get('contact-search','Admin\ContactController@search')->name('contact.search');

    Route::resource('/test', 'Admin\TestController');
    Route::get('test-index', 'Admin\TestController@index')->name('backend.test.index');
    Route::get('test-create', 'Admin\TestController@create')->name('backend.test.create');
    Route::get('test-search', 'Admin\TestController@search')->name('backend.test.search');
    
    Route::resource('/test-result', 'Admin\TestResultController');
    Route::get('test-result-index', 'Admin\TestResultController@index')->name('backend.test_result.index');
    Route::get('test-result-create', 'Admin\TestResultController@create')->name('backend.test_result.create');
    Route::get('test-result-search', 'Admin\TestResultController@search')->name('backend.test_result.search');
    
    Route::resource('/prescription', 'Admin\PrescriptionController');
    Route::get('prescription-index', 'Admin\PrescriptionController@index')->name('backend.prescription.index');
    Route::get('prescription-create/{id}', 'Admin\PrescriptionController@addPrescription')->name('backend.prescription.create');
    Route::get('prescription-show/{id}', 'Admin\PrescriptionController@showPrescription')->name('backend.prescription.show');
    Route::get('prescription-search', 'Admin\PrescriptionController@search')->name('backend.prescription.search');
    
    Route::resource('/ambulance', 'Admin\AmbulanceController');
    Route::get('ambulance-index', 'Admin\AmbulanceController@index')->name('backend.ambulance.index');
    Route::get('ambulance-create', 'Admin\AmbulanceController@create')->name('backend.ambulance.create');
    Route::get('ambulance-search', 'Admin\AmbulanceController@search')->name('backend.ambulance.search');
    Route::get('ambulance-status/{id}', 'Admin\AmbulanceController@available')->name('backend.ambulance.available');
    Route::get('ambulance-find/{type}', 'Admin\AmbulanceController@ambulanceFind')->name('backend.ambulance.find');
    
    Route::resource('/ambulance-booking', 'Admin\AmbulanceBookingController');
    Route::get('ambulance-booking-index', 'Admin\AmbulanceBookingController@index')->name('backend.ambulance_booking.index');
    Route::get('ambulance-booking-create', 'Admin\AmbulanceBookingController@create')->name('backend.ambulance_booking.create');
    Route::get('ambulance-booking-search', 'Admin\AmbulanceBookingController@search')->name('backend.ambulance_booking.search');
    
    Route::resource('/accomodation', 'Admin\AccomodationController');
    Route::get('accomodation-index', 'Admin\AccomodationController@index')->name('backend.accomodation.index');
    Route::get('accomodation-create', 'Admin\AccomodationController@create')->name('backend.accomodation.create');
    Route::get('accomodation-search', 'Admin\AccomodationController@search')->name('backend.accomodation.search');
    
    Route::resource('/room', 'Admin\RoomSeatController');
    Route::get('room-index', 'Admin\RoomSeatController@index')->name('backend.room.index');
    Route::get('room-create', 'Admin\RoomSeatController@create')->name('backend.room.create');
    Route::get('room-search', 'Admin\RoomSeatController@search')->name('backend.room.search');
    Route::get('room-seat/{seat_id}', 'Admin\RoomSeatController@changeVacancy')->name('backend.room.seat_change');
    
    Route::resource('/room-booking', 'Admin\RoomBookingController');
    Route::get('room-booking-index', 'Admin\RoomBookingController@index')->name('backend.room_booking.index');
    Route::get('room-booking-create', 'Admin\RoomBookingController@create')->name('backend.room_booking.create');
    Route::get('room-booking-search', 'Admin\RoomBookingController@search')->name('backend.room_booking.search');
    Route::get('room-booking-find/{acccomodation_id}', 'Admin\RoomBookingController@availableRoomFind')->name('backend.room_booking.find');
    Route::get('room-booking-seat-find/{room_id}', 'Admin\RoomBookingController@availableSeatFind')->name('backend.room_booking.find');
    
    Route::resource('/schedule', 'Admin\ScheduleController');
    Route::get('schedule-index', 'Admin\ScheduleController@index')->name('backend.schedule.index');
    Route::get('schedule-create', 'Admin\ScheduleController@create')->name('backend.schedule.create');
    
    Route::resource('/consultation', 'Admin\ConsultationController');
    Route::get('consultation-index', 'Admin\ConsultationController@index')->name('backend.consultation.index');
    Route::get('consultation-create', 'Admin\ConsultationController@create')->name('backend.consultation.create');
    Route::get('consultation-search', 'Admin\ConsultationController@search')->name('backend.consultation.search');
    Route::get('consultation-status/{id}', 'Admin\ConsultationController@status')->name('backend.consultation.status');
    

  });
