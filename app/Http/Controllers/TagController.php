<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');
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
        Tag::create($validateData);
        $new_tag = Tag::orderBy('id', 'desc')->first();

        return redirect()->route('tags.show', $new_tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        //
        $tag = Tag::find($tag);

        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {
        //
        $tag = Tag::find($tag);
        return view('tags.edit', compact('tag')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        //
        $validateData= $request->validate([
            'title' => 'required',
        ]);

        $tag = Tag::find($tag);
        $tag->update($validateData);
        return redirect('/tags')->with('success', 'Tag salvato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        //
        $tag = Tag::find($tag);
        $tag->delete();

        return redirect('/tags')->with('success', 'Tag Cancellato!');
    }
}