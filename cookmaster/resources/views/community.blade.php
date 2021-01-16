@extends('layouts.home_menu')
@section('namapage')
    class="background-4"
@endsection
@section('content-home')

<div class="container">
  <div class="row align-items-center">
    <div class="col">
      <a href="/recipe/{{$recipes[0]->id}}">
        <img src="{{asset('storage/'.$recipes[0]->image)}}" alt="{{$recipes[0]->name}}" class="img-grid">
      </a>
    </div>
    <div class="col">
      <a href="/recipe/{{$recipes[1]->id}}">
        <img src="{{asset('storage/'.$recipes[1]->image)}}" alt="{{$recipes[1]->name}}" class="img-grid">
      </a>
    </div>
    <div class="col">
      <a href="/recipe/{{$recipes[2]->id}}">
        <img src="{{asset('storage/'.$recipes[2]->image)}}" alt="{{$recipes[2]->name}}" class="img-grid">
      </a>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col">
      <a href="/recipe/{{$recipes[3]->id}}">
        <img src="{{asset('storage/'.$recipes[3]->image)}}" alt="{{$recipes[3]->name}}" class="img-grid">
      </a>
    </div>
    <div class="col">
      <a href="/recipe/{{$recipes[4]->id}}">
        <img src="{{asset('storage/'.$recipes[4]->image)}}" alt="{{$recipes[4]->name}}" class="img-grid">
      </a>
    </div>
    <div class="col">
      <a href="/recipe/{{$recipes[5]->id}}">
        <img src="{{asset('storage/'.$recipes[5]->image)}}" alt="{{$recipes[5]->name}}" class="img-grid">
      </a>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col">
      <a href="/recipe/{{$recipes[6]->id}}">
        <img src="{{asset('storage/'.$recipes[6]->image)}}" alt="{{$recipes[6]->name}}" class="img-grid">
      </a>
    </div>
    <div class="col">
      <a href="/recipe/{{$recipes[7]->id}}">
        <img src="{{asset('storage/'.$recipes[7]->image)}}" alt="{{$recipes[7]->name}}" class="img-grid">
      </a>
    </div>
    <div class="col">
      <a href="/recipe/{{$recipes[8]->id}}">
        <img src="{{asset('storage/'.$recipes[8]->image)}}" alt="{{$recipes[8]->name}}" class="img-grid">
      </a>
    </div>
  </div>
</div>

@endsection
