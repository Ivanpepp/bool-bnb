@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('guest.home')}}" class="btn btn-primary">Vai alla home</a>
            <a href="{{route('host.apartments.index')}}" class="btn btn-primary">Accedi</a>
        </div>
    </div>
@endsection