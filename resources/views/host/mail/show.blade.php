@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <h4>{{$message->name}} {{$message->surname}} ti ha contattato.</h4>
            <h4>{{$message->subject}}</h4>
            <p>{{$message->content}}</p>
            <address>{{$message->created_at}}</address>
            <h4>Contattare al seguente indirizzo email: <address>{{$message->email}}</address></h4>
        </div>
        <a class="btn btn-primary" href="{{route('host.mail.index')}}">Torna alla lista messaggi</a>
    </div>

@endsection