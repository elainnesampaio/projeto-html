<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Projeto Saúde</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/imagens/icon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <header>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="/imagens/medtech(2).png" alt="Logo MediTech" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Use a vontade nossos serviços</h1>
                <!-- Icon Divider-->
            </div>
        </header>
        <!---NavBar--->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">

                <a class="navbar-brand" href="../index.php"> LOGIN</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded float-right"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="../index.php">Início</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('register') }}"
                                    class="nav-link py-3 px-0 px-lg-3 rounded">Cadastro</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="Duvidas.html">Dúvidas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!---------------------------CORPO DA PAGINA ------------------------------>

    <!---Formulário Login -->
    <x-guest-layout>
        <section>
            <div class="container">
                <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

                <form class="login" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label class="form-label" for="email" :value="__('Email')" />
                        <x-text-input id="exampleInputEmail1" class="form-control" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label class="form-label" for="password" :value="__('Senha')" />

                        <x-text-input id="exampleInputPassword1" class="form-control" type="password" name="password"
                            required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Esqueci a senha') }}
                            </a>
                        @endif

                        <x-primary-button class="btn btn-primary">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </section>
    </x-guest-layout>
    <!------------------------------------------------------------------------>
    <!--Footer-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <!-- Copyright Section-->
    <footer>
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Medtech 2024</small></div>
        </div>
    </footer>
</body>

</html>
