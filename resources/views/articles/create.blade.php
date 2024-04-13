@extends('layouts.app')

@section('content')
<main>
    <h1>Create Article</h1>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
            @error('title')
            <ul>
                @foreach ($errors->get('title') as $error)
                <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
            @enderror
        </div>
        <div>
            <label for="content">Contenue</label>
            <textarea name="content" id="content"></textarea>
            @error('content')
            <ul>
                @foreach ($errors->get('content') as $error)
                <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
            @enderror
        </div>
        <div>
            <label for="published_at">Date de publication</label>
            <input type="datetime-local" name="published_at" id="published_at">
        </div>

        <div>
            <label for="user_id">Auteur</label>
            <select name="user_id" id="user_id">
                <option selected disabled>Sélectionner un auteur</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <ul>
                @foreach ($errors->get('user_id') as $error)
                <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
            @enderror
        </div>
        
        <div>
            <button type="submit">Créer l'article</button>
        </div>
        
    </form>
</main>
@endsection