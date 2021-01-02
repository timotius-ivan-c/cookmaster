@extends('layouts.app')
@section('content')
<div>
    {{-- udah bekerja, tinggal formatting + sesuaiin apa aja yang mau ditampilkan--}}
    @foreach($transactions as $transaction)
        id:{{$transaction->id}}
        senderid:{{$transaction->sender_id}}
        Amount:{{$transaction->amount}}
        Date:{{$transaction->date}}
    @endforeach
</div>
@endsection