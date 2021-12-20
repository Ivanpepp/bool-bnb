@extends('layouts.app')

@section('content')
    <div class="container mt-5 p-3  my-container-email">
        <div class="form-group">

            <h4 class="my-section-contact pb-2">Messaggio da {{$message->name}} {{$message->surname}}</h4>
            
            <h5 class="my-section-object pt-2 pb-2">Oggetto : {{$message->subject}}</h5>
            
            <div class="my-section-text pt-3 pl-2">
                <p class="pb-3">{{$message->content}}</p>
                <div class="pt-sm-5">
                    <p class="my-created-at pt-sm-5"><strong>{{$message->created_at}}</strong></p>
                </div>            
            </div>
            
            <h5 class="pt-4">Contattare al seguente indirizzo email : {{$message->email}}</h5>
        
        </div>

        <!-- SEZIONE BOTTONI -->
        <form class="my-5" action="{{route('host.mail.destroy', $message->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="my-btn-delate"><i class="far fa-trash-alt text-danger fa-lg"></i></button>
        </form>
        <a class="" href="{{route('host.mail.index')}}"><i class="fas fa-arrow-left"></i></a>
    </div>

@endsection