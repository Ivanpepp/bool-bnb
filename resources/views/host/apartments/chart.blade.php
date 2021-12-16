@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row ">
            <div class="pt-5 col-12">
                <h1>Prova Grafico</h1>
                <canvas class="pt-5" id="myChart" style="position: relative; height:40vh; width:80vw"></canvas>
            </div>
        </div>
    </div>


    @foreach ($apartments as $apartment)
        <input type="hidden" value="{{ $apartment->created_at }}" id="aptDate">
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        let create = document.getElementById("aptDate.value");
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
                label: 'My First dataset',
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
                data: [0, 10, 5, 5, 20, 30, 25, 5, 10, 15, 30, 5],
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
