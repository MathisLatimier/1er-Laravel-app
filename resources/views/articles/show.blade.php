@extends('layouts.app')

@section('content')

<section>
    <h1>{{$article->title}}</h1>
    <p>{{$article->content}}</p>
    <time datetime="{{$article->published_at}}">{{$article->published_at}}</time>
    <h2>Auteur : {{$user->name}}</h2>
</section>

@endsection