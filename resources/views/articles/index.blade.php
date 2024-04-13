@extends('layouts.app')

@section('content')
<main>
    <section>
        <a href="{{route('articles.create')}}">Créer un nouvel article</a>
        @session('success')
        <p style="color: green">
            {{ session('success') }}
        </p>
        @endsession
        <h1>Les articles</h1>
        @forelse ($articles as $article)
    
            <article>
                <h1>{{$article->title}} - {{$article->user->name}}</h1>
                <time time="{{$article->published_at}}">{{$article->published_at->diffForHumans()}}</time>
                <a href="{{route('articles.show', ['article' => $article->id])}}">Lire l'article</a>
                <a href="{{route('articles.edit', ['article' => $article->id])}}">Modifier l'article</a>
            </article>
        @empty
            <p>Vous n'avez pas encore d'article</p>
        @endforelse
    </section>
</main>

@endsection
