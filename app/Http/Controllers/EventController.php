<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $event = new Event();

        $search = request('search');

        if($search != null)
        {
            $eventSearch = $event->where('title', 'like', "%" . $search . "%")->get();

            return view('events.search', ['events' => $eventSearch]);
        }

        $events = $event->all();

        return view('welcome', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nome'=>'required',
                'localizacao'=>'required',
                'descricao'=>'required',
                'image'=>'required'
            ],
            [
                'nome.required' => 'O nome do evento não pode estar vazio.',
                'localizacao.required' => 'A localização não pode estar vazia.',
                'descricao.required' => 'A descrição não pode estar vazia.',
                'image.required' => 'A imagem do evento não pode estar vazia.'
            ]
        );

        $event = new Event();

        $event->title = $request->nome;
        $event->event_date = $request->event_date;
        $event->city = $request->localizacao;
        $event->private = $request->privado;
        $event->description = $request->descricao;
        $event->items = $request->items;

        if($request->hasFile('image'))
        {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path("img/events"), $imageName);

            $event->img_path = $imageName;
        }

        $user = auth()->user();

        $event->user_id = $user->id;

        $event->save();

        return redirect()->route('eventos.home')->with('msg', 'Evento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event'=>$event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestAll = $request->all();

        $event = Event::findOrFail($id);

        if($request->hasFile('img_path'))
        {
            unlink(public_path('img/events/' . $event->img_path));

            $requestImage = $request->img_path;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path("img/events"), $imageName);

            $requestAll['img_path'] = $imageName;
        }

        $event->update($requestAll);

        return redirect()->route('eventos.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $user = auth()->user();

        if($event->user_id != $user->id)
        {
            return view('events.dashboard');
        }

        $event->delete();

        return redirect()->route('eventos.dashboard');
    }
}
