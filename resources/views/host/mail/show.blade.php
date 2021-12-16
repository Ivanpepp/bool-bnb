@extends('layouts.app')

@section('content')
    <div class="my-mail-show">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="card pt-5">
                    <div class="card-body">
                        <h1 class="text-success"><strong>CASELLA MESSAGGIO!</strong></h1>
                        <h6 class="pt-2">Sei stato contattato da:</h6>
                        <h5> <strong>{{ $message->name }} {{ $message->surname }}</strong></h5>
                        <h6>Oggetto:</h6>
                        <p><strong>{{ $message->subject }}</strong></p>
                        <h6>Messaggio:</h6>
                        <p><strong>{{ $message->content }}</strong></p>
                        <h6>Data invio messaggio:</h6>
                        <address><strong>{{ $message->created_at }}</strong></address>
                        <h6>Contattare al seguente indirizzo email:</h6>
                        <address><a href="#">{{ $message->email }}</a></address>
                        <div>
                            <form class="my-5 d-flex justify-content-around"
                                action="{{ route('host.mail.destroy', $message->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt mr-2"></i>ELIMINA
                                    MESSAGGIO</button>
                                <a class="btn btn-primary" href="{{ route('host.mail.index') }}">Torna alla lista
                                    messaggi</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
