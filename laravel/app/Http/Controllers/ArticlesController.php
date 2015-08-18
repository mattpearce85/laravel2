<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }
    
    public function index() {
        $articles = Article::latest('published_at')->published()->get();
        
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function show($id) {
        $article = Article::findOrFail($id);
        
        return view('articles.show', ['article' => $article]);
    }
    
    public function create() {
        return view('articles.create');
    }
    
    public function store(ArticleRequest $request) {
        $article = new Article($request->all());
        
        \Auth::user()->articles()->save($article);
        
        return redirect('articles');
    }
    
    public function edit($id) {
        $article = Article::findOrFail($id);
        
        return view('articles.edit', ['article' => $article]);
    }
    
    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
        
        $article->update($request->all());
        
        return redirect('articles');
    }
}
