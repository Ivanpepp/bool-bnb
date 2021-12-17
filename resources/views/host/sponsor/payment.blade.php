@extends('layouts.app')

@section('content')
<input type="hidden" id="apartment" value="{{$apartment->id}}">
<div id="pay">

</div>
{{-- <script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-braintree/dist/vue-braintree.js"></script> --}}
<script src="{{asset('js/pay.js')}}">
    
</script>


@endsection
