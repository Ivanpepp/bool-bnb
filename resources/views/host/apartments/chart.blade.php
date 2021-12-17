@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="pt-2">
                <h3>Le tue statistiche per <strong> "{{ $apartment->title }}" </strong></h3>
                @if ($messagesCount > 1 || $messagesCount == 1)
                    <h3>Hai ricevuto <a href="{{ route('host.mail.index', $apartment->id) }}">{{ $messagesCount }}
                            messaggio/i</a> per questo appartamento.</h3>
                @else
                    <h1>Non hai ancora ricevuto messaggi per questo appartmento.</h1>
                @endif

            </div>
        </div>
        <div class="row pt-5">
            <h3>Grafico Visite:</h3>
            <input id="id" type="hidden" name="aptvisit" value="{{ $apartment->id }}">
            <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = [
            'Gennaio',
            'Febbraio',
            'Marzo',
            'Aprile',
            'Maggio',
            'Giugno',
            'Luglio',
            'Agosto',
            'Settembre',
            'Ottobre',
            'Novembre',
            'Dicembre',
        ];
        const data = {
            labels: labels,
            datasets: [{
                backgroundColor: [
                    'rgb(255, 0, 0)',
                    'rgb(255, 255, 0)',
                    'rgb(255, 128, 0)',
                    'rgb(0, 255, 0)',
                    'rgb(0, 255, 128)',
                    'rgb(0, 255, 255)',
                    'rgb(0, 128, 255)',
                    'rgb(0, 0, 255)',
                    'rgb(128, 255, 0)',
                    'rgb(128, 0, 255)',
                    'rgb(255, 0, 255)',
                    'rgb(255, 0, 128)',
                ],
                data: [5, 2, 5, 6, 8, 9, 10, 10, 7, 4, 2, 8],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
