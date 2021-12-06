
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
                    
                        <img class="m-2" width="200px" src="{{$photo->image_thumb}}"  alt="{{$apartment->title}}">
                      
                    @endforeach
    
              </div>
                <p class="card-text">Ospiti: {{$apartment->total_guest}}</p>
                <p class="card-text">Stanze: {{$apartment->total_room}}</p>
                <p class="card-text">Bagni: {{$apartment->total_bathroom}}</p>
                <p class="card-text">Metri quadri: {{$apartment->mq}}</p>
                <p class="card-text"><strong>Descrizione:</strong> {{$apartment->description}}</p>
                <address class="card-text">Indirizzo: {{$apartment->city . ' ' . $apartment->address}} </address>
                <p class="card-text">Prezzo: {{$apartment->price}} €</p>
                <a href="{{route('host.apartments.index')}}" class="btn btn-danger">Torna alla lista</a>
                <a href="{{route('host.apartments.edit', $apartment)}}" class="btn btn-secondary">Modifica</a>
            </div>
          </div> 
           
    </div>
</div>
@endsection