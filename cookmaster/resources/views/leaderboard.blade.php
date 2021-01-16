@extends('layouts.app')
@section('namapage')
    class="leaderboard"
@endsection
@section('content')
<div class="box-content">
@if($type=='chef')
<h5><center>Top 20 Chef</center></h5>
    <table class="table">
        <thead>
            <tr>
              <th scope="col">Rank</th>
              <th scope="col">Name</th>
              <th scope="col">Fame</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-danger">
                <th scope="row">1</th>
                <td>{{$users[0]->name}}</td>
                <td>{{$users[0]->fame}}</td>
            </tr>
            <tr class="table-warning">
                <th scope="row">2</th>
                <td>{{$users[1]->name}}</td>
                <td>{{$users[1]->fame}}</td>
            </tr>
            <tr class="table-info">
                <th scope="row">3</th>
                <td>{{$users[2]->name}}</td>
                <td>{{$users[2]->fame}}</td>
            </tr>
            @for ($i=3;$i<count($users);$i++)
            <?php $index=$i+1?>
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$users[$i]->name}}</td>
                    <td>{{$users[$i]->fame}}</td>
                </tr>
            @endfor
    </table>
@elseif($type=='contributor')
<h5><center>Top 20 Contributor</center></h5>
    <table class="table">
        <thead>
            <tr>
              <th scope="col">Rank</th>
              <th scope="col">Name</th>
              <th scope="col">Fame</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-danger">
                <th scope="row">1</th>
                <td>{{$users[0]->name}}</td>
                <td>{{$users[0]->fame}}</td>
            </tr>
            <tr class="table-warning">
                <th scope="row">2</th>
                <td>{{$users[1]->name}}</td>
                <td>{{$users[1]->fame}}</td>
            </tr>
            <tr class="table-info">
                <th scope="row">3</th>
                <td>{{$users[2]->name}}</td>
                <td>{{$users[2]->fame}}</td>
            </tr>
            @for ($i=3; $i<count($users); $i++)
            <?php $index=$i+1?>
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$users[$i]->name}}</td>
                    <td>{{$users[$i]->fame}}</td>
                </tr>
            @endfor
    </table>

@endif
</div>
@endsection
