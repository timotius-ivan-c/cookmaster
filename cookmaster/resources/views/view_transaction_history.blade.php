@extends('layouts.app')
@section('content')
<div>
    {{-- udah bekerja, tinggal formatting + sesuaiin apa aja yang mau ditampilkan--}}
    {{-- kalau mau dicoba pake seeding doang, login sbg soobin@gmail.com , password: csb0512--}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @foreach($transactions as $transaction)
        <div class="card">
            <span>id: {{$transaction->id}} - senderid: {{$transaction->sender_id}} - Amount: {{$transaction->amount}} - Date: {{$transaction->date}} - Message: {{$transaction->message}}</span>
        </div>
    @endforeach
</div>
@endsection