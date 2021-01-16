@extends('layouts.app')
@section('namapage')
    class="background-2"
@endsection
@section('content')
<div class="container">
    <div class="box-content-form">
    @if($step == 0)
    <!-- disini user mau masukin judul, foto, tipe, dan kategori resep -->
    <form method="post" action="/new-recipe" enctype="multipart/form-data">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $msg)
                {{$msg}}<br>
                @endforeach
            </div>
        @endif
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Recipe Name</label>
            <input type="text" class="form-control" id="pw" placeholder="Input recipe title . . ." name="name">
          </div>

        <br><img id="image_show" src="">
        <div class="form-group">
            <label for="upload-file" class="browse-label">Recipe Image</label>
            <div class="">
                <input type="file" class="form-control-file x" id="upload-file" name="image" onchange="readURL(this)">
            </div>
        </div>

        <div class="form-group">
            <label for="type">Recipe Type</label>
            <select name="type" id="type">
                <option value="">--- Choose ---</option>
                <option value="1">Free Recipe</option>
                <option value="2">Paid Recipe</option>
            </select>
        </div>

        <div class="form-group">
            <label for="category">Recipe Category</label>
            <select name="category" id="category">
                <option value="">--- Choose ---</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="step" value="0">

        <button type="submit" class="btn btn-primary">Next >></button>
    </form>
    @endif
    {{-- @else
        <div class="card-body">
            Name: {{ $recipe->name}}
        </div>
        <div class="card-body">
            Category" {{ $recipe->recipeCategory->name }}
        </div>
        <div class="card-body">
            Type: @if($recipe->recipe_type == 1) Free Recipe @else Paid Recipe @endif
        </div>
        <div class="card">
            <div class="card-header">
                Ingredients:
            </div>
            @forelse($recipe->recipeDetailIngredient as $ingredient)
            <div class="card-body">{{ $ingredient->amount }} {{ $ingredient->name }} @if(!empty($ingredient->notes)) ({{ $ingredient->notes }}) @endif</div>
            @empty
            @endforelse

            @if($step == 1)
            <form action="{{route('recipe.add')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="step" id="step" value="1">
                <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                <input type="text" name="name" id="name" placeholder="ingredient name">
                <input type="text" name="amount" id="amount" placeholder="e.g. 3 tbsp, 2 stalks">
                <input type="text" name="notes" id="notes" placeholder="e.g. minced, chopped, diced">
                <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
            <div class="card-footer">
                <form action="{{route('recipe.add')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                    <input type="hidden" name="step" value="1">
                    <input type="hidden" name="is_next" value="true">
                    <button class="btn btn-primary" type="submit">Next >></button>
                </form>
            </div>
            @endif
        </div>
        @if($step == 2)
        <div class="card">
            <div class="card-header">
                Steps:
            </div>
            @forelse($recipe->recipeDetailStep as $step)
                <img src="{{asset('storage/'.$step->image)}}"/>
                <div class="card-body">{{ $step->step_no }}. {{ $step->text }}</div>
            @empty
            @endforelse
            
            <form action="{{route('recipe.add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="step" id="step" value="2">
                <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                <br><img id="image_show" src="">
                <br><label for="upload-file" class="browse-label">Step Image</label>
                <input type="file" class="form-control-file" id="upload-file" name="image" onchange="readURL(this)">
                <label for="text">{{ count($recipe->recipeDetailStep)+1 }}. </label>
                <input type="text" name="text" id="text">
                
                <button type="submit">+ Add</button>
            </form>

            <form action="{{route('recipe.add')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="step" id="step" value="2">
                <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                <input type="hidden" name="is_next" value="true">
                <button class="btn btn-primary" type="submit">Finish >></button>
            </form>
        </div>
        @endif
    @endif --}}
</div>
</div>
@endsection
