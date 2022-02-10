@extends('layouts.main-layout')

@section('content')

@auth
<h1>Posts</h1>
    <h3><a href="{{ route ('post.create') }} ">Create Post</a></h3>
    @foreach ($posts as $post)
    <li>
        {{$post -> title }} - 
        {{$post -> author }} - 
        {{$post -> description}} -
        {{$post -> created_at}} - 
        {{$post -> category -> name}} -  
        @foreach ($post -> tags as $tag)
            {{$tag -> name}}
        @endforeach

        <a href="{{ route ('post.edit', $post -> id) }}">edit</a>
        <br>
        <hr>
    </li>      
    @endforeach
@endauth

@endsection