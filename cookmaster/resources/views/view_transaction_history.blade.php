@extends('layouts.app')
@section('content')
<div>
    {{-- udah bekerja, tinggal formatting + sesuaiin apa aja yang mau ditampilkan--}}
    {{-- kalau mau dicoba pake seeding doang, login sbg soobin@gmail.com , password: csb0512--}}
    @foreach($transactions as $transaction)
        id:{{$transaction->id}}
        senderid:{{$transaction->sender_id}}
        Amount:{{$transaction->amount}}
        Date:{{$transaction->date}}
        Message:{{$transaction->message}}
        <br>
    @endforeach
</div>
@endsection