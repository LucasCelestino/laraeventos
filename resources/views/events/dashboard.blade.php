@extends('layout.main')

@section('title', 'LaraEventos - Inicio')

@section('content')
    <div class="container pt-3">
        <h1 class="pb-3">Meus Eventos</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{$event->title}}</td>
                    <td>{{$event->description}}</td>
                    <td>0</td>
                    <td>
                        <a href="{{route('eventos.dashboard.edit', [$event->id])}}"><button class="btn btn-warning text-white">Editar</button></a>
                        <form action="{{route('eventos.dashboard.destroy', [$event->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger text-white" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
