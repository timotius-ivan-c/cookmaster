@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recipes with ').$filter.': '.$query }}</div>

                <div class="card-body">
                    <div class="alert alert-warning">{{ __('You are viewing filtered recipes page!') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (Auth::check())
                    <div class="card mb-5">
                        <div class="card-header bg-warning">Paid Recipes from Your Subscriptions</div>
                        @forelse($recipes_paid as $recipe)
                        <div class="card m-2">
                            <div class="card-header">
                                <div>Title: {{ $recipe->name }}</div>
                                <div>Author: {{ $recipe->user->name }}</div>
                            </div>
                            <div class="card-body">Ingredients:</div>
                            <div class="card">
                                @forelse($recipe->recipeDetailIngredient as $ingredient)
                                    <div class="card-body">{{ $ingredient->amount }} {{ $ingredient->name }} @if(!empty($ingredient->notes)) ({{ $ingredient->notes }}) @endif</div>
                                @empty
                                    <div class="card-body">{{ __('No ingredient added yet.') }}</div>
                                @endforelse
                            </div>
                            <div class="card-body">Steps:</div>
                            <div class="card">
                                @forelse($recipe->recipeDetailStep as $step)
                                    <div class="card-body">{{ $step->step_no }}. {{ $step->text }}</div>
                                @empty
                                    <div class="card-body">{{ __('No steps added yet.') }}</div>
                                @endforelse
                            </div>
                        </div>
                        @empty
                            <div class="card">{{ __('No results') }}</div>
                        @endforelse
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-danger">Free Recipes</div>
                        @forelse($recipes as $recipe)
                        <div class="card m-2">
                            <div class="card-header">
                                <div>Title: {{ $recipe->name }}</div>
                                <div>Author: {{ $recipe->user->name }}</div>
                            </div>
                            <div class="card-body">Ingredients:</div>
                            <div class="card">
                                @forelse($recipe->recipeDetailIngredient as $ingredient)
                                    <div class="card-body">{{ $ingredient->amount }} {{ $ingredient->name }} @if(!empty($ingredient->notes)) ({{ $ingredient->notes }}) @endif</div>
                                @empty
                                    <div class="card-body">{{ __('No ingredient added yet.') }}</div>
                                @endforelse
                            </div>
                            <div class="card-body">Steps:</div>
                            <div class="card">
                                @forelse($recipe->recipeDetailStep as $step)
                                    <div class="card-body">{{ $step->step_no }}. {{ $step->text }}</div>
                                @empty
                                    <div class="card-body">{{ __('No steps added yet.') }}</div>
                                @endforelse
                            </div>
                        </div>
                        @empty
                            <div class="card">{{ __('No results') }}</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
