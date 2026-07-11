<?php

namespace App\Http\Controllers\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $articles = Article::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('member.articles.index', compact(
            'articles',
            'search'
        ));
    }

    public function show(Article $article)
    {
        return view('member.articles.show', compact('article'));
    }
}
