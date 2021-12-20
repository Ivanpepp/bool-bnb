@extends('layouts.app')

@section('content')
    <div class="container  p-3 border my-container-email" id="show-email">
        <div class="form-group">
            <h4>Messaggio da {{$message->name}} {{$message->surname}}</h4>
            <h6>Oggetto:{{$message->subject}}</h6>
            <div class="border">
                <p>{{$message->content}}</p>
                <address>{{$message->created_at}}</address>
            </div>
            <h4>Contattare al seguente indirizzo email: <address>{{$message->email}}</address></h4>
        </div>
        <form class="my-5" action="{{route('host.mail.destroy', $message->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">ELIMINA MESSAGGIO</button>
        </form>
        <a class="btn btn-primary" href="{{route('host.mail.index')}}">Torna alla lista messaggi</a>
    </div>

@endsection