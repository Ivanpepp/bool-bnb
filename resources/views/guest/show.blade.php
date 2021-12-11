
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="card-title">{{$apartment->title}}</h1>
                <p class="card-text">{{$apartment->type}}</p>
                <div class="d-flex flex-wrap">
                    @foreach ($apartment->photos  as $photo)

                        <img class="img-fluid" src="{{ $photo->getImagePrefix() .   $photo->image_thumb }}" alt="{{$apartment->title}} image">
                      
                    @endforeach
    
              </div>
                <p class="card-text">Ospiti: {{$apartment->total_guest}}</p>
                <p class="card-text">Stanze: {{$apartment->total_room}}</p>
                <p class="card-text">Bagni: {{$apartment->total_bathroom}}</p>
                <p class="card-text">Metri quadri: {{$apartment->mq}}</p>
                <p class="card-text"><strong>Descrizione:</strong> {{$apartment->description}}</p>
                <address class="card-text">Indirizzo: {{$apartment->city . ' ' . $apartment->address}} </address>
                <p class="card-text">Prezzo: {{$apartment->price}} €</p>
                <a href="http://127.0.0.1:8000" class="btn btn-primary">Torna alla lista</a>
                @if (Auth::check() && Auth::User()->id == $apartment->user_id)
                @else <a href="{{route("guest.contact", $apartment)}}" class="btn btn-primary">Contattaci</a> @endif
            </div>
          </div> 
          
    </div>
</div>
@endsection