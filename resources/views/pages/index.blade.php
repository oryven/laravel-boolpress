@extends('layouts.main-layout')
@section('content')
<h2><a href="{{route('create')}}">CREATE</a></h2>
<ul>
    
    @foreach ($posts as $post)
    <li>
        {{$post -> title }}, {{$post -> author }}, {{$post -> description}} {{$post -> release_date}} <br><hr>

    </li>      
    @endforeach
</ul>
@endsection