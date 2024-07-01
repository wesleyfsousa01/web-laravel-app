<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();

        return view('dashboard', ['noticias' => $noticias]);
    }

    public function home()
    {
        $noticias = Noticia::all();

        return view('home', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => 'required|string|min:3|max:255',
            'descricao' => 'required|string|min:10',
            'arquivo' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
        ];


        $request->validate($regras);
        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        if($request->hasFile('arquivo')){
            $noticia->storeArquivo($request->file('arquivo'));
        }


        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return route('noticias.show', ['noticia' => $noticia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $regras = [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'arquivo' => 'required|file|image|mimes:jpeg,png,gif,|max:2048'
        ];

        $request->validate($regras);

        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;

        if($request->hasFile('arquivo')){
            $noticia->storeArquivo($request->file('arquivo'));
        }

        $noticia->save();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->route('dashboard');
    }
}
