<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;

class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }
    
    public function index() {
        $articles = Article::latest('published_at')->published()->get();
        
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function show(Article $article) {
        return view('articles.show', ['article' => $article]);
    }
    
    public function create() {
        $tags = Tag::lists('name', 'id');
        
        return view('articles.create', ['tags' => $tags]);
    }
    
    public function store(ArticleRequest $request) {
        $this->createArticle($request);
        
        flash()->overlay('Your article has been successfully created!', 'Good Job');
        
        return redirect('articles');
    }
    
    public function edit(Article $article) {
        $tags = Tag::lists('name', 'id');
        
        return view('articles.edit', ['article' => $article, 'tags' => $tags]);
    }
    
    public function update(Article $article, ArticleRequest $request) {
        $article->update($request->all());
        
        $this->syncTags($article, $request->input('tag_list'));
        
        return redirect('articles');
    }
    
    private function syncTags(Article $article, $tags) {
        if (!is_array($tags)) {
            $tags = [];
        }
        $article->tags()->sync($tags);
    }
    
    private function createArticle(ArticleRequest $request) {
        $article = \Auth::user()->articles()->create($request->all());
        
        $this->syncTags($article, $request->input('tag_list'));
        
        return $article;
    }
}
