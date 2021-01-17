@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')
<div class="box-content-form">
<div class="container">
    <center-content>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 card bg-light" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <p class="card-text">ID user: <br>{{$user[0]->id}}<br></p>
                <p class="card-text">Name : <br> {{$user[0]->name}}<br></p>
            </div>
        </div>
    </div>
    </center-content>
    <br>
    <form method="post" action="/edit-profile">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="pw" placeholder="{{$user[0]->name}}" name="name">
          </div>
        <div class="form-group">
            <label for="mail">Email address</label>
            <input type="email" name="email" class="form-control" id="mail" placeholder="{{$user[0]->email}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="reset" class="btn btn-danger" onclick="history.back()">Cancel</button>
    </form>
</div>
</div>
@endsection
