@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pb-3">
            <a href="{{route('host.apartments.index')}}" class="btn btn-primary">Torna alla lista appartamenti</a>
        </div>
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('alert-message')}}
            </div>
        @endif
        <header>
            <h1>Lista dei messaggi ricevuti: </h1>
        </header>
        <table class="table">
            <thead>
                <th class="col">Apt_id</th>
                <th class="col">Email</th>
                <th class="col">Nome</th>
                <th class="col">Cognome</th>
                <th class="col">Oggetto</th>
                <th class="col">Orario</th>
            </thead>
            <tbody>
                @if ($messages->isNotEmpty())
                 @foreach ($messages as $message)
                    <tr>
                        <td style="white-space: nowrap">{{$message->apartment_id}}</td>
                        <td><a href="{{route('host.mail.show', $message)}}">{{$message->email}}</a></td>
                        <td style="white-space: nowrap">{{$message->name}}</td>
                        <td style="white-space: nowrap">{{$message->surname}}</td>
                        <td style="white-space: nowrap">{{$message->subject}}</td>
                        <td style="white-space: nowrap">{{$message->created_at}}</td>
                    </tr>
                 @endforeach
                @else
                    <tr>
                        <td colspan="3">Non ci sono appartamenti da visualizzare</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection