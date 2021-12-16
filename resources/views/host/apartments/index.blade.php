@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="wrapper pt-5 pb-3">
            <div class="card">
                <div class="card-header">
                    {{__('Apartments')}}
                </div>
                <div class="card-body p-4">
                    <div class="text-center">
                        <i class="fas fa-hotel fa-5x mb-4"></i>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <th class="col">Titolo</th>
                            <th class="col d-none d-lg-table-cell">Città</th>
                            <th class="col d-none d-lg-table-cell">Indirizzo</th>
                            <th class="col d-none d-lg-table-cell">Servizi</th>
                            <th class="col">Sponsorizzazione</th>
                            <th class="col">Visibilità</th>
                            <th class="col"></th>
                            <th class="col"></th>
                        </thead>
                        <tbody>
                            @forelse ($apartments as $apartment)
                                <tr>
                                    <td><a href="{{route('host.apartments.show', $apartment)}}">{{$apartment->title}}</a></td>
                                    <td class="d-none d-lg-table-cell">{{$apartment->city}}</td>
                                    <td class="d-none d-lg-table-cell">{{$apartment->address}}</td>
                                    <td class="d-none d-lg-table-cell">
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
                                    <td>{{$apartment->is_visible}}</td>
                                
                                <td><a href="{{route('host.apartments.edit', $apartment)}}" role="button" class="btn btn-sm btn-warning text-dark">Modifica</a></td>
                                <td>
                                        <form action="{{route('host.apartments.destroy',$apartment)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nessuna inserzione da visualizzare</td>
                                </tr>
                            @endforelse
                        
                        </tbody>
                    </table>
                    <div class="d-flex flex-row-reverse">
                        <a class="btn btn-warning text-dark" style="width: 100%" href="{{route('host.apartments.create')}}">Nuovo</a>
                    </div>
                </div>
            </div>
            @if (session('deleted'))
            <div class="p-4">
                <div class="alert alert-success" role="alert">
                    {{session('alert-message')}}
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection