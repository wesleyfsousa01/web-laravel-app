<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Criar noticia')}}
        </h2>
    </x-slot>
    
    <div class="container">
    <h1>Criar noticia</h1>

    <form action="{{route('noticias.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo">
            @error('titulo')
                {{$message}}
            @enderror
            <textarea class="form-control" name="descricao" placeholder="Descriçao"> </textarea>
            @error('descricao')
                {{$message}}
            @enderror
            <input type="file" class="form-control" name="file">
            @error('file')
                {{$message}}
            @enderror
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        
    </form>
    </div>
</x-app-layout>