<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Apartment;
use App\Models\Feature;
use App\Models\Sponsorship;
use App\Models\Photo;
use App\Models\Message;
use App\Models\Visit;


class ApartmentController extends Controller
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
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('host.apartments.index', compact('apartments'));
    }
    public function payment($id)
    {

        $apartment = Apartment::find($id);


        return view('host.sponsor.payment', compact('apartment'));
    }
    public function messageStats($id)
    {
        $apartment = Apartment::findOrFail($id);

        $user_id = Auth::id();

        $messagesCount = Message::where('apartment_id', $id)->count();
        $visitsCount = Visit::where('apartment_id', $id)->count();



        $dates = Visit::where('apartment_id', $id)
            ->select("created_at")->get()->all();



        $days = [];

        foreach ($dates as $date) {

            $days[] = $date['created_at']->day;
        }

        return view('host.apartments.chart', compact('apartment', 'messagesCount', "visitsCount", "days"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $apartment = new Apartment();
        $sponsorships = Sponsorship::all();
        $features = Feature::all();
        $featureIds = $apartment->features->pluck('id')->toArray();
        $sponsorshipIds = $apartment->sponsorships->pluck('id')->toArray();
        $photo = new Photo();

        return view('host.apartments.create', compact('apartment', 'sponsorships', 'features', 'featureIds', 'sponsorshipIds', 'request', 'photo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        $request->validate(
            [
                'title' => [
                    'required', 'string', 'max:100',
                    Rule::unique('apartments')
                        ->ignore($apartment->id)
                ],
                'description' => 'required|min:50',
                'city' => 'required',
                'address' => 'required',
                'latitude' => 'nullable',
                'longitude' => 'nullable',
                'price' => 'required',
                'type' => 'nullable',
                'total_room' => 'required|numeric',
                'total_guest' => 'required|numeric',
                'total_bathroom' => 'required|numeric',
                'mq' => 'nullable',
                'is_visible' => 'nullable',
                'image_thumb' => 'required',
                'image_thumb.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ],
            [
                'required' => 'Devi compilare correttamente :attribute',
                'title.required' => 'non è possibile inserire un appartamento senza titolo',
                'description.min' => 'la descrizione dell\'appartamento deve essere lungo almeno 50 caratteri',
                'total_room.numeric' => 'nel campo :attribute devi inserire un numero',
                'total_guest.numeric' => 'nel campo :attribute devi inserire un numero',
                'total_bathroom.numeric' => 'nel campo :attribute devi inserire un numero',
                /*  'is_visible' => 'Scegli dalla tendina se renderlo visibile', */


            ]
        );

        $data = request()->all();
        $data['user_id'] = Auth::user()->id;

        /*  $data['image_thumb'] = Storage::put('apartments/images',$data['image_thumb']); */
        $apartment =  Apartment::create($data);
        $apartment->save();

        if ($request->hasfile('image_thumb')) {

            foreach ($request->file('image_thumb') as $image) {
                $photo = new Photo();
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/storage/apartments/images/', $name);
                $thumb = $name;
                $photo->image_thumb = $thumb;
                $photo->apartment_id = $apartment->id;
                $photo->save();
            }
        }

        /*  if($request->hasfile('image_thumb'))
     {
        foreach($request->file('image_thumb') as $file)
        {
            $name = time().'.'.$file->extension();
            $file->move(public_path().'/files/', $name);  
            $data[] = $name;  

        }
     }
     $file= new Photo();
     $file->image_thumb=json_encode($data);
     $file->save(); */

        if (array_key_exists('features', $data)) $apartment->features()->sync($data['features']);
        if (array_key_exists('sponsorships', $data)) $apartment->sponsorships()->sync($data['sponsorships']);

        return redirect()->route('host.apartments.show', compact('apartment'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('host.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment, Request $request, Photo $photo)
    {

        $sponsorships = Sponsorship::all();
        $features = Feature::all();
        $featureIds = $apartment->features->pluck('id')->toArray();
        $sponsorshipIds = $apartment->sponsorships->pluck('id')->toArray();
        $isVisibleIds = ['0', '1'];
        $photos = Photo::all();

        return view('host.apartments.edit', compact('apartment', 'sponsorships', 'features', 'featureIds', 'sponsorshipIds', 'request', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment, Photo $photo)
    {

        $request->validate(
            [
                'title' => [
                    'required', 'string', 'max:100',
                    Rule::unique('apartments')
                        ->ignore($apartment->id)
                ],
                'description' => 'required|min:50',
                'city' => 'required',
                'address' => 'required',
                'latitude' => 'nullable',
                'longitude' => 'nullable',
                'price' => 'required',
                'type' => 'nullable',
                'total_room' => 'required|numeric',
                'total_guest' => 'required|numeric',
                'total_bathroom' => 'required|numeric',
                'mq' => 'nullable',
                'is_visible' => 'nullable',

            ],
            [
                'required' => 'Devi compilare correttamente :attribute',
                'title.required' => 'non è possibile inserire un appartamento senza titolo',
                'description.min' => 'la descrizione dell\'appartamento deve essere lungo almeno 50 caratteri',
                'total_room.numeric' => 'nel campo :attribute devi inserire un numero',
                'total_guest.numeric' => 'nel campo :attribute devi inserire un numero',
                'total_bathroom.numeric' => 'nel campo :attribute devi inserire un numero',
                /*  'is_visible.required' => 'Scegli dalla tendina se renderlo visibile', */

            ]
        );

        $data = request()->all();
        $data['user_id'] = Auth::user()->id;
        $apartment->fill($data);
        $apartment->update();
        foreach ($request->file('image_thumb') as $image) {

            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/storage/apartments/images/', $name);
            $thumb = $name;
            $photo->image_thumb = $thumb;
            $photo->apartment_id = $apartment->id;
            $photo->update();
        }
        if (array_key_exists('features', $data)) $apartment->features()->sync($data['features']);
        if (array_key_exists('sponsorships', $data)) $apartment->sponsorships()->sync($data['sponsorships']);

        return redirect()->route('host.apartments.show', compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        if ($apartment->features || $apartment->sponsorships) {
            $apartment->features()->detach();
            $apartment->sponsorships()->detach();
        }
        $apartment->delete();
        return redirect()->route('host.apartments.index')->with('deleted', $apartment->title)->with('alert-message', "$apartment->title è stato eliminato con successo!");
    }
}
