@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <div class="alert alert-warning">{{ __('You are viewing profile page!') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($user as $usr)
                        <div>Name: {{ $usr->name }}</div>
                        <div>Free recipes: {{ $usr->free_recipes_count }}</div>
                        <div>Recipes:</div>
                        <div class="card">
                            @forelse($usr->recipe as $recipe)
                                <div class="card-body">{{ $recipe->name }}</div>
                            @empty

                            @endforelse
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
