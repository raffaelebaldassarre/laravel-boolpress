@extends('layouts.app')

@section('content')

<div class="wrap">
    <button type="button" class="btn btn-light btn-ms"> 
      <a href="{{ route('articles.index') }}">Ritorna all'elenco degli Articoli</a> 
    </button>
          <div class="blog-card">
            <div class="article-details">
              <h2 class="post-title"><?php echo "{$article->title}";?></h2>
              <p class="post-description"><?php echo " {$article->body}" ;?></p>
            </div>
          </div>
  </div>

@endsection