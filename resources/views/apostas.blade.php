<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('assets/css/welcome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/apostas.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bolão do IF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('apostas.index') }}">Minhas Apostas</a>
                    </li>
                    @endauth

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                @auth
                <form class="d-flex ms-3" action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-success" type="submit">Sair</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>
    <section id="jogos">
        <div class="container p-2">
            <div class="col-12 d-flex flex- justify-content-center ">
                <div class="card-body">
                    <div class="time d-flex flex-row">
                        <div class="d-flex justify-content-around  h-100">
                            <p class="text fs-1">Faça suas apostas, {{ Auth::user()->nome }}!</p>
                        </div>
                    </div>
                    <div class="container p-5">
                        <div class="">
                            @foreach ($jogos as $jogo)
                            <div class="col-12 d-flex flex- justify-content-center ">
                                <div class="card p-6 m-3 w-75 p-3">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-around align-items-center h-100">
                                            <div class="time d-flex flex-column align-items-center">
                                                <img src='{{ url("assets/img/bandeiras/$jogo->bandeira_1") }}' alt="{{ $jogo->time_1 }}">
                                                <span class="text-center fw-semibold">{{ $jogo->time_1 }}</span>
                                            </div>
                                            <input type="number" {{ $jogo->placar_1 }}>

                                            <span class="fs-3 text-secondary text-center fw-bold">{{ date('h:m', strtotime($jogo->data)) }}</span>
                                            <div class="time d-flex flex-column align-items-center">
                                                <img src="{{ url("assets/img/bandeiras/$jogo->bandeira_2") }}" alt="{{ $jogo->time_2 }}">
                                                <span class="text-center fw-semibold">{{ $jogo->time_2 }}</span>
                                            </div>
                                            <input type="number">
                                            <div>
                                                <button class="button button3">Apostar</button>
                                                </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            @endforeach
                        </div>






                        <section id="rodape">
                            <div class="row h-100">
                                <div class="col-12 d-flex flex-column justify-content-center">
                                    <p class="text-center">Desenvolvido pelo IF - {{ date('Y') }}</p>
                                </div>
                            </div>
                        </section>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
                        </script>
</body>

</html>
