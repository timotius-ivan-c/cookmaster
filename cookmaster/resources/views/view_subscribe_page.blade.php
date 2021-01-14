@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Data chef --}}
    {{$chef->id}}
    {{$chef->name}}

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action='/subscribe' method='post'>
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
            @if($errors->any())
                <div class="errors">{{ implode('', $errors->get('duration'))}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
</div>
@endsection