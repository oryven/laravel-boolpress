@extends('layouts.main-layout')

@section('content')

<h1>Scrivi un post</h1>

<form action="{{ route('post.store') }}" method="post">

    @method("post")
    @csrf

    <label for="title">Titolo:</label>
    <input type="text" name="title" placeholder="Titolo"><br>

    <label for="description">Descrizione:</label>
    <textarea name="name"></textarea>
    <br>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{$category -> id}}">{{$category -> name}}</option>
        @endforeach
    </select>
    <br>

    @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}">{{$tag -> name}} <br>
    @endforeach
    <br>

    <input type="submit" value="CREATE">
</form>

@endsection