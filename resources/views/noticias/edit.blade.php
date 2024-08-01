<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Criar noticia')}}
        </h2>
    </x-slot>
    
    <div class="container">
    <h1>Editar noticia</h1>

    <form action="{{route('noticias.update', ['noticia' => $noticia])}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo" value="{{ old('titulo') ?? $noticia->titulo}}">
            @error('titulo')
                {{$message}}
            @enderror
            <textarea class="form-control" name="descricao" placeholder="Descriçao">{{old('descricao') ?? $noticia->descricao}}</textarea>
            @error('descricao')
                {{$message}}
            @enderror
            <input type="file" class="form-control" name="file">
            @error('file')
                {{$message}}
            @enderror
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        
    </form>
    </div>
</x-app-layout>