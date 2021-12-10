<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class HomeController extends Controller
{
    public function show(Request $request, $id){
        
        $apartment = Apartment::findOrFail($id);
        return view('guest.show', compact('apartment'));
    }
}
