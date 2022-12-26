<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!---- Fonte do Google ---->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!---- Bootstrap CSS ---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!---- CSS do projeto ---->
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <header class="border-bottom py-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{route('eventos.home')}}">LaraEventos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Eventos</a>
                  </li>
                @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('eventos.form-criar')}}">Criar Eventos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('eventos.form-criar')}}">Meus Eventos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('eventos.form-criar')}}">Sair</a>
                  </li>
                @endauth
                @guest
                  <li class="nav-item">
                      <a class="nav-link" href="/login">Entrar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/register">Cadastrar</a>
                    </li>
                @endguest
              </ul>
              <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('eventos.home')}}">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Procurar..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
              </form>
            </div>
            </div>
          </nav>
    </header>
    @if (session('msg'))
        <p class="py-4 m-0 bg-success text-white text-center">{{session('msg')}}</p>
    @endif
    @yield('content')
    <footer class="bg-dark h-100 text-center py-4 text-white">
        LaraEventos © 2022
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
