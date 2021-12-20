@extends("layouts.app")
@section("content")
    <div class="container" id="my-wrap-contact">
        <div class="row justify-content-center pt-3">
            <h3 class="pt-2 pb-3 text-uppercase">Contatta per informazioni su : <span class="my-text-color"> {{$apartment->title}} </span></h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="text-left card  col-sm-10 col-lg-8 shadow mb-4" style="width: 18rem;">
                <div class="card-body">
                    <form action="{{route('guest.sender', $apartment)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="apartment_id" id="apartment_id" value="{{$apartment->id}}"> 
                        </div> 
                        <div class="form-group">
                            <h5 for="email_address" class="form-h5">Nome:</h5>
                            <input class="form-control" type="text" placeholder="Inserisci nome" name="name" value="{{old('subject') }}"> 
                        </div> 
                        <div class="form-group">
                            <h5 for="email_address" class="form-h5">Cognome:</h5>
                            <input class="form-control" type="text" placeholder="Inserisci cognome" name="surname" value="{{old('subject') }}"> 
                        </div> 
                        <div class="form-group">
                            <h5 for="email_address" class="form-h5">Indirizzo Email:</h5>
                            <input class="form-control" type="text" placeholder="Inserisci indirizzo email" name="email" value="{{(Auth::user()) ? Auth::user()->email : old('email')}}">
                        </div> 
                        <div class="form-group">
                            <h5 for="message" class="form-h5">Oggetto Mail:</h5>
                            <input class="form-control" type="text" placeholder="Inserisci oggetto" name="subject" value="{{old('subject') }}">
                        </div>
                        <div class="form-group">
                            <h5 for="message" class="form-h5">Messaggio:</h5>
                            <textarea class="form-control" type="text" placeholder="Inserisci messaggio" name="content">{{old('content') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="btn my-btn">Invia</button>
                            <a href="{{ route('guest.home') }}" class="btn my-btn-delate">Annulla</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection