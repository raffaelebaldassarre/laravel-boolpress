@extends('layouts.app')

@section('content')

<h1>Aggiungi un nuovo Articolo</h1>

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
  <form action="{{ route('articles.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="title">Titolo Articolo</label>
        <input type="text"
          class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="Inserisci il nome dell' articolo" value="{{ old('title') }}">
        <small id="titleHelper" class="form-text text-muted">Titolo Articolo</small>
      </div>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>    
      @enderror

      <div class="form-group">
        <label for="body">Testo</label>
        <textarea class="form-control" name="body" id="body" rows="20" value="{{ old('body') }}"></textarea>
      </div>
      @error('body')
      <div class="alert alert-danger">{{ $message }}</div>    
    @enderror

      <button type="submit" class="btn btn-success">Aggiungi l' articolo</button>

  </form>

@endsection