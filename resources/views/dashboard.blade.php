<<<<<<< HEAD
@include('layouts.navigation')
=======
>>>>>>> c81212fc53098976254ecd2c8fa6859198e30ba1
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
<<<<<<< HEAD
        <h1>Notícias</h1>
        <a href="{{route('noticias.create')}}" class="btn btn-primary"></a>
        
        <div class="container">
            <h1>Notícias</h1>
            <a href="{{route('noticias.create')}}" class="btn btn-primary"></a>
            @if(){

            }

            <table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>URL</th>
                </tr>
                @foreach ( $noticias as $noticia )
                    <tr>
                        <td>{{ $notiica->id }}</td>
                        <td>{{ $notiica->titulo }}</td>
                        <td>{{ $notiica->descricao }}</td>
                        <td>
                            <a href="{{$noticia->url}}" target="_blank">{{$noticia->url}}</a>
                        </td>
                        <td>
                            <a class="btn btn-info">{{route('noticias.show', $noticia->id)}}</a>
                            <a class="btn btn-info">{{route('noticias.edit', $noticia->id)}}</a>
                            <form action="{{ rote('noticias.destroy', $noticia->id) }}">
                                @csrf
                                @method('delete')
                                
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

=======
>>>>>>> c81212fc53098976254ecd2c8fa6859198e30ba1
</x-app-layout>
