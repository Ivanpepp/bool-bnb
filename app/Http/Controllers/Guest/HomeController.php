<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Mail\SendNewMail;

class HomeController extends Controller
{
    public function index(){
        return view('guest.home');
    }

    public function show(Request $request, $id){
        
        $apartment = Apartment::findOrFail($id);
        return view('guest.show', compact('apartment'));
    }

    public function getContactForm()
    {
        return view('guest.contact');
    }

    public function contactFormHandler(Request $request)
    {
        $data = $request->all();
        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        Mail::to("account@mail.it")->send(new SendNewMail($newMessage));

        return redirect()->route("guest.thanks");
    }

    public function contactFormEnder()
    {
        return view('guest.thanks');
    }
}
