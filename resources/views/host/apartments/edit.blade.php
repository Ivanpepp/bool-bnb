@extends('layouts.app')

@section('content')

    <div class="container">
        <header>
            <h1>Modifica appartamento</h1>
        </header>

        <section id="post-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>        
            @endif
            <form action="{{route('host.apartments.update', $apartment)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Titolo dell' appartamento</label>
                    <input class="form-control form-control-lg" type="text" 
                    placeholder="Inserisci il titolo del post" id="title" name="title" value="{{ old('title', $apartment->title) }}">
                  
                </div>

        
                <div class="form-group">
                    <legend class="h5">Sponsorizzazione: </legend>
                    <div class="form-radio form-radio-inline">
                        @foreach ($sponsorships as $sponsorship)
                            <input  type="radio" class="form-radio-input mx-2" id="sponsorship-{{ $sponsorship->id }}" value="{{$sponsorship->id}}" name="sponsorships">
                            <label class="form-check-label me-2" for="sponsorship-{{$sponsorship->id}}">{{$sponsorship->type}}</label>    
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <legend class="h5">Servizi</legend>
                    <div class="form-check form-check-inline">
                        @foreach ($features as $feature)
                            <input @if (in_array($feature->id, old('features' , $featureIds ? $featureIds : [])))
                            checked @endif type="checkbox" class="form-check-input mx-2" id="feature-{{ $feature->id }}" value="{{$feature->id}}" name="features[]">
                            <label class="form-check-label me-2" for="feature-{{$feature->id}}">{{$feature->title}}</label>    
                        @endforeach
                    </div>
                </div>
                                                
              
                 

                <div class="form-group">
                    <label for="image_thumb">Immagine</label>
                    <input class="form-control" type="file" id="image_thumb" multiple name="image_thumb[]" placeholder="Inserisci l'immagine dell'appartamento" value="{{old('image_thumb', $apartment->image_thumb)}}">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione dell'appartamento</label>
                    <textarea  class="form-control" type="textarea" placeholder="Inserisci la descrizione dell'appartamento" id="description" name="description" >{{old('description', $apartment->description) }} </textarea>
                </div> 
                <div class="form-group">
                    <label for="city">Città</label>
                    <input  class="form-control" type="text" placeholder="Inserisci la città" id="city" name="city" value="{{old('city', $apartment->city) }} ">
                </div> 
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input  class="form-control" type="text" placeholder="Inserisci l'indirizzo dell'appartamento" id="address" name="address" value="{{old('address', $apartment->address) }} ">
                </div> 
                <div class="form-group">
                    <label for="price">prezzo</label>
                    <input  class="form-control" type="text" placeholder="Inserisci il prezzo a notte" id="price" name="price" value="{{old('price', $apartment->price) }} ">
                </div> 
                <div class="form-group">
                    <label for="latitude">Latitudine</label>
                    <input  class="form-control" type="text" placeholder="inserisci la latitudine" id="latitude" name="latitude" value="{{old('latitude', $apartment->latitude) }} ">
                </div> 
                <div class="form-group">
                    <label for="longitude">Longitudione</label>
                    <input  class="form-control" type="text" placeholder="inserisci la longitudine" id="longitude" name="longitude" value="{{old('longitude', $apartment->longitude) }} ">
                </div> 
                <div class="form-group">
                    <label for="type">Tipo di appartamento </label>
                    <input  class="form-control" type="text" placeholder="inserisci il tipo di appartamento" id="type" name="type" value="{{old('type', $apartment->type) }} ">
                </div> 
                <div class="form-group">
                    <label for="total_room">Numero Stanze</label>
                    <input  class="form-control" total_room="text" placeholder="inserisci il numero di stanze" id="total_room" name="total_room" value="{{old('total_room', $apartment->total_room) }} ">
                </div> 
                <div class="form-group">
                    <label for="total_guest">Numero Ospiti</label>
                    <input  class="form-control" total_guest="text" placeholder="inserisci il numero di persone che puo ospitare" id="total_guest" name="total_guest" value="{{old('total_guest', $apartment->total_guest) }}"> 
                </div> 
                <div class="form-group">
                    <label for="total_bathroom">Numero Bagni</label>
                    <input  class="form-control" total_bathroom="text" placeholder="inserisci il numero dei bagni" id="total_bathroom" name="total_bathroom" value="{{old('total_bathroom', $apartment->total_bathroom) }} ">
                </div> 
                <div class="form-group">
                    <label for="mq">Numero mq</label>
                    <input  class="form-control" mq="text" placeholder="inserisci il numero di metri quadrati" id="mq" name="mq" value="{{old('mq', $apartment->mq) }} ">
                </div> 
                <div class="form-group">
                    <select name="is_visible" id="is_visible">
                        <option value="{{null}}">nessuna selezione</option>
                        <option @if (old($apartment->is_visible)==$apartment->is_visible) selected @endif value="{{true}}">visibile</option>
                        <option @if (old($apartment->is_visible)==$apartment->is_visible) selected @endif value="{{false}}">non visibile</option>
                   
                    </select>
                </div> 
              

                

                <button type="submit" class="btn btn-primary">Modidica</button>
                <button type="reset" class="btn btn-secondary">Cancella i dati</button>
            </form>
        </section>
    </div>

    
    
@endsection