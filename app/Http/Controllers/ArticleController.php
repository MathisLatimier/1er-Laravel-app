<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::query()
        ->select(['id','title', 'content', 'published_at','user_id'])
        ->latest('published_at')
        ->with('user:id,name')
        ->paginate(10);

        return view('articles.index',["articles" => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->select('id','name')->get();
        return view('articles.create',["users" => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => ['required','string','max:255'],
            'content' => ['required','string'],
            'published_at' => ['required','date'],
            'user_id' => ['required','exists:users,id']
        ]);


        //$article = new Article($validateData);

        // ou
        $article = new Article();
        $article->title = $validateData['title'];
        $article->content = $validateData['content'];
        $article->published_at = $validateData['published_at'];

        $article->user()->associate($validateData['user_id']);
        $article->save();
 
        return redirect()->route('articles.index')->with('success','Article créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $user = $article->user()->select('id','name')->first();
        return view('articles.show',["article" => $article,"user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit',["article" => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
