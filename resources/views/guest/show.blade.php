@extends('layouts.app')

@section('content')
    <div class="my-wrap-container pt-4">
        <div class="container">
            <div class="row">

                <!-- SEZIONE IMMAGINE -->
                <div class="col-12 my-img-container text-center">

                    <!-- <div id="myCarousel" class="carousel slide pt-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($apartment->photos as $key => $photo)
                                <div class="carousel-item my-container-img {{ $key == 0 ? 'active' : '' }} text-center">
                                    <img class="img-fluid" src="{{ $photo->getImagePrefix() . $photo->image_thumb }}"
                                        alt="{{ $apartment->title }} image">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="sr-only">Next</span>
                        </a>
                    </div> -->
                    @foreach($apartment->photos as $key=> $photo)
                        
                        <img class="my-img mb-1" src="$photo->image_thumb" alt="">
                        
                    @endforeach

                </div>
                <!-- FINE SEZIONE IMMAGINE -->

                <div class="col-8">
                    <section class="my-info-section my-border-section pt-5">
                        <div class="col-10">
                            <h3><strong>{{ $apartment->title }} - Host: 
                                {{ $apartment->user->name . ' ' . $apartment->user->surname }} </strong>
                            </h3>
                        </div>
                        <div class="col-10 d-flex my-container-info pt-2 pb-3">
                            <p><i class="fas fa-person-booth pr-1"></i> STANZE: {{ $apartment->total_room }}</p>
                            <p><i class="fas fa-bed pl-2 pr-1"></i> LETTI: {{ $apartment->total_guest }}</p>
                            <p><i class="fas fa-bath pl-2 pr-1"></i> BAGNI: {{ $apartment->total_bathroom }} </p>
                            <p><i class="fas fa-chart-area pl-2 pr-1"></i> MQ: {{ $apartment->mq }} </p>
                        </div>
                    </section>

                    <section class="pt-4 pb-3 my-border-section">
                        <div class="col-6 my-list-service">
                            <h3>Servizi:</h3>
                            <div class="col-12 ">
                                @foreach ($apartment->features as $feature)
                                    <ul>
                                        <li>
                                            <i class="{{ $feature->icon }} p-1"></i> {{ $feature->title }}
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    <section class="my-border-section pt-4">

                        <div class="col-12">
                            <H2>Descrizione:</H2>
                            <p>{{ $apartment->description }}</p>
                        </div>

                    </section>
    
                

                    <div class="col-9 pt-4 pb-1">
                        <h3>Luogo:</h3>
                        <p>{{ $apartment->address . ' , ' . $apartment->city }}</p>
                    </div>
                </div>

                <div class="col-4 d-flex justify-content-center pt-5 ">
                    <div class="my-card-price p-3">
                        <p>{{$apartment->price}} euro /notte</p>

                        <a href="{{ route('guest.contact', $apartment->id) }}"
                            class="btn btn-success">
                            <i class="far fa-envelope mr-2"></i>
                            Contattaci
                        </a>
                        
                    </div>
                </div>

                <div class="" id='map'></div>

                <section>
                    <div class="button pt-2 pb-2 text-center d-flex justify-content-around">
                        <a href="http://127.0.0.1:8000" class="btn btn-primary">Torna alla lista</a>
                        @if (Auth::check() && Auth::User()->id == $apartment->user_id)
                        @else <a href="{{ route('guest.contact', $apartment->id) }}"
                                class="btn btn-success  justify-content-end"><i
                                    class="far fa-envelope mr-2"></i>Contattaci</a> @endif
                        <input type='hidden' id="longitudine" value='{{ $apartment->longitude }}'>
                        <input type='hidden' id="latitudine" value='{{ $apartment->latitude }}'>
                    </div>
                </section>

            </div>
        </div>


        <script>
            let longitudine = document.getElementById("longitudine").value;
            let latitudine = document.getElementById("latitudine").value;
            console.log(latitudine, longitudine)
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
            var popup = new tt.Popup({
                offset: popupOffsets
            }).setHTML(city);
            marker.setPopup(popup).togglePopup();
        </script>

    @endsection
