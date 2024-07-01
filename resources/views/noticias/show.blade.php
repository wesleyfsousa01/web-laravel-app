<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ $noticia->titulo}}
        </h2>
    </x-slot>
    
    <div>
        <div>
            {{$noticia->titulo}}
        </div>

        <div>
            {{$noticia->descricao}}
        </div>

        <div>
            @if($noticia->url)
                <img
                    src="{{asset($noticia->url)}}"
                    class="img-fluid rounded-top"
                    alt="{{$noticia->titulo}}"
                />
                
            @endif
        </div>
    </div>

    <div class="container">
        <h1>Notícias</h1>
        <a href="{{route('noticias.create')}}" class="btn btn-primary"></a>
    </div>
    

</x-app-layout>