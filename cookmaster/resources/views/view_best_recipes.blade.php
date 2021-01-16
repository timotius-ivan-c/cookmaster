@extends('layouts.app')

@section('content')
<div class="container">
    @if(empty($recipes))
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary active" id="filter-hot">Hot Recipes (Most Reviews)</button>
            <button class="btn btn-primary" id="filter-best">Best Recipes (Highest Rating)</button>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-header">
            Your Recipes:
        </div>
    </div>
    @endif
    
    <br>
    <div id="hot_recipes">
    @forelse ($hot_recipes as $hot)
    <div class="row">
        <div class="card col-md-6 bg-light ml-8" onclick="window.location.href='/recipe/view-recipe/{{$hot->id}}'" style="width: 40rem;">
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
    </div>
    
    <div id="best_recipes">
    @forelse ($best_recipes as $best)
    <div class="row">
        <div class="card col-md-6 bg-light ml-8" onclick="window.location.href='/recipe/view-recipe/{{$best->id}}'" style="width: 40rem;">
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
    </div>

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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#best_recipes").hide();
    $("#filter-hot").click(function(){
        $("#filter-hot").addClass("active");
        $("#filter-best").removeClass("active");
        $('#hot_recipes').show();
        $('#best_recipes').hide();
    });
    $("#filter-best").click(function(){
        $("#filter-hot").removeClass("active");
        $("#filter-best").addClass("active");
        $('#hot_recipes').hide();
        $('#best_recipes').show();
    });
});
</script>

@endsection
