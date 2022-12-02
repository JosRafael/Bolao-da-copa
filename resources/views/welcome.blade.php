<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('assets/css/welcome.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bolão do IF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apostas.index') }}">Minhas Apostas</a>
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

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('assets/img/banner1.webp') }}" class="d-block w-100" alt="banner 1">
            </div>
            <div class="carousel-item">
                <img src="{{ url('assets/img/banner2.jpg') }}" class="d-block w-100" alt="banner 2">
            </div>
            <div class="carousel-item">
                <img src="{{ url('assets/img/banner3.jpg') }}" class="d-block w-100" alt="banner 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section>
        <div class="container p-3">
            @if (auth()->check())
                <div class="row">
                    <div class="col-12 d-flex flex-column justify-content-center">
                        <p class="text-center fs-1">Bem vindo, {{ Auth::user()->nome }}</p>
                        <p class="text-center fs-4">Faça a sua aposta!</p>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="p-5">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <p class="fs-3">Login</p>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary">Entrar</button>
                                @if ($errors->first('email'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                        {{ $errors->first('email') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="p-5">
                            <form action="{{ route('cadastrar') }}" method="POST">
                                @csrf
                                <p class="fs-3">Cadastre-se</p>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirmar Senha</label>
                                    <input type="password" name="confirma_password" class="form-control"
                                        id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                @if ($errors->first('cadastro'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                        {{ $errors->first('cadastro') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('cadastro'))
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                        {{ session('cadastro') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section id="jogos">
        <div class="container p-5">
            <div class="row">
                @foreach ($jogos as $jogo)
                    <div class="col-12 col-md-4 ">
                        <div class="card p-3 m-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-around align-items-center h-100">
                                    <div class="time d-flex flex-column align-items-center">
                                        <img src='{{ url("assets/img/bandeiras/$jogo->bandeira_1") }}'
                                            alt="{{ $jogo->time_1 }}">
                                        <span class="text-center fw-semibold">{{ $jogo->time_1 }}</span>
                                    </div>
                                    <span
                                        class="fs-3 text-secondary text-center fw-bold">{{ date('h:m', strtotime($jogo->data)) }}</span>
                                    <div class="time d-flex flex-column align-items-center">
                                        <img src="{{ url("assets/img/bandeiras/$jogo->bandeira_2") }}"
                                            alt="{{ $jogo->time_2 }}">
                                        <span class="text-center fw-semibold">{{ $jogo->time_2 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @auth
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <a class="btn btn-apostar apostar btn-light" href="{{ route('apostas.index') }}" role="button">
                            APOSTAR
                        </a>
                    </div>
                </div>
            @endauth

        </div>
    </section>

    <section id="rodape">
        <div class="row h-100">
            <div class="col-12 d-flex flex-column justify-content-center">
                <p class="text-center">Desenvolvido pelo IF - {{ date('Y') }}</p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
