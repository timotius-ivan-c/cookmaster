@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')
<div class="box-content-topup">
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

        <div class="card-topup bg-light" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Chef Information</h5>
                <p class="card-text">Name: <br>{{$chef->name}}</p>
                <p class="card-text">Type: <br>{{$chef->role->name}}</p>
                <p class="card-text">Paid recipes count: <br>{{count($chef->paid_recipe)}}</p>
            </div>
        </div>
    <br>
    <br>    

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class=" card-topup bg-light" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">Subscription Form</h5>
        <form action='/subscribe' method='post'>
            {{csrf_field()}}
            <div class="form-group">
                <input type="hidden" name="id" value="{{$chef->id}}">

                <label for="duration">Duration:</label>
                <select class="custom-select" name="duration" id="select">
                    <option selected value=0>Choose Duration</option>
                    <option value=1>1 month</option>
                    <option value=3>3 months</option>
                    <option value=6>6 months</option>
                    <option value=12>12 months</option>
                    <option value=24>24 months</option>
                </select>

                <div class="h5" id="total">Total Price: - </div>
                <div class="h6">Your Balance: {{$member->balance}}</div>

                @if($errors->any())
                    <div class="errors">{{ implode('', $errors->get('duration'))}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Subscribe</button>
            <button onclick="history.back()" type="reset" class="btn btn-danger">Cancel</button>
        </form>
        </div>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#select').on('change', function() {
        var duration = $('#select').find(":selected").val();
        @if($chef->role->name == 'Chef')
            $('#total').html('Total Price: ' + (30000*duration));
        @elseif($chef->role->name == 'Contributor')
            $('#total').html('Total Price: ' + (15000*duration));
        @endif
    });
});
</script>
@endsection
