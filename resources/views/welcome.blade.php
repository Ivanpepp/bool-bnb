@extends('layouts.app')

@section('content')
    <div id="my-container-welcome-page">
        <div class="my-wrap-black-container">
            <div class="container">
                <div class="row">

                    <!-- JUMBOTRON INDEX CHE PORTA AGLI APPARTAMENTI -->
                    <div class="col-12 text-center">
                        <div class="shadow-lg" id="my-jumbotron-apartments">
                            <div class="text-left pl-3">
                                <div class="col-sm-7 col-lg-6 pt-5">
                                    <h2>DISPONIBILITÀ SU TUTTO IL TERRITORIO NAZIONALE</h2>
                                </div>
                                <div class="col-sm-8 col-lg-5 pt-1">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus soluta vel, facere eligendi sit voluptas ipsum unde nihil sed, officia provident qui sint accusantium ducimus sequi quia atque, illo ex?</p>
                                </div>
                            </div>
                            <a href="{{ route('guest.home') }}" class="my-btn-homepage">ESPLORA</a>
                        </div>
                    </div>

                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-section-sponsorship">
                            <div class="text-left pl-3 my-text">
                                <div class="col-sm-7 col-lg-6 pt-5">
                                    <h2>EDIFICI CON PROMOZIONI DA NON PERDERE</h2>
                                </div>
                                <div class="col-sm-8 col-lg-5 pt-2 pb-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus soluta vel, facere eligendi sit voluptas ipsum unde nihil sed, officia provident qui sint accusantium ducimus sequi quia atque, illo ex?</p>
                                </div>
                                <a href="{{ route('guest.home') }}" class="my-btn-homepage ml-3">SCOPRI LE OFFERTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-section-login">
                            @guest
                                <div class="text-left pl-3 my-text">
                                    <div class="col-sm-7 col-lg-6 pt-5">
                                        <h2>ENTRA ANCHE TU A FAR PARTE DEL MONDO DI BOOLBNB</h2>
                                    </div>
                                    <div class="col-sm-8 col-lg-5 pt-2 pb-2">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus soluta vel, facere eligendi sit voluptas ipsum unde nihil sed, officia provident qui sint accusantium ducimus sequi quia atque, illo ex?</p>
                                    </div>
                                    <a href="{{ route('register') }}" class="my-btn-homepage ml-3">REGISTRATI</a>
                                </div>
                            @else
                                <div class="text-left pl-3 my-text">
                                    <div class="col-sm-7 col-lg-6 pt-5">
                                        <h2>ENTRA ANCHE TU A FAR PARTE DEL MONDO DI BOOLBNB</h2>
                                    </div>
                                    <div class="col-sm-8 col-lg-5 pt-2 pb-2">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus soluta vel, facere eligendi sit voluptas ipsum unde nihil sed, officia provident qui sint accusantium ducimus sequi quia atque, illo ex?</p>
                                    </div>
                                    <a href="{{ route('host.apartments.create') }}" class="my-btn-homepage ml-3">AGGIUNGI UN APPARTAMENTO</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
@endsection