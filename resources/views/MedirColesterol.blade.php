<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Projeto Saúde</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="imagens/icon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <!-- Navigation-->
    <header>
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Exame de sangue - Colesterol </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Início</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/duvidas">Dúvidas</a></li>
  
              
                @if (Route::has('login'))
                <div class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ url('/dashboard') }}" class="nav-link py-3 px-0 px-lg-3 rounded">minha Conta</a></li>
                    @else
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('login') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Login</a></li>
 
                        @if (Route::has('register'))
                        <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('register') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Cadastro</a></li>
                        @endif
                    @endauth
                    </div>
                    @endif

                    </ul><div class=""></div>
                </div>
        </div>
    </nav>
</header> 
    <section class="page-section sangue" id="sangue">
        <h1 class="textosangue">Importante!</h1>
            <h2 class="subtitulosangue">Recomendamos ter feito o exame de sangue com no minímo 8 horas de jejum, pois o valor pode ser imprecisso.</h2>
        <div class="sangue">
            <!-- Portfolio Section Heading-->
            <h1>INSERIR TAXAS DE VALORES</h1><!--onde vai ficar o conteúdo-->
            <div class="form-floating mb-3">
                <input class="form-control" id="valor" type="number" name="olesterol_hdl" placeholder="Digite primeiro valor aqui..." data-sb-validations="required" />
                <label for="number">Inserir primeiro valor aqui</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">Um valor é necessário.</div>
            </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="name" type="number" name="olesterol_ldl" placeholder="Digite o Segundo valor..." data-sb-validations="required" />
            <label for="number">Inserir Segundo valor aqui</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">Um valor é necessário.</div>
        </div>
        <button onclick="calculoColesterol()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalColesterol">Enviar</button>
    </div>
    </section>
  


<!---------- Modal RESULTADO --->
<div class="portfolio-modal modal fade" id="modalColesterol" tabindex="-1" aria-labelledby="modalColesterol"
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
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">HDL & LDL</h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <!-- Imagem da Modal -->
                            <img class="img-fluid rounded mb-5" src="/" alt="..." />
                            <p class="mb-4">Resultado do teste</p>
                            <div class="modal_resul" id="resulExame">

                            </div>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('cadastrar-colesterol') }}" class="btn btn-primary">Salvar</a>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


            <script>
                function calculoColesterol(request){-

                colesterolHDL = request->input('colesterol_hdl');
                colesterolLDL = request->input('colesterol_ldl');

                classificacaoHDL = this->classificarColesterolHDL(colesterolHDL);
                classificacaoLDL = this->classificarColesterolLDL(colesterolLDL);

                resultado =classificacaoHDL, classificacaoLDL;

                }

                function classificarColesterolHDL(colesterolHDL)
                {
                if (colesterolHDL < 40) {
                    return 'Baixo';
                } elseif (colesterolHDL >= 40 && colesterolHDL <= 60) {
                    return 'Normal';
                } else {
                    return 'Alto';
                }
                }

                function classificarColesterolLDL($colesterolLDL)
                {
                if (colesterolLDL < 100) {
                    return 'Ótimo';
                } elseif (colesterolLDL >= 100 && colesterolLDL <= 129) {
                    return 'Normal';
                } elseif (colesterolLDL >= 130 && colesterolLDL <= 159) {
                    return 'Limítrofe';
                } elseif (colesterolLDL >= 160 && colesterolLDL <= 189) {
                    return 'Alto';
                } else {
                    return 'Muito alto';
                }
                }

                function resultado(resultado) {
                const modalBody = document.getElementById('resulExame');
                modalBody.innerHTML = `<p>${resultado}</p>`:


                      }

            </script>
     <!-- Footer-->
    <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Senac sbc</h4>
                        <p class="lead mb-0">
                            TI16M 2024
                            <br />
                            Projeto Saúde
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes sociais</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4"></h4>
                        <p class="lead mb-0">
                            Para entender mais sobre o nosso propósito, temos o WordPress como documentação com mais detalhes de autores... 
                            <a href="http://startbootstrap.com">Saiba mais</a><!--COLOCAR O LINK DO WORDPRESS AQUI-->
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Medtech 2024</small></div>
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