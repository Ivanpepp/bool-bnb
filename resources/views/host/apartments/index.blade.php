@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('alert-message')}}
            </div>
        @endif
<<<<<<< HEAD

        <div class="wrapper pt-5">
            <div class="card">
                <div class="card-header">
                    {{__('Apartments')}}
                </div>
                <div class="card-body p-4">
                <div class="text-center">
                    <i class="fas fa-hotel fa-5x mb-4"></i>

                </div>

                <table class="table">
                    <thead>
                        <th class="col-4">Titolo</th>
                        <th class="col-2">Città</th>
                        <th class="col-2">Indirizzo</th>
                        <th class="col-2">Servizi</th>
                        <th class="col-2">Sponsorizzazione</th>
                        <th class="col-2">Visibilità</th>
                        <th class="col"></th>
                        <th class="col"></th>
                    </thead>
                    <tbody>
                        @forelse ($apartments as $apartment)
                            <tr>
                                <td><a href="{{route('host.apartments.show', $apartment)}}">{{$apartment->title}}</a></td>
                                <td>{{$apartment->city}}</td>
                                <td>{{$apartment->address}}</td>
                                <td>
                                    @forelse ($apartment->sponsorships as $sponsor)
                                    
                                    <span class="badge badge-pill">{{$sponsor->type}}</span>
                                    
                                    @empty
                                    nessuna sponsorizzazione
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($apartment->features as $feature)
                                    
                                    <span class="badge badge-pill" style="background-color: {{$feature->color}}">{{$feature->title}}</span>
                                    
                                    @empty
                                    nessun feature
                                    @endforelse
                                </td>
                                <td>{{$apartment->is_visible}}</td>
                               
                               <td><a href="{{route('host.apartments.edit', $apartment)}}" class="btn btn-warning text-dark">Modifica</a></td>
                               <td>
                                    <form action="{{route('host.apartments.destroy',$apartment)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Non ci sono appartamenti da visualizzare</td>
                            </tr>
                        @endforelse
=======
        <header>
            <h1>Lista degli appartamenti </h1>
            <a class="btn btn-primary my-5" href="{{route('host.apartments.create')}}">Inserisci nuovo appartamento</a>
        </header>
        <table class="table">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Città</th>
                <th class="col">Indirizzo</th>
                <th class="col">Visibilità</th>
                <th class="col">Servizi</th>
                <th class="col">Sponsorizzazione</th>
                <th class="col">Sponsorizza</th>
            </thead>
            <tbody>
                @forelse ($apartments as $apartment)
                    <tr>
                        <td><a href="{{route('host.apartments.show', $apartment)}}">{{$apartment->title}}</a></td>
                        <td>{{$apartment->city}}</td>
                        <td>{{$apartment->address}}</td>
                        <td>{{$apartment->is_visible}}</td>
                        <td>
                            @forelse ($apartment->features as $feature)
                                
                                    <span class="badge badge-pill" style="background-color: {{$feature->color}}">{{$feature->title}}</span>
                                
                            @empty
                                nessun feature
                            @endforelse
                        </td>
                        <td>
                            @forelse ($apartment->sponsorships as $sponsor)
                                
                                    <span class="badge badge-pill">{{$sponsor->type}}</span>
                                
                            @empty
                                nessuna sponsorizzazione
                            @endforelse
                        </td>
                        <td><a href="{{route('host.payment', $apartment->id)}}" class="btn btn-primary">Sponsorizza</a></td>
>>>>>>> pay-imp
                       
                    </tbody>
                </table>
                <hr>
                <div class="d-flex flex-row-reverse">
                    <a class="btn btn-warning text-dark" style="width: 100%" href="{{route('host.apartments.create')}}">Nuovo</a>
                </div>
            </div>
        </div>
        <header>
        {{-- <footer class=" ">
             <div class="container">
                 <div class="row justify-content-center mt-5 shadow-lg">
                    {{$apartments->links()}}
                 </div>
             </div>
        </footer> --}}
    </div>
@endsection