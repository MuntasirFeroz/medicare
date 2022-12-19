<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Contact;

class ContactController extends Controller
{
    
    public function index()
    {
        $messages=Contact::orderBy('id','DESC')->paginate(20);
        return view('backend.contact.index',compact('messages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

        $delete = Contact::find($id);
        $delete -> delete();
        Session::flash('success','Successfully Deleted Message');
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $messages = Contact::where('email','like','%'.$request->search.'%')
            ->orWhere('id','like','%'.$request->search.'%')
            ->orWhere('subject','like','%'.$request->search.'%')
            ->orderBy('id','Desc')
            ->paginate(20);
        $searched = $request->search;
        return view('backend.contact.index',compact('messages','searched'));
    }
    public function single_message($id){
        $message=Contact::find($id);
        return view('backend.contact.details',compact('message'));
    }
}
