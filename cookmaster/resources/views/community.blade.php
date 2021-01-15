@extends('layouts.home_menu')
@section('content-home')
<div class="container">
  <div class="row align-items-center">
    <div class="col">
      <img src="{{asset('storage/recipes/'.$recipes[0]->image)}}" alt="{{$recipes[0]->name}}">
    </div>
    <div class="col">
      <img src="{{$recipes[1]->image}}" alt="{{$recipes[1]->name}}">
    </div>
    <div class="col">
      <img src="{{$recipes[2]->image}}" alt="{{$recipes[2]->name}}">
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col">
      <img src="{{$recipes[3]->image}}" alt="{{$recipes[3]->name}}">
    </div>
    <div class="col">
      <img src="{{$recipes[4]->image}}" alt="{{$recipes[4]->name}}">
    </div>
    <div class="col">
      <img src="{{$recipes[5]->image}}" alt="{{$recipes[5]->name}}">
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col">
      <img src="{{$recipes[6]->image}}" alt="{{$recipes[6]->name}}">
    </div>
    <div class="col">
      <img src="{{$recipes[7]->image}}" alt="{{$recipes[7]->name}}">
    </div>
    <div class="col">
      <img src="{{$recipes[8]->image}}" alt="{{$recipes[8]->name}}">
    </div>
  </div>
</div>
@endsection