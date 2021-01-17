@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')
<h1><strong>Financial Report:<br<br><strong></h1>
<h5><br><br>Total Subscribers:<br>{{$count}} people</h5>
<br>
<br>
<div class="box-content">
@if (!$transaction_details->isEmpty())
    <h5>Transaction Details: <br><br></h5>
    <table class="table table-light table-hover table-striped col-lg-12">
        <thead>
            <tr class="transaction-header table-primary">
                <th colspan="2">Total Income:  {{$total_earnings}}</th>
            </tr>
        </thead> 
        <tbody>
            <tr>
                <td>TransactionID</td>
                <td>Amount</td>
            </tr>
            @foreach ($transaction_details as $hello)
            <tr>
                <td>{{$hello->id}}</td>
                <td>{{$hello->amount}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @else
    There is no transaction details!
@endif
</div>
@endsection
