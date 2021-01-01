@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">{{ $recipe->name }}</div>

                <div class="card-body">
                    <div class="alert alert-warning">{{ __('You are viewing recipe page!') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card mb-2">
                        <div class="card-header">Ingredients</div>
                        @forelse($recipe->recipeDetailIngredient as $ingredient)
                            <div class="card-body">{{ $ingredient->amount }} {{ $ingredient->name }} @if(!empty($ingredient->notes)) ({{ $ingredient->notes }}) @endif</div>
                        @empty
                            <div class="card-body">{{ __('Nothing here. Please contact the recipe author.') }}</div>
                        @endforelse
                    </div>
                    <div class="card mt-2">
                        <div class="card-header"> {{ __('Steps') }} </div>
                        @forelse($recipe->recipeDetailStep as $step)
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-md-1">{{ $step->step_no }}.</div>
                                    <div class="col-md-11">{{ $step->text }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="card-body">{{ __('Nothing here. Please contact the recipe author.') }}</div>
                        @endforelse
                    </div>
                            
                        <div class="card mt-2">
                            <div class="card-header">{{ __('Reviews') }}</div>
                            @forelse($recipe->review as $review)
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header"><strong>{{ $review->user->name }}</strong> <span class="float-right">Date: {{ $review->publish_date }}</span></div>
                                        <div class="card-body pb-0">Rating: {{ $review->rating }}</div>
                                        <div class="card-body">{{ $review->review_text }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="card-body">{{ __('No reviews yet.') }}</div>
                            @endforelse
                        </div>
                </div>
            </div>
        @if(empty($recipe))
            <div class="alert alert-warning">{{ __('Recipe not found') }}</div>
        @endif
        </div>
    </div>
</div>
@endsection
