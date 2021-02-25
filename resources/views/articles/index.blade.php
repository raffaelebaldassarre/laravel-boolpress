@extends('layouts.app')

@section('content')

<h1>Tutti gli Articoli</h1>

<a href="{{ route('articles.create') }}" class="btn btn-warning"> Crea un nuovo Articolo</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Category</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->body}}</td>
            <td>{{$article->category ? $article->category->title : " "}}</td>
            <td>{{$article->created_at}}</td>
            <td>{{$article->updated_at}}</td>
            <td>
                <a href="{{ route('articles.show',$article->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye fa-lg fa-fw"></i>
                    View
                </a>
                <a href="{{ route('articles.edit',$article->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye fa-lg fa-fw"></i>
                    Edit
                </a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash fa-lg fa-fw"></i>
                    Delete</button>
                </form>

            </td>
        </tr>
        @empty
        <div>Nessun Articolo al momento</div>
        @endforelse
        <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}  
              </div>
            @endif
          </div>
    </tbody>
</table>
@endsection