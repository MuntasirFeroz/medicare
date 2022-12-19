@extends('backend.master')
@section('title', ' | Messages')
@section('contact_messages','active') @section('contact_messages-show','show')
@section('content')
    <!-- ===========================================-->
    <div class="container">
        <h2 class="text-center text-info">
            Message
            <hr style="" />
        </h2>
        <br />
        <!-- Contact start-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header custom_card_head">
                        All Information
                    </div>
                    <div class="card-body">
                        <table class="custom">
                            <tbody>
                            <tr >
                                <td style="border: none !important;"><strong>Name</strong></td>
                                <td style="border: none !important;"><strong>:</strong></td>
                                <td style="border: none !important;" >{{$message->name}}</td>
                            </tr>
                            <tr >
                                <td style="border: none !important;"><strong>Phone :</strong></td>
                                <td style="border: none !important;"><strong>:</strong></td>
                                <td style="border: none !important;" >{{$message->phone}}</td>
                            </tr>
                            <tr >
                                <td style="border: none !important;"><strong>Email :</strong></td>
                                <td style="border: none !important;"><strong>:</strong></td>
                                <td style="border: none !important;" >{{$message->email}}</td>
                            </tr>
                            <tr >
                                <td style="border: none !important;"><strong>Subject :</strong></td>
                                <td style="border: none !important;"><strong>:</strong></td>
                                <td style="border: none !important;" >{{$message->subject}}</td>
                            </tr>
                            <tr >
                                <td style="border: none !important;"><strong>Message :</strong></td>
                                <td style="border: none !important;"><strong>:</strong></td>
                                <td style="border: none !important;">{{$message->message}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>

                </div>

            </div>
        </div>
        <br>
        <!-- Contact End-->



        <a class="btn custom_button" href="{{route('contact.index')}}">Go Back</a>
    </div>
    <!-- ===========================================-->


@endsection
