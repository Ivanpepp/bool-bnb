@extends("layouts.app")
@section("content")
<div class="container pt-5" id="my-thanks-wrap">
    <div class="my-border-wrap border shadow p-lg-5 {{-- m-lg-5  --}}p-sm-2 {{-- m-sm-2 mt-sm-5 --}} ">
        <div class="row  d-flex justify-content-center ">
            <h1 class=" text-center col-lg-12 col-sm-10 pt-5 pb-4  pt-sm-3 text-uppercase my-text-color">Grazie per averci contattato!</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center pt-sm-1 mt-sm-1 {{-- pt-lg-5 mt-lg-5 --}} pb-sm-3">
            <a href="{{route("guest.home")}}" class="btn my-btn ">Torna alla home</a>
        </div>
    </div>
</div>
@endsection