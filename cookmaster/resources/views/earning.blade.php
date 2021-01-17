@extends('layouts.app')
@section('namapage')
    class="background-1"
@endsection
@section('content')

<div class="box-content">
<h1><strong>Financial Report:<br<br><strong></h1>
<h4><br><br><strong>Total Subscribers:</strong><br></h4>
    <h5>    
    @if (!empty($count))
    {{$count}}
    @else
    0
    @endif
     people
</h5>
<h4><br><strong>Total Income:</strong><br></h4>
    <h5>
    @if (!empty($total_earnings))
    Rp. {{$total_earnings}}
    @else
    Rp. 0
    @endif
    </h5>
<br>
<br>
@if (!$transaction_details->isEmpty())
    <h4><strong>Transaction Details: </strong><br><br></h4>
    <table class="table table-light table-hover table-striped col-lg-12">
        <thead>
            <tr>
                <td>TransactionID</td>
                <td>Amount</td>
                <td>Info</td>
            </tr>
        </thead> 
        <tbody>
            
            @foreach ($transaction_details as $hello)
            <tr>
                <td>{{$hello->id}}</td>
                <td>Rp. {{$hello->amount}}</td>
                <td>{{$hello->message}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @else
    There is no transaction details!
@endif
</div>
@endsection
