@extends('layout.main')

@section('title', 'LaraEventos - Inicio')

@section('content')
    <div class="container pb-4">
        <h1 class="py-2">Crie o seu evento</h1>
        <form action="{{route('eventos.post-criar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Nome do evento:</label>
              <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="nome do evento...">
              @if ($errors->has('nome')) {{$errors->first('nome')}} @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Data do evento:</label>
                <input type="date" name="event_date" class="form-control" id="exampleFormControlInput1">
              </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Localização do evento:</label>
                <input type="text" name="localizacao" class="form-control" id="exampleFormControlInput1" placeholder="São Paulo, Rio de Janeiro, etc...">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Evento Privado:</label>
              <select class="form-control" id="exampleFormControlSelect1" name="privado">
                <option value="1">Sim</option>
                <option value="0">Não</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descrição do evento:</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao">Descrição...</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Imagem do evento:</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="nome do evento...">
                @if ($errors->has('nome')) {{$errors->first('image')}} @endif
              </div>
              <div class="form-group d-flex flex-column">
                <label for="exampleFormControlInput1">Adicione itens de infraestrutura:</label>
                <div><input type="checkbox" name="items[]" value="Cadeiras" id="defaultCheck1"> Cadeiras</div>
                <div><input type="checkbox" name="items[]" value="Atividades" id="defaultCheck1"> Atividades</div>
                <div><input type="checkbox" name="items[]" value="Brindes" id="defaultCheck1"> Brindes</div>
                <div><input type="checkbox" name="items[]" value="Open Food" id="defaultCheck1"> Open Food</div>
            </div>
            <input type="submit" value="Criar Evento" class="btn btn-warning text-white">
          </form>
    </div>
@endsection
