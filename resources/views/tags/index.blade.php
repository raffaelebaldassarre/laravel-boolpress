@extends('layouts.app')

@section('content')

<h1>Tutti i tag</h1>

<a href="{{ route('tags.create') }}" class="btn btn-warning"> Crea un nuovo Tag</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->title}}</td>
            <td>{{$tag->created_at}}</td>
            <td>{{$tag->updated_at}}</td>
            <td>
                <a href="{{ route('tags.show',$tag->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye fa-lg fa-fw"></i>
                    View
                </a>
                <a href="{{ route('tags.edit',$tag->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye fa-lg fa-fw"></i>
                    Edit
                </a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash fa-lg fa-fw"></i>
                    Delete</button>
                </form>

            </td>
        </tr>
        @empty
        <div>Nessun Tag al momento</div>
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