<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')
            ->latest()
            ->take(4)
            ->get();

        $articles = Article::latest()
            ->take(3)
            ->get();

        return view('member.dashboard', compact(
            'doctors',
            'articles'
        ));
    }
}