<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand navbar-light bg-light">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route ('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('contacts')}}">Contacts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route ('articles_api')}}">Articoli API</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('categories_api')}}">Categorie API</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('tags_api')}}">Tag API</a>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}">Lista Articoli</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Lista Categorie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tags.index') }}">Lista Tag</a>
                    </li> --}}
                </ul>
            </nav>
        </header>
        <main class="container">
            @yield('content')
        </main>



        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>