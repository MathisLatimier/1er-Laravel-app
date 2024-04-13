@extends('layouts.app')

@section('content')
<main>
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name">
            @error('name')
            <ul>
                @foreach ($errors->get('name') as $error)
                <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            @error('email')
            <ul>
                @foreach ($errors->get('email') as $error)
                <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
            @enderror
        </div>
        
        <div>
            <button type="submit">Create</button>
        </div>
        
    </form>
</main>
@endsection