@extends('layouts.app')

@section('content')

<h1>Aggiungi un nuovo Tag</h1>

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
  <form action="{{ route('tags.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="title">Nome Tag</label>
        <input type="text"
          class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="Inserisci il nome del Tag" value="{{ old('title') }}">
        <small id="titleHelper" class="form-text text-muted">Nome Tag</small>
      </div>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>    
      @enderror

      <button type="submit" class="btn btn-success">Aggiungi il Tag</button>

  </form>

@endsection