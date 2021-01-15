@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check())
        @forelse ($hot_recipes as $hot)
            <div class="row">
            <div class="card col-md-6 bg-light ml-8" {{--onclick="window.location.href = ''//Latest recipe page--}} style="width: 40rem;">
                <img class="card-image-top" src="{{asset('asset/'.$hot->image)}}"> 
                <div class="card-body">   
                <div class="card-title"><strong>{{$hot->name}}</strong></div>
                <div class="card-text">        
                    Average rating  : <br>
                    {{$hot->average_rating}} / 5.00 <br> from {{$hot->review_count}} people <br><br>
                </div>
                </div>
            </div>
            </div>
            <br>
            <br>
        @empty
            
        @endforelse
        <br>
        @forelse ($best_recipes as $best)
            <div class="row">
            <div class="card col-md-6 bg-light ml-8" {{--onclick="window.location.href = ''//Latest recipe page--}} style="width: 40rem;">
                <img class="card-image-top" src="{{asset('asset/'.$best->image)}}"> 
                <div class="card-body">   
                <div class="card-title"><strong>{{$best->name}}</strong></div>
                <div class="card-text">        
                    Average rating  : <br>
                    {{$best->average_rating}} / 5.00 <br> from {{$best->review_count}} people <br><br>
                </div>
                </div>
            </div>
            </div>
            <br>
            <br>            
        @empty
            
        @endforelse
        <br>

        @forelse ($recipes as $recipe)
        <div class="row">
            <div class="card col-md-6 bg-light ml-8" {{--onclick="window.location.href = ''//Latest recipe page--}} style="width: 40rem;">
                <img class="card-image-top" src="{{asset('asset/'.$recipe->image)}}"> 
                <div class="card-body">   
                <div class="card-title"><strong>{{$recipe->name}}</strong></div>
                <div class="card-text">        
                    Average rating  : <br>
                    {{$recipe->average_rating}} / 5.00 <br> from {{$recipe->review_count}} people <br><br>
                </div>
                </div>
            </div>
            </div>
            <br>
            <br>
        @empty
            
        @endforelse
    @endif
</div>
@endsection
