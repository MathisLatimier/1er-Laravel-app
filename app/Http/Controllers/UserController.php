<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()
            ->select('id','name', 'email')
            ->latest() // = orderBy('created_at', 'desc')
            //->ddrawsql() // Affiche la requête SQL
            ->paginate(10);
        
        //dd($users);
        return view('users.index', [
            'users' => $users
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
        ]);

        $validatedData['password'] = Str::random();

        
        $user = User::create($validatedData);

        // reviens a faire ca :
        // $user = new User();
        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];
        // $user->save();
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
        // return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Utilisateur créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        dd($user->name,$user->email);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //User::destroy($user->id);
        $user->delete();
        return redirect()->route('users.index')->with('success', "L'utilisateur {$user->name} a été supprimé avec succès");
    }
}
