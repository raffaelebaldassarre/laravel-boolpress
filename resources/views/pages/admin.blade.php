@extends('layouts.app')

@section('content')

<h1>Admin</h1>    

<nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="nav navbar-nav"> 
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">Lista Articoli</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">Lista Categorie</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('tags.index') }}">Lista Tag</a>
        </li>
    </ul>
</nav>

@endsection

