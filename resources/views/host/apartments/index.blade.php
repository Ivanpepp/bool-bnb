@extends('layouts.app')

@section('content')
<!-- <div class="container pt-5">
    <div class="row">
        @forelse ($apartments as $apartment)
        <div class="col-12 d-flex p-2">
            <div class="col-5">
                <div class="my-apt-head">
                    <a class="my-text-blue" href="{{route('host.apartments.show', $apartment)}}">{{$apartment->title}}</a>
                </div>
            </div>
            <div class="col-5">
                <div class="my-apt-info">
                    <h6>{{$apartment->city}}</h6>
                    <address class="h6">{{$apartment->address}}</address>
                    <span class="">
                        @forelse ($apartment->features as $feature)

                        <span class="badge badge-pill text-white" style="background-color: {{ $feature->color }}">{{$feature->title}}</span>

                        @empty
                        nessun feature
                        @endforelse
                    </span>
                    <span>
                        @forelse ($apartment->sponsorships as $sponsor)

                        <span class="badge badge-pill">{{$sponsor->type}}</span>

                        @empty
                        Nessuna
                        @endforelse
                    </span>
                    <span>{{ $apartment->is_visible == 1 ? 'Attiva': 'Spenta'}}</span>
                </div>
            </div>
            <div class="col-2">
                <div class="my-apt-btn d-flex flex-column">
                                    <a href="{{route('host.payment', $apartment->id)}}">
                                        <i class="my_blue fas fa-medal"></i>
                                    </a>
                                    <a href="{{route('host.apartments.edit', $apartment)}}" role="button">
                                        <i class="text-warning far fa-edit"></i>
                                    </a>
                                
                                    <form id="my-delete-form"action="{{route('host.apartments.destroy',$apartment)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:{}" onclick="document.getElementById('my-delete-form').submit();">
                                            <i class="far fa-trash-alt text-danger"></i>
                                        </a>
                                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <h4 colspan="3">Nessuna inserzione da visualizzare</h4>
        </div>
        @endforelse
    </div>
</div> -->
<div class="container pt-3">
    <div class="wrapper pb-3 row">

        <div class="col-12">
            <div class="">
                <!-- <div class="card-header text-center d-flex justify-content-center align-items-center">
                    <i class="fas fa-hotel fa-3x my-text-blue p-2"></i>
                    <h4 class="pl-3 pt-3"> Annunci di <span class="my-text-blue"> {{ Auth::user()->name }} </span></h4>
                </div> -->
                <div class="card-body">    
                    <table class="table table-hover">
                        <thead class="my_bg-black d-none">
                            <th class="col-6 my-text-blue">Titolo</th>
                            <th class="col d-none d-lg-table-cell  my-text-blue">Servizi</th>
                            <th class="col  my-text-blue">Sponsor</th>
                            <th class="col  my-text-blue">Visibilità</th>
                            <th class="col"></th>
                        </thead>
                        <tbody>
                            @forelse ($apartments as $apartment)
                            <tr>
                                <td class="col-6"><a class="my-text-blue" href="{{route('host.apartments.show', $apartment)}}">{{$apartment->title}}</a></td>
                                <!-- <td class="d-none d-lg-table-cell">{{$apartment->city}}, {{$apartment->address}}</td> -->
                                <td class="d-none d-lg-table-cell">
                                    <address> {{$apartment->city}}, {{$apartment->address}}</address>
                                    @forelse ($apartment->features as $feature)
    
                                    <span class="badge badge-pill text-white" style="background-color: {{$feature->color}}">{{$feature->title}}</span>
    
                                    @empty
                                    nessun feature
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($apartment->sponsorships as $sponsor)
                                        @if ($sponsor->type == "Gold")
                                        <span class="h6 text-warning"><b>{{$sponsor->type}}</b></span>
                                        <br>
                                        @elseif ($sponsor->type == "Premium")
                                        <span class="h6 my-text-blue"><b>{{$sponsor->type}}</b></span>
                                        <br>
                                        @else
                                        <span class="h6 text-secondary"><b>{{$sponsor->type}}</b></span>
                                        <br>
                                        @endif
                                        @if ($apartment->is_visible == 1)
                                        <span class="badge bg-success text-white">
                                            Attiva
                                        </span>
                                        @else
                                        <span class="badge bg-danger text-white">
                                            Spenta
                                        </span>
                                        @endif
                                    @empty
                                    Nessuna
                                    @endforelse
                                </td>
                                <td>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="{{route('host.payment', $apartment->id)}}">
                                            <i class="my_blue fas fa-medal fa-md"></i>
                                        </a>
                                        <a href="{{route('host.apartments.edit', $apartment)}}" role="button">
                                            <i class="text-dark far fa-edit fa-md"></i>
                                        </a>
                                    
                                        <form id="my-delete-form"action="{{route('host.apartments.destroy',$apartment)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:{}" onclick="document.getElementById('my-delete-form').submit();">
                                                <i class="far fa-trash-alt text-danger fa-md"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Nessuna inserzione da visualizzare</td>
                            </tr>
                            @endforelse
    
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        <a class="btn my-bg-blue text-white" href="{{route('host.apartments.create')}}" style="width: 100%">Nuovo</a>
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
</div>
@endsection