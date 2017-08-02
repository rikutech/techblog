<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\User;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('index',compact('articles'));
    }
    
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $articles = $article->user->articles()->orderBy('created_at', 'desc')->take(5)->get();
        return view('show', compact('article', 'articles'));
    }
    
    public function create()
    {
        $users = User::all();
        return view('create', compact('users'));
    }
    
    public function store(ArticleRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $article = $user->articles()->create($request->all());
        return redirect()->route('show', $article->id);
    }
    
    public function showUsersArticle($id)
    {
        $user = User::findOrFail($id);
        $articles = $user->articles()->orderBy('created_at', 'desc')->paginate(10);
        return view('users.articles', compact('user', 'articles'));
    }
}
