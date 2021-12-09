@extends('layouts.app')

@section('content')
    <div class="container">
        

        @if (count($errors) > 0)
        <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
           {{ session('success') }}
        </div> 
      @endif

        <h3 class="jumbotron">Laravel Multiple File Upload</h3>
        <form method="post" action="{{route('host.photos.store')}}" enctype="multipart/form-data">
        @csrf
        
                <div class="input-group control-group increment" >
                <input type="file" name="image_thumb[]" class="form-control" multiple>
                <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
                </div>
        
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
        
        </form>        
    </div>



   
@endsection