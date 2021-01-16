@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 card bg-light" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Chef Information</h5>
                <p class="card-text">Name : <br>{{$chef->name}}</p>
                <p class="card-text">Paid recipes: <br>{{count($chef->paid_recipe)}}</p>
            </div>
        </div>
    <br>
    <br>    

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 card bg-light" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">SUBSCRIPTION FORM</h5>
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
    </div>
</div>
@endsection
