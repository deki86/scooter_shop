<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\contactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show contact page
     * @return \Iluminate\Http\Response
     */
    public function contact()
    {
        return view('contact');
    }
    /**
     * Store contact message and send mail to admin
     * @param  Request $request
     * @return mixed
     */
    public function storeMessage(Request $request)
    {
        //rules for validation
        $rules = [
            'name' => 'required|string|min:2|max:30',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10|max:1000',
        ];
        // validate request
        $this->validate($request, $rules);

        $data = $request->all();
        // store contact message in database
        $message = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);
        // TO DO notificaion for admins when admin panel is done
        $thisContact = Contact::findOrFail($message->id);
        // Mail to admin that contact message
        Mail::to('office@scoteri.net')->send(new contactMessageMail($thisContact));

        // redirect and flash user with status message
        return redirect('/contact')->with('status', 'Your message is send to admin');
    }
}
