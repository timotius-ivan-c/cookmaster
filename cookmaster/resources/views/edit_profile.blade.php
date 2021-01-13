@extends('layouts.app')
@section('content')
id:{{$user[0]->id}}
name:{{$user[0]->name}}

<div class="container">
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
    </form>
</div>
@endsection