@extends('layouts.app')
@section('content')
<div class="container">
    @if($step == 0)
    <!-- baru mau masukin judul, foto, tipe, dan kategori resep -->
    <form method="post" action="/new-recipe" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Recipe Name</label>
            <input type="text" class="form-control" id="pw" placeholder="Input recipe title . . ." name="name">
          </div>
        
        <!-- ############################# -->
        <!-- inputan image nya blm gw buat -->
        <!-- ############################# -->

        <div class="form-group">
            <label for="type">Recipe Type</label>
            <select name="type" id="type">
                <option value="1">Free Recipe</option>
                <option value="2">Paid Recipe</option>
            </select>
        </div>

        <div class="form-group">
            <label for="category">Recipe Category</label>
            <select name="category" id="category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="step" value="0">

        <button type="submit" class="btn btn-primary">Next >></button>
    </form>
    @elseif($step == 1)
    <div class="card-body">
        Name: {{ $recipe->name}}
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
        <form action="{{route('recipe.add')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="step" id="step" value="1">
            <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
            <input type="text" name="name" id="name" placeholder="ingredient name">
            <input type="text" name="amount" id="amount" placeholder="e.g. 3 tbsp, 2 stalks">
            <input type="text" name="notes" id="notes" placeholder="e.g. minced, chopped, diced">
            <button type="submit" class="btn btn-primary">+ Add</button>
        </form>
    </div>
    @elseif($step == 2)

    @endif
</div>
@endsection