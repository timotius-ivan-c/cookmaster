@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Edit Recipe - {{$recipe->name}}
                <button class="btn btn-primary float-right" onclick="window.location='/profile/{{Auth::user()->id}}'">Done</button>
            </div>
            @if(!empty($success))
            <div class="alert alert-success">{{ $success }}</div>
            @endif
            <div class="card-body">
                <div class="row">
                    <form class="col-md-10" action="/edit-recipe/{{$recipe->id}}" method="post">
                        @csrf
                        <input type="hidden" name="edit" value="recipe">
                        <label for="name">Recipe Name: </label>
                        <input type="text" name="name" value="{{$recipe->name}}">
                        <label for="recipe_type">Recipe Type: </label>
                        <select name="recipe_type" id="type">
                            <option @if($recipe->recipe_type==1) selected @endif value="1">Free Recipe</option>
                            <option @if($recipe->recipe_type==2) selected @endif value="2">Paid Recipe</option>
                        </select>

                        <label for="category">Recipe Category: </label>
                        <select name="category" id="category">
                            @foreach($categories as $category)
                            <option @if($recipe->recipe_category_id == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-sm btn-success" type="submit" name="recipe_id" value="{{$recipe->id}}">Save Changes</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Ingredients</div>
                <div class="card-body row">
                    @foreach($recipe->recipeDetailIngredient as $ingredient)
                    <form action="/edit-recipe/{{$recipe->id}}" method="post">
                        @csrf
                        <input type="hidden" name="edit" value="ingredient">
                        <input type="hidden" name="ingredient_id" value="{{$ingredient->id}}">
                        <input type="text" name="name" value="{{$ingredient->name}}">
                        <input type="text" name="amount" value="{{$ingredient->amount}}">
                        <input type="text" name="notes" value="{{$ingredient->notes}}">

                        <button class="btn btn-sm btn-success" type="submit" name="recipe_id" value="{{$recipe->id}}">Update</button>
                    </form>
                    <form action="/edit-recipe/{{$recipe->id}}" method="post">
                        @csrf
                        <input type="hidden" name="delete" value="ingredient">
                        <input type="hidden" name="ingredient_id" value="{{$ingredient->id}}">

                        <button class="btn btn-sm btn-danger" type="submit" name="recipe_id" value="{{$recipe->id}}">Delete</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection