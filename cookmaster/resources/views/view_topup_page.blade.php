@extends('layouts.app')
@section('content')

<div class="container">
    {{-- Data pengguna --}}
    {{$data->user_id}}
    {{$data->username}}
    {{$data->balance}}
    {{$data->tier_name}}
    {{$data->role}}

    <form action='/top-up' method='post'>
        {{csrf_field()}}
        <div class="form-group">
            <input type="hidden" name="id" value="{{$data->user_id}}">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount">
            <label for="message">Message:</label>
            <input type="text" name="message" class="form-control" id="message" placeholder="Enter message">
            @if($errors->any())
                        <div class="errors">{{ implode('', $errors->get('amount'))}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Top Up</button>
    </form>
    
</div>
@endsection