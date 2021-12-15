@extends('layouts.app')

@section('content')
    <div class="my_wrap_show">
        <div class="container">
            <div class="row card">
                <div class="col-12 mb-3">

                    <div id="myCarousel" class="carousel slide pt-5" data-ride="carousel">
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
                    </div>
                </div>

                <div>
                    <section class="description pt-5">
                        <div class="col-9">
                            <h3>{{ $apartment->title }} - Host:
                                {{ $apartment->user->name . ' ' . $apartment->user->surname }}</h3>
                            <hr>
                            <div class="d-flex justify-content-around">
                                <h6><i class="fas fa-person-booth"></i> STANZE: {{ $apartment->total_room }} </h6>
                                <h6><i class="fas fa-bed"></i> LETTI: {{ $apartment->total_guest }} </h6>
                                <h6><i class="fas fa-bath"></i> BAGNI: {{ $apartment->total_bathroom }} </h6>
                                <h6><i class="fas fa-chart-area"></i> MQ: {{ $apartment->mq }} </h6>
                            </div>
                            <hr>
                        </div>
                    </section>

                    <section class="details pt-3">
                        <div class="col-9">
                            <H2>SERVIZI:</H2>
                            @foreach ($apartment->features as $feature)
                                <li><i class="{{ $feature->icon }}"></i> {{ $feature->title }}</li>
                            @endforeach
                            <hr>
                        </div>
                    </section>

                    <section class="details pt-3">

                        <div class="col-9">
                            <H2>DESCRIZIONE:</H2>
                            <h5>{{ $apartment->description }}</h5>
                            <hr>
                        </div>

                    </section>
                </div>

                <div class="col-9">
                    <h2>DOVE TI TROVERAI:</h2>
                    <p>{{ $apartment->address . ' , ' . $apartment->city }}</p>
                </div>
                <div class="mt-3 mb-3" id='map'></div>

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
