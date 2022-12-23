@extends('layout.main')

@section('title', 'LaraEventos - Pesquisar')

@section('content')
    <div class="container pb-5 py-5">
        @if ($events->count() > 0)
        <p>Buscando por: {{$_GET['search']}} </p>
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
        @else
        <p>Não foi possível encontrar o evento pesquisado.</p>
        @endif
    </div>
@endsection
