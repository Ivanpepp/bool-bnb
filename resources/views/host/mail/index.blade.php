@extends('layouts.app')

@section('content')
    <div class="container pt-3">
            <div class="wrapper row pb-3">
                <div class="col-12">
                    <div class="">
                        <!-- <div class="card-header">{{ __('Messaggi') }}</div> -->
            
                        <div class="card-body">
                                <table class="table table-hover p-2">
                                    <thead class="d-none">
                                            <th class="col">Annuncio</th>
                                            <th class="col">Email</th>
                                            <th class="col d-none d-lg-table-cell">Utente</th>
                                            <th class="col d-none d-xl-table-cell">Oggetto</th>
                                            <th class="col d-none d-lg-table-cell">Orario</th>
                                            <th class="col"></th>
                                            <th class="col"></th
                                    </thead>
                                    <tbody>
                                        @if ($messages->isNotEmpty())
                                         @foreach ($messages as $message)
                                            <tr>
                                                <td><a class="text-warnig" href="{{route('host.apartments.show', $message->apartment)}}">{{$message->apartment->title}}</a></td>
                                                <td>{{$message->email}}</td>
                                                <td class="d-none d-lg-table-cell">{{$message->name}} {{$message->surname}}</td>
                                                <td class="d-none d-xl-table-cell">{{substr($message->subject, 0, -15)}}</td>
                                                <td class="d-none d-lg-table-cell">{{$message->created_at}}</td>
                                                <td><a class="btn btn-sm btn-warning" href="{{route('host.mail.show', $message)}}">APRI</a></td>
                                                <td>
                                                    <form action="{{route('host.mail.destroy', $message->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                                    </form>
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
                            </div>
                    </div>
                </div>
            </div>
    </div>
@endsection