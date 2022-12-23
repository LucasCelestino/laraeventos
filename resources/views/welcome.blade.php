@extends('layout.main')

@section('title', 'LaraEventos - Inicio')

@section('content')
    <div class=" banner"></div>
    <div class="container pb-5">
    <h1 class="pt-3">Próximos Eventos</h1>
    <h2 class="h6 text-secondary pb-5">Veja os eventos dos próximos dias</h2>
    <div class="card-event-container d-flex flex-wrap justify-content-between">
    @foreach ($events as $event)
    <div class="card mr-3 mb-4" style="width: 18rem;">
        <img class="card-img-top" src="/img/events/{{$event->img_path}}" alt="Card image cap">
        <div class="card-body">
          <p class="card-date text-secondary">{{date('d/m/Y', strtotime($event->event_date))}}</p>
          <h5 class="card-title">{{$event->title}}</h5>
          <p class="card-text text-secondary">{{$event->description}}</p>
          <a href="{{route('eventos.show', [$event->id])}}" class="btn btn-warning text-white">Saber Mais</a>
        </div>
      </div>
    @endforeach
    </div>
    </div>
@endsection
