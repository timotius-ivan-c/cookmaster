@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @forelse ($hot_recipes as $hot)
            <p>{{$hot->name}}</p>    
        @empty
            
        @endforelse
        <br>
        @forelse ($best_recipes as $best)
            <p>{{$best->name}}</p>
            
        @empty
            
        @endforelse
        <br>

        @forelse ($recipes as $recipe)
            <p>{{$recipe->name}}</p>
        @empty
            
        @endforelse
    @endif
    
@endsection