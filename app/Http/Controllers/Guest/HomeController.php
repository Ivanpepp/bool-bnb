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
        $newMessage = new Message;
        $newMessage->fill($data);
        $newMessage->save();
        
        $request->validate(
            [
                'email' => 'required|email|',
                'name' => 'required|string|max:100',
                'surname' => 'required|string|max:100',
                'subject' => 'required|min:50|max:100',
                'content' => 'required|min:100',
            ],

            [
                'required'=>'Devi compilare correttamente :attribute',
                'email.required' => 'Non è possibile inviare un messaggio senza email',
                'email.email' => 'Compila correttamente l\' email',
                'subject.min' => 'L\' oggetto dell\' email deve avere minimo 50 caratteri',
                'subject.max' => 'L\' oggetto dell\' email può avere massimo 100 caratteri',
                'content.min' => 'Il contenuto dell\' email deve avere un minimo di 100 caratteri', 
                
            ]
        );


        Mail::to("account@mail.it")->send(new SendNewMail($newMessage));

        return redirect()->route("guest.thanks");
    }

    public function contactFormEnder()
    {
        return view('guest.thanks');
    }
}
