@extends('layouts.app')

@section('content')
<div class="chart-fix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-body shadow m-4 p-4">
                    <div class="row">
                        <div class="col-12 pt-4 pl-5">
                            <h3>Le tue statistiche per <strong class="my-text-blue"> "{{ $apartment->title }}" </strong></h3>
                            @if ($messagesCount > 1 || $messagesCount == 1)
                                <h3 class="pt-2">Hai ricevuto <a href="{{ route('host.mail.index', $apartment->id) }}">{{ $messagesCount }}
                                        messaggio/i</a> per questo appartamento.</h3>
                            @else
                                <h3 class="pt-2">Non hai ancora ricevuto messaggi per questo appartamento.</h3>
                            @endif
            
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12">
                            <address class="h5 pl-5 pt-2">Visite totali: {{ $visitsCount }}</address>
                        </div>
                    </div>
                    <div class="row" id="messStats" name="messStats" value="@php json_encode($days) @endphp">
                        <div class="col-12 p-5">

                            <h3>Andamento visite:</h3>
                            <div class="chart-container" style="position: relative; width:100%">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
        
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
