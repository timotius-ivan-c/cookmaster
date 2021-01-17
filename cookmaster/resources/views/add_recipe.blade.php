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
        @csrf
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
        <button type="reset" class="btn btn-danger" onclick="history.back()">Cancel</button>
    </form>
    @endif
</div>
</div>
@endsection
