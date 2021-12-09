
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
<<<<<<< HEAD

                        <img class="img-fluid" src="{{ $photo->getImagePrefix() . $photo->image_thumb }}" alt="{{$apartment->title}} image">
=======
                    
                        <img class="m-2 img-fluid" width="200px" src="{{asset('../images/' . $photo->image_thumb)}}"  alt="{{$apartment->title}}">
>>>>>>> 4e767bebd83de920688807a121ee150620506e89
                      
                    @endforeach
    
              </div>
                <p class="card-text">Ospiti: {{$apartment->total_guest}}</p>
                <p class="card-text">Stanze: {{$apartment->total_room}}</p>
                <p class="card-text">Bagni: {{$apartment->total_bathroom}}</p>
                <p class="card-text">Metri quadri: {{$apartment->mq}}</p>
                <p class="card-text"><strong>Descrizione:</strong> {{$apartment->description}}</p>
                <address class="card-text">Indirizzo: {{$apartment->city . ' ' . $apartment->address}} </address>
                <p class="card-text">Prezzo: {{$apartment->price}} €</p>
                <a href="{{route('host.apartments.index')}}" class="btn btn-primary">Torna alla lista</a>
                <a href="{{route('host.apartments.edit', $apartment)}}" class="btn btn-secondary">Modifica</a>
                <form class="my-5" action="{{route('host.apartments.destroy',$apartment)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">ELIMINA</button>
                </form>
            </div>
          </div> 
          
    </div>
</div>
@endsection