<div class="container pt-4">
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
    </section>
    <div class="row justify-content-center p-4">
        <div class="col-md-8">
            <div class="card p-4">

                <div class="card-body">
                    <form action="           
                    {{  $request->routeIs('host.apartments.edit') ? route('host.apartments.update', $apartment) : route('host.apartments.store') }}
                
                    " method="POST" enctype="multipart/form-data">
                
                        @if($request->routeIs('host.apartments.edit')) 
                        
                            @method('PATCH')
                        
                        @endif
                
                        @csrf
                
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titolo Annuncio</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" 
                                placeholder="Inserisci il titolo del post" id="title" name="title" value="{{ old('title', $apartment->title) }}">
                            </div>
                        </div>

                        @if($request->routeIs('host.apartments.edit')) 
                        
                        @method('PATCH')

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Sponsorizzazione</label>
                            <div class="col-md-6 custom-radio custom-control-inline ">
                                @foreach ($sponsorships as $sponsorship)
                                
                                    <input {{ old("sponsorships") == $sponsorship['id'] ? 'checked' : '' }}   
                
                
                                    @if ( in_array( $sponsorship->id, old("sponsorships", $sponsorshipIds ? $sponsorshipIds : [] )))
                                     checked
                                    @endif
                                    
                                    
                                    type="radio" class="form-radio-input" id="sponsorship-{{ $sponsorship->id }}"
                                     value="{{$sponsorship->id}}"
                
                                      name="sponsorships[]">
                                        <label class="form-check-label p-2" for="sponsorship-{{$sponsorship->id}}">{{$sponsorship->type}}</label>    
                
                                @endforeach
                            </div>
                        </div>
                    
                        @endif
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Servizi</label>
                            <div class="col-md-6 custom-control custom-checkbox text-start pl-5">
                                @foreach ($features as $feature)
                                
                                    <input @if (in_array($feature->id, old('features' , $featureIds ? $featureIds : [])))
                                    checked @endif type="checkbox" class="form-check-input" id="feature-{{ $feature->id }}" value="{{$feature->id}}" name="features[]">
                                    <i class="my-text-blue {{$feature->icon}}"></i><label class="form-check-label pl-2" for="feature-{{$feature->id}}">{{$feature->title}}</label>
                                    <br>
                                @endforeach
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="city">Città</label>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" placeholder="Inserisci la città" id="city" name="city" value="{{old('city', $apartment->city) }} ">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="address">Indirizzo</label>
                           {{--  <input type="text" id="query" value=""> --}}
                            <div class="col-md-6">
                                <input  class="form-control" type="text" placeholder="Inserisci l'indirizzo dell'appartamento" id="address" name="address" value="{{old('address', $apartment->address) }} ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="p-3 mb-3">
                                        <span class="btn my-bg-blue text-white"  onclick= "searchMap()" >Genera</span>
                                    </div>
                                    <div >
                                        <div class="form-group d-flex align-items-center" style="margin-bottom: 0">
                                            <label class="p-2 pt-3" for="latitude">Lat</label>
                                            <input  class="form-control" type="text" id="latitude" name="latitude" value="{{old('latitude', $apartment->latitude) }} ">
                                        </div> 
                                        <div class="form-group d-flex align-items-center" style="margin-bottom: 0">
                                            <label class="p-2 pt-3" for="longitude">Lng</label>
                                            <input  class="form-control" type="text"  id="longitude" name="longitude" value="{{old('longitude', $apartment->longitude) }} ">
                                        </div> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="type">Tipologia locale</label>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" id="type" name="type" value="{{old('type', $apartment->type) }} ">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="total_guest">Numero max Ospiti</label>
                            <div class="col-md-6">
                                <input  class="form-control" total_guest="text" id="total_guest" name="total_guest" value="{{old('total_guest', $apartment->total_guest) }}"> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="total_room">Numero Stanze</label>
                            <div class="col-md-6">
                                <input  class="form-control" total_room="text" placeholder="inserisci il numero di stanze" id="total_room" name="total_room" value="{{old('total_room', $apartment->total_room) }} ">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="mq">Numero m²</label>
                            <div class="col-md-6">
                                <input  class="form-control" mq="text" placeholder="inserisci il numero di metri quadrati" id="mq" name="mq" value="{{old('mq', $apartment->mq) }} ">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="total_bathroom">Numero Bagni</label>
                            <div class="col-md-6">
                                <input  class="form-control" total_bathroom="text" placeholder="inserisci il numero dei bagni" id="total_bathroom" name="total_bathroom" value="{{old('total_bathroom', $apartment->total_bathroom) }} ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"  for="price">Prezzo</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Inserisci il prezzo a notte" id="price" name="price" value="{{old('price', $apartment->price) }} ">
                            </div>
                        </div>
                        @if($request->routeIs('host.apartments.create')) 
                        
                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="image_thumb">Galleria Immagini</label>
                            <div class="col-12">
                                <input class="form-control" type="file" id="image_thumb" multiple name="image_thumb[]" value="{{old('image_thumb', $apartment->image_thumb)}}">
                            </div>
                        </div>
          
                        @endif
            
                        @csrf

                        <div class="form-group row">
                            <label class="col-12 col-form-label" for="description">Descrizione</label>
                            <div class="col-12">
                                <textarea  class="form-control" type="textarea" placeholder="Inserisci la descrizione dell'appartamento" id="description" name="description" >{{old('description', $apartment->description) }} </textarea>
                            </div>
                        </div> 
                        <!-- <div class="form-group row">
                            <div class="col-6 d-flex align-items-center flex-row-reverse">
                                <div class="my-text-blue text-right pt-3 pb-3">
                                    <legend class="h5">Visibilità</legend>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center pt-3 pb-3">
                                    <div>
                                        <div class="form-radio">
                                            <input
                        
                                            @if ($request->routeIs('host.apartments.edit')) 
                                
                                                {{ old("is_visible") == '1' ? 'checked' : '' }}
                                            
                                                {{ 1 == $apartment->is_visible ? 'checked' : '' }}
                            
                                            @endif
                        
                                                {{ old('is_visible') == '1' ? 'checked' : '' }}
                                            
                                            type="radio" class="form-radio-input mx-2" id="is_visible" value="1" name="is_visible">
                        
                        
                                            <label class="form-check-label me-2" for="is_visible">Attiva</label> 
                                            <br>     
                                            
                                            <input
                        
                                            @if($request->routeIs('host.apartments.edit'))  
                                
                                                {{ old("is_visible") == '0' ? 'checked' : '' }}
                                
                                                {{ '0' == $apartment->is_visible ? 'checked' : '' }}
                            
                                            @endif
                        
                                            {{ old('is_visible') == '0' ? 'checked' : '' }}
                                            
                                            type="radio" class="form-radio-input mx-2" id="is_visible" value="0" name="is_visible">
                                            <label class="form-check-label me-2" for="is_visible">Spenta</label>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn my-bg-blue text-white mr-2 mb-2" style="width: 100%">
                                    {{ $request->routeIs('host.apartments.edit') ? "Modifica" : "Crea" }}
                                </button>
                            </div>
                            <div class="col-12">        
                                <button type="reset" class="btn bg-danger text-white" style="width: 100%">Cancella</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        let tt = window.tt;
         let handleResults= function(result){
            /* console.log(result);
            console.log('latitudine: '+ result.results[0].position.lat);
            console.log('longitudine: '+ result.results[0].position.lng); */
            
            document.getElementById('latitude').value = result.results[0].position.lat;
            document.getElementById('longitude').value = result.results[0].position.lng;


            
        };
        let searchMap = function(){
            tt.services.fuzzySearch({
                key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI',
                query: document.getElementById("address").value,

            }).go().then(handleResults);
        };
    </script>
    <style lang="scss" scoped>
        span{
            margin-top: 10px;
        }
    </style>