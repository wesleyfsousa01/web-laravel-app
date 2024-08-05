<x-app-layout title="Resultados da busca">
    @if($noticias->isNotEmpty())
        <h2>Resultados da busca para "{{request('query')}}"</h2>
            <div class="row">
                @foreach ($noticias as $noticia )
                        <div class="col-sm-12 col-lg-4 col-md">
                            <div class="card mt-5 text-center m-auto" style="width: 18rem;">
                                <div class="d-flex justify-content-center">
                                        <img src="{{ asset($noticia->url) }}" class="img-fluid" alt=" não foi possível exibir a imagem: {{ $noticia->titulo }}" />
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $noticia->titulo }}</h5>

                                    <p class="card-text">{{ $noticia->descricao }}</p>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
    @else
        <h2>Nenhum registro encontrado</h2>
    @endif
</x-app-layout>