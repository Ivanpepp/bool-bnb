<?php

namespace App\Http\Controllers\Host;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $apartaments = Apartment::where('user_id', Auth::id())->get();
        $apt = [];

        foreach ($apartaments as $apartment) {
            array_push($apt, $apartment['id']);
        }

        $messages = Message::whereIn('apartment_id', $apt)->get();


        return view("host.mail.index", compact("apartaments", "messages"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $message = Message::findOrFail($id);
      
        return view("host.mail.show", compact("message"));
        
    }
}
