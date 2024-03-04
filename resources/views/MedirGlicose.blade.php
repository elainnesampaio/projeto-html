
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Projeto saúde</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="imagens/icon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles_1.css" rel="stylesheet" />
</head>
<header>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">* Controle da glicose </a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="/duvidas">Dúvidas</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="/suporte">Suporte</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="#">Histórico</a></li>
                        @if (Route::has('login'))
                            <div class="navbar-nav ms-auto">
                                @auth
                                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ url('/dashboard') }}"
                                            class="nav-link py-3 px-0 px-lg-3 rounded">minha Conta</a></li>
                                @else
                                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('login') }}"
                                            class="nav-link py-3 px-0 px-lg-3 rounded">Login</a></li>

                                        @if (Route::has('register'))
                                            <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('register') }}"
                                                    class="nav-link py-3 px-0 px-lg-3 rounded">Cadastro</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </ul>
                    </div>
            </nav>

<section class="page-section glicemia" id="glicemia">
    <div class="container">
        <!-- glicemia Section-->
        
            <h1>INSERIR TAXA</h1>
            <!--onde vai ficar o conteúdo-->
            <aside>
                <img class="img-fluid rounded mb-5" src="/imagens/medidorGlicose.png" alt="..." />
            </aside>
            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Inserir valor</label>
                <input class="form-control" id="valor_glicemia" type="number" name="valor_Gli"
                    data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="name:required">um valor é necessário.</div>

                <button onclick="calcularExame()" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalGlicose">Enviar</button>
            </div>
       
    </div>
</section>


<!------------- Modal RESULTADO --->
<div class="portfolio-modal modal fade" id="modalGlicose" tabindex="-1" aria-labelledby="modalGlicose" 
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body text-center pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Resultado:</h2>
                            <!-- Icon Divider-->
                            <p></p>
                            <h2>ATENÇÃO, os resultados não substituí seu acompanhamento com médico.</h2>
                            
                            <div class="modal_resul" id="resulExame">
                            <!-- Imagem da Modal -->
                            
                            
                            

                            </div class="" method= "post" >
                            @if (Route::has('login'))
                                @auth
                                
                                <a action="{{ route('cadastrar-glicose') }}"href=" {{ url('/dashboard') }}" class="btn btn-primary" onclick="calcularExame()">Salvar</a>
                                @else
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-primary">Salvar</a>
                                    @endif
                                @endauth
                            @endif
                            <a class="btn btn-primary" data-bs-dismiss="modal" role="button"></i>Agora não </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  




<script>
    function calcularExame() {
        const valorGlicemia = document.getElementById('valor_glicemia').value;

        if (valorGlicemia !== '') {
            const resultado = interpretarResultadoGlicemia(valorGlicemia);
            exibirModal(resultado);
        }else{
            return "valor nulo não é permitido";
        }
    }
    
    function interpretarResultadoGlicemia(valorGlicose) {
        if (valorGlicose < 70) {
            return "Hipoglicemia";
        } else if (valorGlicose >= 70 && valorGlicose <= 100) {
            return "Níveis normais";
        } else if (valorGlicose > 100 && valorGlicose <= 125) {
            return "Pré-diabetes";
        } else {
            return "Diabetes";
        }
    }

    function exibirModal(resultado) {
        const modalBody = document.getElementById('resulExame');
        modalBody.innerHTML = `<p>${resultado}</p>`;


    }
</script>

<!-- Footer-->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <!-- Footer Location-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Location</h4>
                <p class="lead mb-0">
                    2215 John Daniel Drive
                    <br />
                    Clark, MO 65243
                </p>
            </div>

            <!-- Footer About Text-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">About Freelancer</h4>
                <p class="lead mb-0">
                    Freelance is a free to use, MIT licensed Bootstrap theme created by
                    <a href="http://startbootstrap.com">Start Bootstrap</a> <!--LINK DENTRO DE UM PARÁGRAFO-->
                    .
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; Your Website 2023</small></div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>