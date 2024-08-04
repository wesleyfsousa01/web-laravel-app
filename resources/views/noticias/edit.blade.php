<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Criar noticia')}}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>Editar noticia</h1>

        <form action="{{route('noticias.update', ['noticia' => $noticia])}}" method="post"  enctype="multipart/form-data" class="mb-5">
            @csrf
            @method('put')
            <div>
                <input type="text" class="form-control mt-5 mb-2" name="titulo" placeholder="Titulo" value="{{ old('titulo') ?? $noticia->titulo}}">
                @error('titulo')
                    {{$message}}
                @enderror
                <textarea class="form-control mb-2" name="descricao" placeholder="Descriçao">{{old('descricao') ?? $noticia->descricao}}</textarea>
                @error('descricao')
                    {{$message}}
                @enderror
                <input type="file" class="form-control mb-2" name="arquivo">
                @error('arquivo')
                    {{$message}}
                @enderror
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
        <hr>
    </div>
</x-app-layout>
