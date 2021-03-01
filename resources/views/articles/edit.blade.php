@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <button type="button" class="btn btn-light btn-ms"> 
            <a href="{{ route('articles.index') }}">Ritorna all'elenco degli Articoli</a> 
        </button>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{route('articles.update', ['article' => $article->id])}}">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="title">Titolo :</label>
                <input type="text" class="form-control" name="title" value="{{$article->title}}" />
            </div>
            <div class="form-group">
                <label for="body">Testo :</label>
                <textarea id="validationTextarea" class="form-control " name="body" cols="50" rows="10">{{$article->body}}</textarea>
            </div>

            <div class="form-group">
                <label for="author">Autore :</label>
                <input type="text" class="form-control" name="author" id="author" value="{{$article->author}}" />
            </div>

            <div class="form-group">
                <label for="categories">Category</label>
                <select class="form-control" name="categories[]" id="categories" multiple>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
              
            <div class="form-group">
                <label for="tags">Tag</label>
                <select class="form-control" name="tags[]" id="tags" multiple>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}" {{$article->tags->contains($tag) ? 'selected' : ''}} >{{$tag->title}}</option>
                @endforeach
                </select>
            </div>

          <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
</div>

@endsection