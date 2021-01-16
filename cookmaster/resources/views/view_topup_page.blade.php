@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')
<div class="box-content-topup">
<div class="container">
    <div class="row">
        <div class="card-topup bg-light" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <p class="card-text">Name : <br> {{$data->username}}<br></p>
                <p class="card-text">Balance : <br> {{$data->balance}}<br></p>
                <p class="card-text">Tier : <br>{{$data->tier_name}}<br></p>
                <p class="card-text">Role : <br> {{$data->role}}</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="card-topup bg-light" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">TOP UP FORM</h5>
                <form action='/top-up' method='post'>
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data->user_id}}">
                        <label for="amount">Amount:</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount">
                        @if($errors->any())
                                    <div class="errors">{{ implode('', $errors->get('amount'))}}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Top Up</button>
                </form>
            </div>
        </div>
    </div>
    
    
</div>
</div>
@endsection
