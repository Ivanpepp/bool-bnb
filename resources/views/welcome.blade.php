@extends('layouts.app')

@section('content')
<<<<<<< HEAD
    <div id="my-container-welcome-page">
        <div class="my-wrap-black-container">
            <div class="container">
                <div class="row">

                    <!-- JUMBOTRON INDEX CHE PORTA AGLI APPARTAMENTI -->
                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-jumbotron-apartamnets">
                            <a href="{{ route('guest.home') }}" class="btn btn-warning pt-5">Esplora</a>

                        </div>
                    </div>

                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-section-login">
                            <a href="{{ route('guest.home') }}" class="btn btn-warning pt-5">Partecipa</a>
                        </div>
                    </div>

                    <div class="col-12 text-center" >
                        <div class="shadow-lg" id="my-section-sponsorship">
                            <a href="{{ route('guest.home') }}" class="btn btn-warning pt-5">Esperienze</a>
                        </div>
                    </div>
                </div>         
            </div>
=======
    <div class="container">
        <div class="row">
            <a href="{{route('guest.home')}}" class="btn btn-primary">Vai alla home</a>
            <a href="{{route('host.apartments.index')}}" class="btn btn-primary">Accedi</a>
>>>>>>> pay-imp
        </div>
    </div>
@endsection