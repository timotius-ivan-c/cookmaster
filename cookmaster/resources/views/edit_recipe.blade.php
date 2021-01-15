@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Edit Recipe - {{$recipe->name}}
                <button class="btn btn-primary float-right" onclick="window.location='/profile/{{Auth::user()->id}}'">Done</button>
            </div>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
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
                <div class="card-body">
                    @foreach($recipe->recipeDetailIngredient as $ingredient)
                    <!-- form to update each existing ingredient -->
                    <div class="row p-1">
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="edit" value="ingredient">
                            <input type="hidden" name="ingredient_id" value="{{$ingredient->id}}">
                            <input type="text" name="name" value="{{$ingredient->name}}">
                            <input type="text" name="amount" value="{{$ingredient->amount}}">
                            <input type="text" name="notes" value="{{$ingredient->notes}}">
                            <button class="btn btn-success mr-1" type="submit" name="recipe_id" value="{{$recipe->id}}">Update</button>
                        </form>
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="delete" value="ingredient">
                            <input type="hidden" name="ingredient_id" value="{{$ingredient->id}}">

                            <button class="btn btn-danger" type="submit" name="recipe_id" value="{{$recipe->id}}">Delete</button>
                        </form>
                    </div>
                    @endforeach
                    <div class="row p-1">
                        <!-- form to add new ingredient -->
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="add" value="ingredient">
                            <input type="text" name="name" id="name" placeholder="ingredient name">
                            <input type="text" name="amount" id="amount" placeholder="e.g. 3 tbsp, 2 stalks">
                            <input type="text" name="notes" id="notes" placeholder="e.g. minced, chopped, diced">
                            <button type="submit" class="btn btn-primary" name="recipe_id" value="{{$recipe->id}}">+ Add</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Steps</div>
                <div class="card-body">
                    @foreach($recipe->recipeDetailStep as $step)
                    <!-- form to edit each step -->
                    <div class="row p-1">
                        <div class="col-md-1">{{$step->step_no}}. </div>
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="edit" value="step">
                            <input type="hidden" name="step_id" value="{{$step->id}}">
                            <input type="hidden" name="step_no" value="{{$step->step_no}}">
                            <input type="text" name="text" value="{{$step->text}}">
                            <button class="btn btn-success mr-1" type="submit" value="">Update</button>
                        </form>
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="delete" value="step">
                            <input type="hidden" name="step_id" value="{{$step->id}}">
                            <input type="hidden" name="step_no" value="{{$step->step_no}}">
                            <button class="btn btn-danger" type="submit" name="recipe_id" value="{{$recipe->id}}">Delete</button>
                        </form>
                    </div>
                    @endforeach
                    <div class="row p-1">
                        <div class="col-md-1">{{ count($recipe->recipeDetailStep)+1 }}.</div>
                        <form action="/edit-recipe/{{$recipe->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="add" value="step">
                            <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                            
                                <input type="text" name="text" id="text" placeholder="add new step . . .">
                                <div class="row">
                                    <img id="image_show" src="">
                                    <label for="upload-file" class="browse-label">Image</label>
                                    <br><input type="file" class="btn btn-light form-control-file" id="upload-file" name="image" onchange="readURL(this)">
                                </div>
                                <button class="btn btn-primary" type="submit">+ Add</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection