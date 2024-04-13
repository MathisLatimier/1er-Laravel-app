@extends('layouts.app')

@section('content')

<section>
    <form action="{{route('articles.update')}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="{{$article->title}}">
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10">{{$article->content}}</textarea>
        <button type="submit">Modifier l'article</button>
    </form>
</section>

@endsection
