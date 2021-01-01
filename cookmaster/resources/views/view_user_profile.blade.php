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
                                <div class="card-body">{{ __('No recipe shared yet.') }}</div>
                            @endforelse
                        </div>
                        <div>Subscriptions:</div>
                        <div class="card">
                            @forelse($usr->subscription as $sub)
                                <div class="card-body">{{ $sub->start }}</div>
                            @empty
                                <div class="card-body">{{ __('No subscriptions yet.') }}</div>
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
                            @forelse($usr->followers as $fol)
                                <div class="card-body">{{ $fol->name }}</div>
                            @empty
                                <div class="card-body">{{ __('No followers yet.') }}</div>
                            @endforelse
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
