@extends('layouts.app')

@section('content')

<div class="wrap">
    <button type="button" class="btn btn-light btn-ms"> 
      <a href="{{ route('articles.index') }}">Ritorna all'elenco degli Articoli</a> 
    </button>
          <div class="blog-card">
            <div class="article-details">
              <h2 class="post-title">{{$article->title}}</h2>
              <p class="post-description">{{$article->body}}</p>
              <p class="post-category">Categoria: {{$article->category ? $article->category->title : "N/A" }}</p>
              <div class="tag">
                Tag:
                @if(count($article->tags) > 0)
                    @foreach ($article->tags as $tag)
                        <span>{{$tag->title}}</span>
                    @endforeach
                @else
                <span>N/A</span>    
                @endif
              </div>
            </div>
          </div>
  </div>

@endsection