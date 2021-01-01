@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @forelse($recipes as $recipe)
            <div class="card">
                <div class="card-header">{{ __('$recipe->name') }}</div>

                <div class="card-body">
                    <div class="alert alert-warning">{{ __('You are viewing recipe page!') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Ingredients</div>
                        @forelse($recipe->ingredient as $ingredient)
                            <div class="card-body">{{ $ingredient->amount }} {{ $ingredient->name } ({{ $ingredient->note }})}</div>
                        @empty
                            <div class="card-body">{{ __('Nothing here. Please contact the recipe author.') }}</div>
                        @endforelse
                    </div>
                    <div class="card"></div>
                        @foreach($recipe->recipeDetailStep as $step)
                            <div>Free recipes:</div>
                            <div>Recipes:</div>
                            <div class="card">
                                @forelse($usr->recipe as $recipe)
                                    <div class="card-body">
                                        <div>{{ $step->step_no }}. {{ $step->text }}</div>
                                    </div>
                                @empty
                                    <div class="card-body">{{ __('Nothing here. Please contact the recipe author.') }}</div>
                                @endforelse
                            </div>
                            
                            <div>People followed by {{ $usr->name }}:</div>
                            <div class="card">
                                @forelse($usr->following as $fol)
                                    <div class="card-body">{{ $fol->name }}</div>
                                @empty
                                    <div class="card-body">{{ __('No followings yet.') }}</div>
                                @endforelse
                            </div>
                            <div>People following {{ $usr->name }}:</div>
                            <div class="card">
                                @forelse($recipe->review as $review)
                                    <div class="card-body">{{ $review->rating }}</div>
                                    <div class="card-body">{{ $review->text }}</div>
                                @empty
                                    <div class="card-body">{{ __('No reviews yet.') }}</div>
                                @endforelse
                            </div>
                        @endforeach
                </div>
            </div>
        @empty
            <div class="alert alert-warning">{{ __('Recipe not found') }}</div>
        @endforelse
        </div>
    </div>
</div>
@endsection
