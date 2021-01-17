@extends('layouts.app')
@section('content')

<div class="container" style="margin-bottom: 20px">
    <ul class="nav justify-content-center" style="background-color: #e3f2fd;">
        <li class="nav-item">
            <a class="nav-link" href="/home">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/recipe/best-recipe">BEST RECIPE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/guest-chef">GUEST CHEF</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/community">COMMUNITY</a>
        </li>
    </div>
    @yield('content-home')
</div>

@endsection
