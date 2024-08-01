<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $noticias = Noticia::all();
        $filters = $request->only(['title', 'description']);
        $noticias = Noticia::filter($filters)->paginate(5)->withQueryString();

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'file' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $request->validate($regras);
        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        $noticia->storeArquivo($request->file('file'));
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $regras = [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'file' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();

        return redirect()->route('dashboard');
    }
}
