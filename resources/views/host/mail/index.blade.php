@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('alert-message')}}
            </div>
        @endif
        <div class="card p-3">

            <header class="p-2">
                <i class="far fa-envelope fa-lg fa-4x text-danger"></i>
            </header>
            <table class="table">
                <thead>
                    <th class="col-4">Apartment</th>
                    <th class="col-2">Email</th>
                    <th class="col-2">Nome</th>
                    <th class="col-2">Cognome</th>
                    <th class="col-2">Oggetto</th>
                    <th class="col-2">Orario</th>
                    <th class="col-2"></th>
                </thead>
                <tbody>
                    @if ($messages->isNotEmpty())
                     @foreach ($messages as $message)
                        <tr>
                            <td><a href="{{route('host.apartments.show', $message->apartment)}}">{{substr($message->apartment->title, 0, -20)}}</a></td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->surname}}</td>
                            <td>{{substr($message->subject, 0, -15)}}</td>
                            <td>{{$message->created_at}}</td>
                            <td><a class="btn btn-danger" href="{{route('host.mail.show', $message)}}">APRI</a></td>
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
    </div>
@endsection