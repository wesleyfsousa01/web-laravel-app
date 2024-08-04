<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ $noticia->titulo }}
        </h2>
    </x-slot>

    <div class="my-5">
        <div class="text-center">
            <h1>Notica: Detalhes</h1>
        </div>

        <div class="card mt-5 text-center m-auto" style="width: 18rem;">
            <div class="d-flex justify-content-center">
                @if ($noticia->url)
                    <img src="{{ asset($noticia->url) }}" class="img-fluid" alt=" não foi possível exibir a imagem: {{ $noticia->titulo }}" />
                @endif
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $noticia->titulo }}</h5>

                <p class="card-text">{{ $noticia->descricao }}</p>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar</a>
    </div>

</x-app-layout>
