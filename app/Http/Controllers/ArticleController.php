<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag; 
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
        $articles = Article::orderBy('id', 'desc')->get();
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        // dd($request->tags);
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'tags' => 'exists:tags,id',
            'cateogories' => 'exists:categories,id'
        ]);
        Article::create($validateData);
        $new_article = Article::orderBy('id', 'desc')->first();
        $new_article->tags()->attach($request->tags);

        return redirect()->route('articles.index', $new_article);
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article','categories','tags')); 
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
        // dd($request->all());
        $validateData= $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'tags' => 'exists:tags,id',
            'cateogories' => 'exists:categories,id'

        ]);

        $article = Article::find($article);
        $article->update($validateData);
        $article->tags()->sync($request->tags);
        $article->category()->sync($request->category);
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