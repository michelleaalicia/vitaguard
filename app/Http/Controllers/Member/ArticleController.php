<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(9);

        return view('member.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('member.articles.show', compact('article'));
    }
}