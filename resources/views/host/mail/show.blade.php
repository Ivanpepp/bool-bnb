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
        <form class="my-5" action="{{route('host.mail.destroy', $message->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">ELIMINA MESSAGGIO</button>
        </form>
        <a class="btn btn-primary" href="{{route('host.mail.index')}}">Torna alla lista messaggi</a>
    </div>

@endsection