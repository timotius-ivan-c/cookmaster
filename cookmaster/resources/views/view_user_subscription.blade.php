@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')
<div class="container">
<div class="row">
    @foreach ($subscriptions as $subscription)
        <div class="card col-md-3 bg-light ml-5" style="width: 24rem;">
            <div onclick="window.location='/recipe/view-recipe/{{$subscription->recipe->first()->id}}'">
                <img class="img-thumbnail" src="{{asset('storage/'.$subscription->recipe->first()->image)}}">
                <div class="card-body">Latest Recipe: <br><strong><a href="/recipe/view-recipe/{{$subscription->recipe->first()->id}}">{{ $subscription->recipe->first()->name }}</a></strong></div>
            </div>
            <a href="{{ url('profile', $subscription->chef->id) }}" style="text-decoration: none;">
            <div class="card-body">
            <h5 onclick="window.location='{{ url('profile', $subscription->chef->id) }}'" class="card-title">{{$subscription->chef->name }}</h5>
            <p class="card-text">
                Duration : {{$subscription->duration}} months<br>
                Starts : {{$subscription->start}}<br>
                End : {{$subscription->end}}
            </p>
            </div>
            </a>
        </div>
        
    @endforeach
</div>
</div>
@endsection
