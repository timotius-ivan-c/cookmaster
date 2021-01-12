@extends('layouts.app')
@section('content')
<div class="row">
    @foreach ($subscription as $subscription)
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 card bg-light" {{--onclick="window.location.href = ''//resep detail yang paling baru--}} ;" style="width: 20rem;">
            {{-- <img class="card-image-top" src="{{asset('storage/'.$product->image)}}"> gambar image resep yang paling baru--}}
            <div class="card-body">
            <h5 class="card-title">{{$subscription->chef_id}}</h5>{{--harusnya nama chef--}}
            <p class="card-text">
                Duration : {{$subscription->duration}} months<br>
                Starts : {{$subscription->start}}<br>
                End : {{$subscription->end}}
            </p>
            </div>
        </div>
        
    @endforeach
</div>
@endsection
