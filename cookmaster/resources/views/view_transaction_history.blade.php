@extends('layouts.app')
@section('content')
<div class="container">
    {{-- udah bekerja, tinggal formatting + sesuaiin apa aja yang mau ditampilkan--}}
    {{-- kalau mau dicoba pake seeding doang, login sbg soobin@gmail.com , password: csb0512--}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table col-lg-12">
        <thead>
            <tr>
                <td>Transaction ID</td>
                <td>Date</td>
                <td>Token</td>
                <td>Amount</td>
                <td>Description</td>
            </tr>
        </thead>
        @foreach($transactions as $transaction)
        <tr>
        <td>{{$transaction->id}}</td>
        <td>{{$transaction->date}}</td> 
        <td>{{$transaction->token}}</td>
        <td>{{$transaction->amount}}</td> 
        <td>{{$transaction->message}}</td>
        </tr>   
    @endforeach
    </table>
</div>
@endsection
