<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function show(Request $request, $id)
    {

        $apartment = Apartment::findOrFail($id);
        $now = Carbon::today()->day;
        $after = Carbon::tomorrow()->day;

        $ipsTotal = Visit::select('ip_address')
            ->where('apartment_id', $id)
            ->whereBetween(DB::raw('DAY(created_at)'), [$now, $after])
            ->get()->all();
        $ips = [];

        foreach ($ipsTotal as $ip) {

            $ips[] = $ip['ip_address'];
        }
        
        $clientIP = $request->ip();

        
        if (in_array($clientIP, $ips) == false ) {

            $newView = Visit::make();
            $newView->ip_address = $clientIP;
            $newView->apartment_id = $id;
            $newView->save();
        }

        return view('guest.show', compact('apartment', "ipsTotal"));
    }

    public function getContactForm($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('guest.contact', compact("apartment"));
    }

    public function contactFormHandler(Request $request, Apartment $apartment)
    {

        $data = $request->all();
        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        $request->validate(
            [
                'email' => 'required|string|email|',
                'name' => 'required|string|max:100',
                'surname' => 'required|string|max:100',
                'subject' => 'required|string|max:100',
                'content' => 'required|min:100',
            ],

            [
                'required' => 'Devi compilare correttamente :attribute',
                'email.required' => 'Non è possibile inviare un messaggio senza email',
                'email.email' => 'Compila correttamente l\' email',
                'subject.max' => 'L\' oggetto dell\' email può avere massimo 100 caratteri',
                'content.min' => 'Il contenuto dell\' email deve avere un minimo di 100 caratteri',

            ]
        );

        return redirect()->route("guest.thanks");
    }

    public function contactFormEnder()
    {
        return view('guest.thanks');
    }
}
