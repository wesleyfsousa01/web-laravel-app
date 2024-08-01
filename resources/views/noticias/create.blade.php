<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Criar noticia')}}
        </h2>
    </x-slot>

    <div class="container mt-5 mb-5">
    <h1 class="text-center">Criar noticia</h1>
    <hr>

    <form action="{{route('noticias.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div>
            <div class="mb-3">
                <label for="titulo" class="form-label fw-semibold">Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="Titulo da notícia">
                @error('titulo')
                    {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label fw-semibold">Descrição</label>
                <textarea class="form-control" name="descricao" placeholder="Descriçao"> </textarea>
                @error('descricao')
                    {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" name="arquivo">
                @error('arquivo')
                    {{$message}}
                @enderror
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
    <hr>
    </div>
</x-app-layout>
