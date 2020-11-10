<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller{
    public function create(){
        return view('internal.contact.create');
    }
    public function store(){
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Mail::to('test@test.com')->send(new ContactFormMail($data));
        return redirect('contact')->with('message', 'Thanks for your message. we will be in touch.');
//        session()->flash('message', 'Thanks for your message. we will be in touch.');
//        return redirect('contact');
    }
}
