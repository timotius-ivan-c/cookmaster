@extends('layouts.app')
@section('content')
<div class="container">
    {{-- Data chef --}}
    {{$chef->id}}
    {{$chef->name}}

    <form action='/subscribed' method='post'>
        {{csrf_field()}}
        <div class="form-group">
            <input type="hidden" name="id" value="{{$chef->id}}">

            <label for="duration">Duration:</label>
                <select class="custom-select" name="duration">
                <option selected value=0>Choose Duration</option>
                <option value=1>1 month</option>
                <option value=3>3 months</option>
                <option value=6>6 months</option>
                <option value=12>12 months</option>
                <option value=24>24 months</option>
            </select>

            <label for="message">Message:</label>
            <input type="text" name="message" class="form-control" id="message" placeholder="Enter message">
            
            @if($errors->any())
                <div class="errors">{{ implode('', $errors->get('duration'))}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
</div>
@endsection