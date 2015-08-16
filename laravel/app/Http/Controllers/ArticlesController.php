<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{
    public function index() {
        $articles = Article::all();
        
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function show($id) {
        $article = Article::findOrFail($id);
        
        return view('articles.show', ['article' => $article]);
    }
    
    public function create() {
        return view('articles.create');
    }
    
    public function store() {
        $input = Request::all();
        
        return $input;
    }
}
