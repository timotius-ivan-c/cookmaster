@extends('layouts.app')
@section('namapage')
    class='background-2'
@endsection
@section('content')
<div class="box-content-form">
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header" id="recipe">
                Edit Recipe - {{$recipe->name}}
                <button class="btn btn-primary float-right" onclick="window.location='/profile/{{Auth::user()->id}}'">Done</button>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('recipe_success'))
            <div class="alert alert-success">{{ session('recipe_success') }}</div>
            @endif
            <div class="card-body" style="width: 100%;">
                @if($errors->any() && session('error_type')=='edit_recipe')
                    <div class="alert alert-danger">All recipe details must be filled.</div>
                @endif
                <div class="card-image"><img class="img-thumbnail" src="{{asset('storage/'.$recipe->image)}}" alt="recipe-img"></div>
                <form class="col-md-10" action="/edit-recipe/{{$recipe->id}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="edit" value="recipe">
                    
                    <div class="form-group">
                        <label class="col-md-4" for="name">Recipe Name: </label>
                        <input class="col-md-6" type="text" name="name" value="{{$recipe->name}}">
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4" for="recipe_type">Recipe Type: </label>
                        <select class="col-md-6" name="recipe_type" id="type">
                            <option @if($recipe->recipe_type==1) selected @endif value="1">Free Recipe</option>
                            <option @if($recipe->recipe_type==2) selected @endif value="2">Paid Recipe</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4" for="category">Recipe Category: </label>
                        <select class="col-md-6" name="category" id="category">
                            @foreach($categories as $category)
                            <option @if($recipe->recipe_category_id == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-sm btn-success float-right" type="submit" name="recipe_id" value="{{$recipe->id}}">Save Changes</button>
                </form>
                <form action="/edit-recipe/{{$recipe->id}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="delete" value="recipe">

                    <button class="btn btn-danger" type="submit" name="recipe_id" value="{{$recipe->id}}">Delete</button>
                </form>
            </div>

            <div class="card" id="ingredient">
                <div class="card-header">Ingredients</div>
                @if($errors->any() && session('error_type')=='new_ingredient')
                    <div class="alert alert-danger">Ingredient name must be filled.</div>
                @endif
                @if($errors->any() && session('error_type')=='edit_ingredient')
                    <div class="alert alert-danger">Can't update ingredient. Ingredient name must not be empty.</div>
                @endif
                @if(session('ingredient_success'))
                    <div class="alert alert-success">{{ session('ingredient_success') }}</div>
                @endif
                <div class="card-body">
                    @foreach($recipe->recipeDetailIngredient as $ingredient)
                    <!-- form to update each existing ingredient -->
                    <div class="row p-1">
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="edit" value="ingredient">
                            <input type="hidden" name="ingredient_id" value="{{$ingredient->id}}">
                            <input type="text" name="name" value="{{$ingredient->name}}" placeholder="name">
                            <input type="text" name="amount" value="{{$ingredient->amount}}" placeholder="amount (optional)">
                            <input type="text" name="notes" value="{{$ingredient->notes}}" placeholder="notes (optional)">
                            <button class="btn btn-success mr-1" type="submit" name="recipe_id" value="{{$recipe->id}}">Update</button>
                        </form>
                        <form action="/edit-recipe/{{$recipe->id}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="add" value="ingredient">
                            <input type="text" name="name" id="name" placeholder="ingredient name">
                            <input type="text" name="amount" id="amount" placeholder="amount, e.g. 3 tbsp">
                            <input type="text" name="notes" id="notes" placeholder="notes, e.g. minced">
                            <button type="submit" class="btn btn-primary" name="recipe_id" value="{{$recipe->id}}">+ Add</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="step">Steps</div>
                <div class="card-body">
                    @if($errors->any() && session('error_type')=='edit_step')
                        <div class="alert alert-danger">Can't update step. The step must be filled.</div>
                    @endif
                    @if($errors->any() && session('error_type')=='new_step')
                        <div class="alert alert-danger">Can't add step. The step must be filled.</div>
                    @endif
                    @if(session('step_success'))
                        <div class="alert alert-success">{{ session('step_success') }}</div>
                    @endif
                    @foreach($recipe->recipeDetailStep as $step)
                    <!-- form to edit each step -->
                    <div class="row p-1" style="vertical-align: middle;">
                        <div class="col-md-1">{{$step->step_no}}. </div>
                        <div style="display: inline-table;">
                            <form action="/edit-recipe/{{$recipe->id}}" method="post" >
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="edit" value="step">
                                <input type="hidden" name="step_id" value="{{$step->id}}">
                                <input type="hidden" name="step_no" value="{{$step->step_no}}">
                                <textarea cols="70" rows="5" class="col-md-12" name="text" value="{{$step->text}}" style="display: flexbox;">{{$step->text}}</textarea>
                                <button class="btn btn-success mr-1 float-left" type="submit" name="recipe_id" value="{{$recipe->id}}">Update</button>
                            </form>
                            <form class="float-left" action="/edit-recipe/{{$recipe->id}}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="delete" value="step">
                                <input type="hidden" name="step_id" value="{{$step->id}}">
                                <input type="hidden" name="step_no" value="{{$step->step_no}}">
                                <button class="btn btn-danger" type="submit" name="recipe_id" value="{{$recipe->id}}">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <div class="row p-1">
                        <div class="col-md-1">{{ count($recipe->recipeDetailStep)+1 }}.</div>
                        <form action="/edit-recipe/{{$recipe->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
</div>
@endsection
