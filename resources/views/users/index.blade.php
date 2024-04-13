@extends('layouts.app')

@section('content')
<main>
    <h1>Users</h1>
    <a href="{{route('users.create')}}">Créer un nouvel utilisateur</a>
    @session('success')
    <p style="color: green">
        {{ session('success') }}
    </p>
    @endsession
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{route('users.destroy', ['user' => $user->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">X</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    


</main>
@endsection

