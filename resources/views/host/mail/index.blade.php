@extends('layouts.app')

@section('content')
    <div class="container pt-3 mb-5" id="auth-index">
        <div class="wrapper row">
            <div class="col-12">
                <div class="pt-5">
                    <!-- <div class="card-header">{{ __('Messaggi') }}</div> -->
        
                    <div class="card-body shadow pt-5 ">
                        <table class="table table-hover p-2">
                            <thead class="d-none">
                                    <th class="col-6">Annuncio</th>
                                    <th class="col">Email</th>
                                    <th class="col"></th
                            </thead>
                            <tbody>
                                @if ($messages->isNotEmpty())
                                    @foreach ($messages as $message)
                                    <tr>
                                        <td class="col-6"><a class="my-text-blue" href="{{route('host.apartments.show', $message->apartment)}}">{{$message->apartment->title}}</a></td>
                                        <td>
                                            <div>
                                                <h6><b class="my-text-blue"> {{$message->email}} </b></h6>
                                                <span class="my-text-blue">Da: </span><span> {{$message->name}} {{$message->surname}}</span>
                                            </div>
                                            <div class="d-none d-xl-table-cell">
                                            <span class="my-text-blue">Oggetto: </span><span> {{$message->subject}}</span>
                                                <br>
                                                <span><small>{{$message->created_at}}</small></span>

                                            </div>    
                                        </td>
                                        <!-- <td class="d-none d-lg-table-cell">{{$message->name}} {{$message->surname}}</td>
                                        <td class="d-none d-xl-table-cell">{{substr($message->subject, 0, -15)}}</td>
                                        <td class="d-none d-lg-table-cell">{{$message->created_at}}</td> -->
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn btn-sm my-bg-blue btn-msg mr-2" href="{{route('host.mail.show', $message)}}">APRI</a>
                                                <form id="my-delete-msg"action="{{route('host.mail.destroy', $message->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:{}" onclick="document.getElementById('my-delete-msg').submit();">
                                                        <i class="far fa-trash-alt text-danger fa-lg"></i>
                                                    </a>
                                                </form>
                                            </div>    
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Nessuna messaggio da visualizzare</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- <div class="d-flex justify-content-center pt-4">
                            <a class="btn my-bg-blue text-white" href="{{route('host.apartments.index')}}" style="width: 100%">Inserzioni</a>
                        </div> -->
                    </div>
                    <!-- <div class="d-flex flex-row-reverse pr-5">
                        <a class="my-text-blue text-underline " href="#">Torna ai tuoi annunci</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection