<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Auth;

class ArticleController extends Controller
{

    public function show(Article $article){
        return inertia('Article/Show', [
            'article' => $article
        ]);
    }


    public function create(){
        return inertia('Article/Create', [
            'article' => new Article
        ]);
    }

    public function store(ArticleRequest $request){
        $article = $request->all();
        Auth::user()->articles()->create($article);
        return inertia('Article/Show', [
            'article' => $article
        ]);
    }
}
