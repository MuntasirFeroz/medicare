<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Contact;

class ContactController extends Controller
{
    public function index()
    {

        return view('frontend.contact');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        Contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'subject'=>$request->subject,
                'message'=>$request->message
        ]);
        Session::flash('success','Your message has been sent!');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
