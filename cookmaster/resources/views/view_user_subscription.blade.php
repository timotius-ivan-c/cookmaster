@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')
<div class="container">
<div class="row">
    @foreach ($subscriptions as $subscription)
        <div class="card col-md-3 bg-light ml-5" {{--onclick="window.location.href = ''//resep detail yang paling baru--}} ;" style="width: 20rem;">
            {{-- <img class="card-image-top" src="{{asset('storage/'.$product->image)}}"> gambar image resep yang paling baru--}}
            <div class="card-body">Latest Recipe: <strong>{{ $subscription->recipe->first()->name }}</strong></div>
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
