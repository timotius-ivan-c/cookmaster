@extends('layouts.home_menu')
@section('namapage')
    class="background-4"
@endsection
@section('content-home')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recipes with ').$filter.': '.$query }}</div>

                <div class="alert alert-info">{{ __('Click on any card to view the full recipe') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (Auth::check())
                    <div class="card mb-5">
                        <div class="card-header bg-warning">Paid Recipes from Your Subscriptions</div>
                        @forelse($recipes_paid as $recipe)
                        <div class="card m-2" onclick="window.location='/recipe/view-recipe/{{$recipe->id}}'">
                            <div class="card-header"><a href="/recipe/view-recipe/{{$recipe->id}}">{{ $recipe->name }}</a></div>
                            <div class="card-body">
                                <div>Author: <a href="/profile/{{$recipe->user->id}}">{{ $recipe->user->name }}</a></div>
                                <div>Rating: {{ $recipe->average_rating }} / 5</div>
                                <div>Reviews: {{ $recipe->review_count }}</div>
                            </div>
                        </div>
                        @empty
                            <div class="card-body">{{ __('No results') }}</div>
                        @endforelse
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-danger">Free Recipes</div>
                        @forelse($recipes as $recipe)
                        <div class="card m-2" onclick="window.location='/recipe/view-recipe/{{$recipe->id}}'">
                            <div class="card-header"><a href="/recipe/view-recipe/{{$recipe->id}}">{{ $recipe->name }}</a></div>
                            <div class="card-body">
                                <div>Author: <a href="/profile/{{$recipe->user->id}}">{{ $recipe->user->name }}</a></div>
                                <div>Rating: {{ $recipe->average_rating }} / 5</div>
                                <div>Reviews: {{ $recipe->review_count }}</div>
                            </div>
                        </div>
                        @empty
                            <div class="card-body">{{ __('No results') }}</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
