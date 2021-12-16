@extends('layouts.app')

@section('content')
    <div id="my-container-welcome-page">
        <div class="my-wrap-black-container">
            <div class="container">
                <div class="row">

                    <!-- JUMBOTRON INDEX CHE PORTA AGLI APPARTAMENTI -->
                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-jumbotron-apartments">
                            <div class="text-left pl-3">
                                <div class="col-sm-7 col-lg-6 pt-5">
                                    <h2>DISPONIBILITÀ SU TUTTO IL TERRITORIO NAZIONALE</h2>
                                </div>
                                <div class="col-sm-8 col-lg-5">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus soluta vel, facere eligendi sit voluptas ipsum unde nihil sed, officia provident qui sint accusantium ducimus sequi quia atque, illo ex?</p>
                                </div>
                            </div>
                                <a href="{{ route('guest.home') }}" class="my-btn-homepage">APPARTAMENTI</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-section-sponsorship">
                            <a href="{{ route('guest.home') }}" class="my-btn-homepage">Esperienze</a>
                        </div>
                    </div>

                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-section-login">
                            <a href="{{ route('guest.home') }}" class="my-btn-homepage">Partecipa</a>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
@endsection