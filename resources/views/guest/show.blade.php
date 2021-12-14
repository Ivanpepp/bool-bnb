
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
                <address  class="card-text">Indirizzo: {{$apartment->city . ' ' . $apartment->address}} </address>
                <input id="city" type="hidden"  value='{{$apartment->city . '<br/>' . $apartment->address}}'>
                <p class="card-text">Prezzo: {{$apartment->price}} €</p>
                <a href="http://127.0.0.1:8000" class="btn btn-primary">Torna alla lista</a>
                @if (Auth::check() && Auth::User()->id == $apartment->user_id)
                @else <a href="{{route("guest.contact", $apartment->id)}}" class="btn btn-primary">Contattaci</a> @endif
                <input type='hidden'  id="longitudine" value='{{$apartment->longitude}}'>
                <input type='hidden'  id="latitudine" value='{{$apartment->latitude}}'>
            </div>
          </div> 
         
          
    </div>
   
       
        
        <div  class="mt-3 mb-3" id='map' ></div> 
     
</div>
<script>
          
            let longitudine = document.getElementById("longitudine").value;
            let latitudine = document.getElementById("latitudine").value;
            console.log(latitudine,longitudine)
            var tt = window.tt;
            var defaultCenter = [longitudine, latitudine]
            var map = tt.map({ 
            key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI', 
            container: 'map', 
            style: 'tomtom://vector/1/basic-main',
            center: defaultCenter,
            zoom: 15,
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
             var marker = new tt.Marker().setLngLat(defaultCenter).addTo(map);
             
             var popupOffsets = {
                    top: [0, 0],
                    bottom: [0, -70],
                    'bottom-right': [0, -70],
                    'bottom-left': [0, -70],
                    left: [25, -35],
                    right: [-25, -35]
            };
            let city = document.getElementById('city').value;
             var popup = new tt.Popup({offset: popupOffsets}).setHTML(city);
             marker.setPopup(popup).togglePopup();
            
             
            
</script>

@endsection