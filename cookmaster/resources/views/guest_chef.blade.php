@extends('layouts.home_menu')
@section('content-home')
<h4 class="text-center">Guest Chef</h4>
<div class="text-center">
    <img src="{{asset('asset/'.$recipe->image)}}" alt="{{$recipe->name}}" style="margin: 10px">
</div>
<p class="text-center">{{$recipe->name}}</p>
<div class="text-center">
    <button type="button" class="btn btn-primary" onclick="window.location.href='/recipe/{{$recipe->id}}'">View Recipe</button>
</div>
@endsection