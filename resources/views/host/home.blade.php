@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i class="fas fa-house-user fa-5x mb-4"></i>
                    <br>
                    <!-- <a class="btn btn-warning" href="{{route('host.apartments.index')}}">I tuoi appartamenti</a> 
                    <br>
                    <a class="btn btn-warning" href="{{route('host.mail.index')}}">I tuoi messaggi</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
