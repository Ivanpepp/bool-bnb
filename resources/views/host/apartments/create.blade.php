@extends('layouts.app')

@section('content')

    <div class="container">
        <header>
            <h1>Inserisci un nuovo appartamento</h1>
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
            <form action="{{route('host.apartments.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo dell' appartamento</label>
                    <input class="form-control form-control-lg" type="text" 
                    placeholder="Inserisci il titolo del post" id="title" name="title" value="{{ old('title', $apartment->title) }}">
                    {{-- old() richiede come primo parametro [obbligatorio] il valore da inserire quando torna alla compilazione con errori, se questo è vuoto inserisci il secondo parametro [facoltativo] --}}
                </div>

                

                <div class="form-group">
                    <label for="sponsorship_id">Categoria</label>
                    <select name="sponsorship_id" id="sponsorship_id">
                        <option value="{{null}}">Senza categoria</option>
                        @foreach ($sponsorships as $sponsorship)
                            <option 
                            @if (old('sponsorship_id') == $sponsorship->id) selected @endif
                            value="{{ $sponsorship->id }}">{{ $sponsorship->name }}</option>
                        @endforeach
                    </select>
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
                                                
                {{-- @dump(Auth::user()->id) --}}
                {{-- <div class="form-group">
                    <label for="user_id">Autore del post</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'autore del post" id="user_id" name="user_id" value="{{old("user_id", $post->user_id)}}" >
                </div> --}}

                <div class="form-group">
                    <label for="image_thumb">Immagine</label>
                    <input class="form-control" type="file" id="image_thumb" name="image_thumb[]" placeholder="Inserisci l'immagine dell'appartamento" value="{{old('image_thumb', $apartment->image_thumb)}}">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione dell'appartamento</label>
                    <textarea  class="form-control" type="textarea" placeholder="Inserisci la descrizione dell'appartamento" id="description" name="description" >{{old('description', $apartment->description) }} </textarea>
                </div> 
                <div class="form-group">
                    <label for="city">Città</label>
                    <input  class="form-control" type="text" placeholder="Inserisci la città" id="city" name="city" >{{old('city', $apartment->city) }} 
                </div> 
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input  class="form-control" type="text" placeholder="Inserisci l'indirizzo dell'appartamento" id="address" name="address" >{{old('address', $apartment->address) }} 
                </div> 
                <div class="form-group">
                    <label for="price">prezzo</label>
                    <input  class="form-control" type="text" placeholder="Inserisci il prezzo a notte" id="price" name="price" >{{old('price', $apartment->price) }} 
                </div> 
              

                

                <button type="submit" class="btn btn-primary">Crea</button>
                <button type="reset" class="btn btn-secondary">Cancella i dati</button>
            </form>
        </section>
    </div>
    
@endsection