<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        Article::create($validateData);
        $new_article = Article::orderBy('id', 'desc')->first();

        return redirect()->route('articles.show', $new_article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        //
        $article = Article::find($article);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        //
        $article = Article::find($article);
        return view('articles.edit', compact('article')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article)
    {
        //
        $validateData= $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $article = Article::find($article);
        $article->update($validateData);
        return redirect('/articles')->with('success', 'Articolo salvato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        //
        $article = Article::find($article);
        $article->delete();

        return redirect('/articles')->with('success', 'Articolo Cancellato!');
    }
}