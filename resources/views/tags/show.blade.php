@extends('layouts.app')

@section('content')

<div class="wrap">
    <button type="button" class="btn btn-light btn-ms"> 
      <a href="{{ route('tags.index') }}">Ritorna all'elenco dei Tag</a> 
    </button>
          <div class="blog-card">
            <div class="article-details">
              <h2 class="post-title"><?php echo "{$tag->title}";?></h2>
            </div>
          </div>
  </div>

@endsection