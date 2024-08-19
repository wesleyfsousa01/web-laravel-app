<x-app-layout>
    <x-slot name="header">
        <h2>{{__('Página de Notícias')}}</h2>
    </x-slot>

    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
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
        <hr class="mb-5">
            <div id="carouselExampleCaptions" class="carousel slide mb-5">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($ultimasNoticias as $key => $noticia)

                        <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
                            <img src="{{$noticia->url}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>{{$noticia->titulo}}</h5>
                            <a href="{{ route('noticias.show', ['noticia' => $noticia]) }}" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>


        @if($noticias->count())
            <div class="container">

                <div class="row">
                    @foreach ( $noticias as $noticia )
                        <div class="col-12 mb-4">
                            <div class="card text-center" style="width:;">
                                <img src="{{$noticia->url}}" alt="" alt="Não foi possível carregar a imagem">
                                <div class="card-body">
                                    <h5 class="card-title">{{$noticia->titulo}}</h5>
                                    <p class="card-text">{{$noticia->descricao}}</p>
                                    <a href="{{ route('noticias.show', ['noticia' => $noticia]) }}" class="btn btn-primary">Detalhes</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $noticias->links() }}
            </div>

            @else
                <p>Nenhum registro foi encontrado</p>
            @endif
    </div>
</x-app-layout>
