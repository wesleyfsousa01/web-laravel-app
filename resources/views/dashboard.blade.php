@include('layouts.navigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

        <div class="container">

        <div class="mb-5 text-center">
            <h1>Notícias</h1>
            <a href="{{route('noticias.create')}}" class="btn btn-primary">Criar</a>
        </div>
        
        <form method="GET" action="{{ route('dashboard') }}">
            <div>
                <label>Titulo</label>
                <input type="text" name="title" class="form-control" value="{{ request('title') }}">
            </div>

            <div>
                <label>Descrição</label>
                <input type="text" name="description" class="form-control" value="{{ request('description') }}">
            </div>

            <div>
                <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
            </div>
        </form>

        @if($noticias->count())

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>URL</th>
                    <th colspan="3">Ações</th>
                </tr>
                @foreach ( $noticias as $noticia )
                    <tr>
                        <td>{{ $noticia->id }}</td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ $noticia->descricao }}</td>
                        <td>
                            <a href="{{$noticia->url}}" target="_blank">{{$noticia->url}}</a>
                        </td>
                        <td>
                            <a class="btn btn-info">Detalhes</a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('noticias.edit', ['noticia' => $noticia]) }}">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('noticias.destroy', ['id'=> $noticia->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $noticias->links() }}
            </div>

            @else
                <p>Não existem noticias cadastradas</p>
            @endif
        </div>

</x-app-layout>
