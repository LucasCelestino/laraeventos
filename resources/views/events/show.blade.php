@extends('layout.main')

@section('title', 'LaraEventos - Inicio')

@section('content')
    <div class="container pb-4 d-flex pt-4">
        <div class="event-presentation pr-4">
            <img src="/img/events/{{$event->img_path}}" width="600" class="mb-3">
            <h2>Sobre o evento:</h2>
            <p>{{$event->description}}</p>
        </div>
        <div class="event-infos">
            <h1>{{$event->title}}</h1>
            <p>Localização: {{$event->city}}</p>
            <p>Participantes: </p>
            <p>Dono do evento: </p>
            <p>Data do evento: {{date('d/m/Y', strtotime($event->event_date))}}</p>
            <button class="btn btn-warning text-white mb-4">Confirmar presença</button>
            <h3>O evento conta com:</h3>
            <ul>
                @foreach ($event->items as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
