@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="pt-4">
                <h3>Le tue statistiche per <strong> "{{ $apartment->title }}" </strong></h3>
                @if ($messagesCount > 1 || $messagesCount == 1)
                    <h3 class="pt-2">Hai ricevuto <a href="{{ route('host.mail.index', $apartment->id) }}">{{ $messagesCount }}
                            messaggio/i</a> per questo appartamento.</h3>
                @else
                    <h1 class="pt-2">Non hai ancora ricevuto messaggi per questo appartamento.</h1>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="pt-2">
                <h3>Visite totali: {{ $visitsCount }}</h3>
            </div>
        </div>
        <div class="row pt-5" id="messStats" name="messStats" value="@php json_encode($hours) @endphp">
            <h3>Andamento visite:</h3>
            <div class="chart-container" style="position: relative; width:80vw">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        var hours = @JSON($hours);
        var hour = [];
        var visits = [];
        var previous = [];

        for (var i = 0; i < hours.length; i++) {
            if (hours[i] !== previous) {
                hour.push(hours[i]);
                visits.push(1);
            } else {
                visits[visits.length - 1]++;
            }
            previous = hours[i];
        }

        const data = {
            labels: hour,
            datasets: [{
                label: "Stats Visite",
                backgroundColor: 'rgb(255, 0, 0)',
                borderColor: "rgb(255, 0, 0)",
                data: visits,
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
