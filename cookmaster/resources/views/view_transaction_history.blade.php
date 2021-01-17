@extends('layouts.home_menu')
@section('namapage')
    class="background-1"
@endsection
@section('content-home')
<div class="box-content">
    <h5><center>Transaction History</center></h5>
    <br>
    {{-- udah bekerja, tinggal formatting + sesuaiin apa aja yang mau ditampilkan--}}
    {{-- kalau mau dicoba pake seeding doang, login sbg soobin@gmail.com , password: csb0512--}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(!empty($transaction))
    <table class="table col-lg-12">
        <thead>
            <tr class="table-active">
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
    @else
    <div class="card-body" style="width: 25rem;"><center>You don't have any transaction.</center></div>
    @endif
    </table>
</div>
@endsection
