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
        <form method="post" action="{{route('articles.update', $article->id)}}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="title">Titolo :</label>
                <input type="text" class="form-control" name="title" value="{{$article->title}}" />
            </div>
            <div class="form-group">
                <label for="body">Testo :</label>
                <textarea id="validationTextarea" class="form-control " name="body" cols="50" rows="10">{{$article->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
</div>

@endsection