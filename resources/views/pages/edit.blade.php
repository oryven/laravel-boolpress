@extends('layouts.main-layout')

@section('content')

@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<h1>Modifica un post</h1>

<form action="{{ route('post.update', $post -> id) }}" method="post">

    @method("post")
    @csrf

    <label for="title">Titolo:</label>
    <input type="text" name="title" placeholder="Titolo" value="{{$post -> title}}" placeholder="Titolo"><br>

    <label for="description">Descrizione:</label>
    <textarea name="description">{{ $post -> description}}</textarea>
    <br>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{$category -> id}}"
                @if (($category -> id == $post -> category -> id))
                        selected
                    @endif
            >{{$category -> name}}</option>
        @endforeach
    </select>
    <br>

    @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}">{{$tag -> name}} <br>
    @endforeach
    <br>

    <input type="submit" value="UPDATE">
</form>

@endsection