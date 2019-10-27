<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="TNET Digital Marketing">

        <title>E-logistics</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">

        <script src="https://kit.fontawesome.com/acebc98d12.js" crossorigin="anonymous"></script>

    </head>

    <body id="home">
        <?php if ($this->session->flashdata('success')) { ?>
            <div id="sucesso" class="text-center alert alert-success mb-0 fixed-bottom" role="alert">
                <strong><?= $this->session->flashdata('success') ?></strong>
            </div>
        <?php }
        ?>

        <?php if ($this->session->flashdata('error')) { ?>
            <div id="error" class="text-center alert alert-danger mb-0 fixed-bottom" role="alert">
                <strong><?= $this->session->flashdata('error') ?></strong>
            </div>
        <?php } ?>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #363636">
            <a class="navbar-brand text-light" href="<?=base_url('embarcador')?>"><img src="./img/thenet_logo_branco.png" width="130" height=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#about">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#services">Serviço</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#difer">Diferenciais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#footer">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
        <section id="home" class="home-page-embarc pb-5" style="padding-top: 10%">
            <div class="row m-0 p-0">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="row m-0 p-0 mt-5 justify-content-center">
                        <div class="col-10">
                            <h1 class="text-light text-center">A NÚMERO 1 EM SOLUÇÕES DE COTAÇÃO DE FRETES</h1>
                        </div>
                    </div>
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-10">
                            <hr class="mx-auto d-block" style="border:2px solid #000000; width:10%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-10">
                            <h3 class="text-light text-center">Faça cotações com apenas alguns clicks e deixe que nós cuidamos de tudo para você</h3>
                        </div>
                    </div>

                    <form class="container" method="POST" action="<?= base_url('orcamento') ?>">
                        <div class="row m-0 mt-5 p-0 justify-content-center">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0 pr-0 pr-sm-0 pr-md-3 pr-lg-3 pr-xl-3">
                                <!--<h5 class="text-light">Nome*</h5>-->
                                <input class="form-control" name="nome" type="text" required="" placeholder="Nome*">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 pl-0 pr-0 pr-sm-0 pr-md-3 pr-lg-3 pr-xl-3">
                                <!--<h5 class="text-light">Celular*</h5>-->
                                <input class="form-control" name="celular" type="text" required="" placeholder="Celular*">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 pl-0 pr-0 pr-sm-0 pr-md-3 pr-lg-3 pr-xl-3">
                                <!--<h5 class="text-light">E-mail*</h5>-->
                                <input class="form-control" name="email" type="email" required="" placeholder="E-mail*">
                            </div>
                            <div id="select-div" class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 pl-0 pr-0 pr-sm-0 pr-md-3 pr-lg-3 pr-xl-3">
                                <!--<h5 class="text-light">E-mail*</h5>-->
                                <select id="segmento" name="segmento" onchange="selec();" class="form-control">
                                    <option value="">Segmento*</option>
                                    <?php foreach ($segmentos as $segmento) { ?>
                                        <option value="<?= $segmento["id"] ?>"><?= $segmento["nome"] ?></option>
                                    <?php } ?>
                                </select>

<!--<input class="form-control" name="segmento" type="text" required="" placeholder="Segmento*">-->
                            </div>
                            <div id="text-div" class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 hidden-div pl-0 pr-0 pr-sm-0 pr-md-3 pr-lg-3 pr-xl-3">
                                <div class="row m-0 p-0">
                                    <div class="col-9 p-0">
                                        <input id="segmento-input" class="form-control" name="segmento_outro" type="hidden" required="" placeholder="Segmento*">
                                    </div>
                                    <div class="offset-1 col-2 p-0 mt-2" onclick="redo();">
                                        <span class="fas fa-redo text-white"></span>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function selec() {
                                    var selec = $("#segmento").val();
                                    if (selec == "10") {
                                        $("#segmento-input").val("");
                                        $("#segmento-input").attr("type", "text")
                                        $("#select-div").addClass("hidden-div");
                                        $("#select-div").attr("type", "hidden")
                                        $("#text-div").removeClass("hidden-div");
                                    }
                                }

                                function redo() {
                                    $("#text-div").addClass("hidden-div");
                                    $("#select-div").removeClass("hidden-div");
                                    $("#select-div").attr("type", "text")
                                    $("#segmento-input").attr("type", "hidden")
                                    $("#segmento").val("");
                                }

                            </script>
                        </div>
                        <div class="row m-0 mt-4 mt-sm-4 mt-md-4 mt-lg-5 mt-xl-5 p-0 justify-content-center">
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 pl-0">
                                <input type="submit" class="btn mx-auto d-block text-light" style="background-color:#2f48d2" value="CADASTRE-SE AGORA">
                            </div>
                        </div>
                    </form>
                    <div class="overlay"></div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                    <div class="row m-0 p-0">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div onclick="redi('aereo');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6 ml-4 ml-sm-4 ml-sm-4 ml-lg-0 ml-xl-0">
                                        <span class="fas fa-plane fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6">
                                        <p class="neosans text-white text-center mt-3">Aéreo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                            <div onclick="redi('armazenagem');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-7 ml-5 ml-sm-5 ml-sm-5 ml-lg-2 ml-xl-2">
                                        <span class="fas fa-warehouse fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-10">
                                        <p class="neosans text-white text-center mt-3">Armazenagem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                            <div onclick="redi('carga-completa');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6 ml-4 ml-sm-4 ml-sm-4 ml-lg-0 ml-xl-0">
                                        <span class="fas fa-box fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col">
                                        <p class="neosans text-white text-center mt-3">Carga Completa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mt-4 p-0">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div onclick="redi('carga-fracionada');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6 ml-4 ml-sm-4 ml-sm-4 ml-lg-0 ml-xl-0">
                                        <p class="texr-center m-0"><span class="fas fa-boxes fa-3x text-white"></span></p>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col">
                                        <p class="neosans text-white text-center mt-3">Carga Fracionada</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                            <div onclick="redi('motoboy');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-7 ml-5 ml-sm-5 ml-sm-5 ml-lg-2 ml-xl-2">
                                        <span class="fas fa-motorcycle fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-10">
                                        <p class="neosans text-white text-center mt-3">Motoboy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                            <div onclick="redi('mudanca');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6 ml-4 ml-sm-4 ml-sm-4 ml-lg-0 ml-xl-0">
                                        <span class="fas fa-truck fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col">
                                        <p class="neosans text-white text-center mt-3">Mudança</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mt-4 p-0">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div onclick="redi('quimico');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-7 ml-4 ml-sm-4 ml-sm-4 ml-lg-0 ml-xl-0">
                                        <span class="fas fa-biohazard fa-3x text-white ml-2"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6">
                                        <p class="neosans text-white text-center mt-3">Químico</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                            <div onclick="redi('refrigerado');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-7 ml-5 ml-sm-5 ml-sm-5 ml-lg-4 ml-xl-4">
                                        <span class="fas fa-snowflake fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-10">
                                        <p class="neosans text-white text-center mt-3">Refrigerado</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-4 mt-lg-0 mt-xl-0">
                            <div onclick="redi('residuos');" class="p-3 pt-5 btn-cot" style="background-color: #2f48d2; border-radius: 5px">
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col-6 ml-4 ml-sm-4 ml-sm-4 ml-lg-0 ml-xl-0">
                                        <span class="fas fa-recycle fa-3x text-white"></span>
                                    </div>
                                </div>
                                <div class="row m-0 p-0 justify-content-center">
                                    <div class="col">
                                        <p class="neosans text-white text-center mt-3">Resíduos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function redi(param){
                    window.location.href = "<?=base_url()?>" + param;
                }
            </script>
        </section>

        <section class="content-section about-embarc" id="about">
            <div class="container text-center mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-4 text-right" style="margin-top:10%">
                        <h3 class="um-pouco">UM POUCO SOBRE O<br>E-LOGISTICS</h3>
                    </div>
                    <div id="bq" class="col-lg-4 mx-auto">
                        <h2>SOBRE NÓS</h2>
                        <blockquote>
                            <p class="lead mb-5 text-justify first p-3 p-sm-3 p-md-0 p-lg-0 p-xl-0" style="font-weight: 500; z-index: -1">
                                Somos especialistas em cotações de fretes dos mais diversos segmentos. Nossa empresa oferece a melhor opção para você encontrar
                                a transportadora ideal para os seus fretes. Possuímos um algoritmo que lhe permite encontrar cotações segmentadas para o seu negócio.
                            </p>
                            <!--                <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>-->
                        </blockquote>
                    </div>
                    <div class="col-lg-4 mx-auto">
                        <img class="manin" src="./img/manin.png">
                    </div>
                </div>
            </div>
            <div id="sobre-tercio" class="">
                <div class="row m-0 p-0 justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 pl-0 pl-sm-0 pl-md-2 pl-lg-5 pl-xl-5">
                        <img class="rounded-circle tercio-500 ml-auto d-block" src="./img/tnet-tercio-borlenghi.png">
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 mt-5">
                        <div class="row m-0 p-0 justify-content-start">
                            <div class="col-10">
                                <h1 class="tercio-nome">TERCIO PATINI BORLENGHI</h1>
                            </div>
                        </div>
                        <div class="row m-0 p-0 justify-content-start">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                <h5 class="tercio-nome" style="text-align: justify; font-weight: 500">
                                    O fundador do sistema e-logistics, Tercio Borlenghi Neto, é CEO da TNET Digital, que é uma softwarehouse voltada para inovação e novas tecnologias para o mercado Logístico. Tercio também é Presidente da Ambipar Logistics, um dos maiores operadores logísticos de produtos químicos perigosos do Brasil.
                                    Especialista em marketing digital, voltado para empresas de transportes, onde se tornou referência
                                    em aquisições de clientes na internet.Tercio Borlenghi Neto, é conhecido por sua
                                    forma peculiar de conduzir os negócios, e por suas grandes realizações no segmento
                                    de Transportes nos últimos anos, tem apurado senso de oportunidade, que deu a ele
                                    o título de um dos mais jovens Presidente de empresas multinacionais do Brasil.
                                    Possuí muita experiência no segmento de transportes, adquirida ao longo de anos na presidência da Ambipar Logistics, onde pôde vivenciar diversos problemas do setor e também conseguiu visualizar um fértil campo de atuação na área de marketing digital voltado para logística e transportes, criando assim, o e-logistics para ajudar no sucesso e crescimento do setor no Brasil.
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sobre-equipe" class="mt-5">
                <div class="row m-0 p-0 justify-content-center bg-light">
                    <div class="col-8 text-center mt-4">
                        <h1 class="text-dark">NOSSA EQUIPE</h1>
                    </div>
                </div>

                <div class="row m-0 p-0 bg-light py-3 justify-content-center">

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <img class="rounded-circle mx-auto d-block" src="./img/tnet-barbara-bochoschi.jpg" width="250">
                        <p class="text-center" style="font-weight: 600; padding-top:2rem; margin-bottom: 0px;">BARBARA BOCHOSCHI</p>
                        <p class="text-center">Especialista em Logística</p>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <img class="rounded-circle mx-auto d-block" src="./img/tnet-gabriela-arcanjo.jpg" width="250">
                        <p class="text-center" style="font-weight: 600; padding-top:2rem; margin-bottom: 0px;">GABRIELA ARCANJO</p>
                        <p class="text-center">Secretária Executiva</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <img class="rounded-circle mx-auto d-block" src="./img/tnet-nicolas-nardo.jpg" width="250">
                        <p class="text-center" style="font-weight: 600; padding-top:2rem; margin-bottom: 0px;">NICOLAS NARDO</p>
                        <p class="text-center">Especialista em Criação</p>
                    </div>
                </div>

                <div class="row m-0 p-0 bg-light py-3 justify-content-center mt-5">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <img class="rounded-circle mx-auto d-block" src="./img/tnet-pascoal-soares.jpg" width="250">
                        <p class="text-center" style="font-weight: 600; padding-top:2rem; margin-bottom: 0px;">PASCOAL SOARES</p>
                        <p class="text-center">Gerente Operacional</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <img class="rounded-circle mx-auto d-block" src="./img/tnet-victor-crepaldi.jpg" width="250">
                        <p class="text-center" style="font-weight: 600; padding-top:2rem; margin-bottom: 0px;">VICTOR CREPALDI</p>
                        <p class="text-center">Especialista em Desenvolvimento</p>
                    </div>
                </div>
        </section>

        <section class="content-section" style="" id="services">
            <div class="row m-0 p-0 py-5 bg-light">
                <div class="col-12">
                    <h2 class="text-center">COTAÇÕES SEGMENTADAS</h2>
                </div>
            </div>

            <div class="container">
                <div class="row m-0 p-0 bg-light">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #e6e6ff;">
                        <img class="mx-auto d-block" src="./img/airplane.png" width="100">
                        <h3 class="text-center">AÉREO</h3>
                        <p style="text-align: justify;">
                            Faça sua entrega voar. Conosco você não perde tempo e recebe cotações aéreas diariamente.
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                        <img class="mx-auto d-block" src="./img/armazenagem.png" width="100">
                        <h3 class="text-center">ARMAZENAGEM</h3>
                        <p style="text-align: justify;">
                            Se precisar, também podemos encontrar cotações para que seus carregamentos fiquem armazenados em local seguro
                            e confiável, mantendo sua carga intacta.
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #e6e6ff;">
                        <img class="mx-auto d-block" src="./img/container.png" width="100">
                        <h3 class="text-center">CARGA COMPLETA</h3>
                        <p style="text-align: justify">
                            Por meio de nossa tecnlogia conseguimos cruzar as suas necessidades com a demanda das transportadoras, aumentando sua satisfação
                            e reduzindo custos.
                        </p>
                    </div>
                </div>

                <div class="row m-0 p-0 bg-light">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                        <img class="mx-auto d-block" src="./img/box.png" width="100">
                        <h3 class="text-center">CARGA FRACIONADA</h3>
                        <p style="text-align: justify">
                            Se você precisa de um frete para carga fracionada, grande ou pequena, você está no lugar certo. Encontre aqui cotações para as suas necessidades.
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #e6e6ff;">
                        <img class="mx-auto d-block" src="./img/scooter.png" width="100">
                        <h3 class="text-center">MOTOBOY</h3>
                        <p style="text-align: justify">
                            Conte conosco para encontrar fretes rápidos e de cargas pequenas. Nós intermediamos o seu contato com um motoboy.
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                        <img class="mx-auto d-block" src="./img/truck.png" width="100">
                        <h3 class="text-center">MUDANÇA</h3>
                        <p style="text-align: justify">
                            Vai se mudar? Nós te oferecemos as melhores cotações de transportadoras para todo o Brasil. <strong>É rápido e seguro.</strong>
                        </p>
                    </div>
                </div>

                <div class="row m-0 p-0 bg-light">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #e6e6ff;">
                        <img class="mx-auto d-block" src="./img/flasks.png" width="100">
                        <h3 class="text-center">QUÍMICO</h3>
                        <p style="text-align: justify">
                            Transporte suas cargas químicas com total segurança.
                            Encontramos transportadoras treinadas para qualquer tipo de produto que você precise transportar.
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                        <img class="mx-auto d-block" src="./img/refrigerado.png" width="100">
                        <h3 class="text-center">REFRIGERADO</h3>
                        <p style="text-align: justify">
                            Aqui você encontra transportadoras competentes onde pode confiar no transporte de suas cargas refrigeradas.
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #e6e6ff;">
                        <img class="mx-auto d-block" src="./img/trash.png" width="100">
                        <h3 class="text-center">RESÍDUO</h3>
                        <p style="text-align: justify">
                            Seus resíduos sendo coletados e transportados com segurança. Economize tempo e dinheiro fazendo uma cotação conosco.
                            Possuímos a infraestrutura necessária para localizar transportadoras deste segmento no Brasil todo.
                        </p>
                    </div>
                </div>

                <hr>

                <div class="row m-0 mt-4 p-0 bg-light">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
                        <h5 class="text-center">*Não encontrou seu segmento?</h5>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <a class="js-scroll-trigger" href="#home">
                            <input type="button" class="btn mx-auto d-block text-light" style="background-color:#2f48d2" value="CLIQUE AQUI">
                        </a>
                    </div>
                </div>
                <hr>
            </div>
        </section>

        <section class="content-section bg-light text-white text-center" id="services">
            <div class="p-4-5">
                <div class="content-section-heading">
                    <h3 style="font-size:30px; color: #000000;"> O que nós oferecemos</h3>
                    <p style="color: #363636;">SERVIÇOS E-LOGISTICS</p>
                    <hr class="mb-5" style="border:2px solid #fac312; width: 5%;">
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mx-2 pt-4 px-2 px-sm-2 px-md-5 px-lg-5 px-xl-5 pb-4 pb-sm-4 pb-md-0 pb-lg-0 pb-xl-0 services-embarc">
        <!--                <span class="service-icon rounded-circle mx-auto mb-3">
                            <i class="icon-screen-smartphone"></i>
                        </span>-->
                        <div class="row m-0 p-0">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-5">
                                <i class="fas fa-truck fa-5x mt-3 text-dark"></i>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 mt-3 text-1">
                                <h4 class="" style="color: #000000;">Somos especialistas em logística</h4>
                                <p class="text-2 mb-0" style="color:#363636;">Nossa equipe especialista em logística possue contatos, canais e são
                                    ligados ao transporte de cargas desde antes do nascimento da empresa.</p>
                            </div>


                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mx-2 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 pt-4 px-2 px-sm-2 px-md-5 px-lg-5 px-xl-5 pb-4 pb-sm-4 pb-md-0 pb-lg-0 pb-xl-0 services-embarc">
        <!--                <span class="service-icon rounded-circle mx-auto mb-3">
                            <i class="icon-pencil"></i>
                        </span>-->
                        <div class="row m-0 p-0">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-5">
                                <i class="fas fa-hands-helping fa-5x mt-3 text-dark"></i>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 mt-3 text-1">
                                <h4 class="" style="color: #000000;">Comodidade e Facilidade</h4>
                                <p class="text-2  mb-0" style="color:#363636;">Com apenas alguns clicks você conseguirá adquirir uma ferramenta
                                    tecnológica fantástica e uma parceira de peso para seus negócios.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mx-2 pt-4 px-2 px-sm-2 px-md-5 px-lg-5 px-xl-5 pb-4 pb-sm-4 pb-md-0 pb-lg-0 pb-xl-0 services-embarc">
        <!--                <span class="service-icon rounded-circle mx-auto mb-3">
                            <i class="icon-screen-smartphone"></i>
                        </span>-->
                        <div class="row m-0 p-0">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <i class="fas fa-tachometer-alt fa-5x mt-5 text-dark"></i>
                            </div>

                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-1">
                                <h4 class="" style="color: #000000;">Rapidez e Praticidade</h4>
                                <p class="text-2 mb-0" style="color:#363636;">Não se preocupe, lhe enviaremos cotações diretamente para seu e-mail comercial, utilizando nossa
                                    estrutura e as tecnologias mais avançadas; só precisamos de um simples cadastro para começar a ajudá-lo.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mx-2 pt-4 px-5 services-embarc">
        <!--                <span class="service-icon rounded-circle mx-auto mb-3">
                            <i class="icon-pencil"></i>
                        </span>-->
                        <div class="row m-0 p-0">
                            <div class="col-3">
                                <i class="fas fa-eye fa-5x mt-5 text-dark"></i>
                            </div>
                            <div class="col-9 text-left">
                                <h4 style="color: #000000;">Não seja invisível na WEB</h4>
                                <p class="mb-0" style="color:#363636;">Hoje a internet constitui uma grande vitrine que abre portas para
                                    diversos negócios e com TNET digital sua empresa irá encontrar muitas oportunidades de negócios para alavancar seus rendimentos.</p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section class="call pb-5">
            <div class="justify-content-center row m-0 p-0">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 text-center align-content-center pt-5">
                    <h1 class="text-dark">Somos a solução para seus fretes</h1>
                    <p class="text-dark" style="font-weight: 500">Encontre a transportadora ideal para você</p>
                </div>
            </div>
            <div class="justify-content-center row m-0 p-0">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 text-center align-content-center">
                    <a class="js-scroll-trigger" href="#home">
                        <input type="button" class="btn btn-xl px-4 py-1 mt-4 text-light" style="background-color: #2f48d2;" value="COTE AQUI">
                    </a>
                    <a class="js-scroll-trigger" target="_blank" href="https://api.whatsapp.com/send?phone=5519996259861&text=Ol%C3%A1,%20eu%20quero%20fazer%20uma%20cotação%20!">
                        <input type="button" class="btn btn-xl text-light px-4 py-1 mt-4 ml-0 ml-sm-0 ml-md-3 ml-lg-3 ml-xl-3" style="background-color: #363636;" value="ENTRE EM CONTATO CONOSCO">
                    </a>
                </div>
            </div>
        </section>

        <section id="difer" class="choice-embarc">
            <div class="row m-0 p-0 pt-5 justify-content-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                    <h1 class="text-light mt-4">Por que nos escolher?</h1>
                </div>
            </div>
            <div class="choice-item">
                <div class="row m-0 p-0 justify-content-center">
                    <div class="col-12">
                        <hr class="mb-5 hrclass" style="border:2px solid #2f48d2; text-align: center">
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center">
                        <i class="fas fa-hand-holding-usd fa-3x text-light mb-3"></i>
                        <h3 class="text-light text-center">CUSTO ZERO</h3>
                        <h5 class="text-light justific">Preencha os formulários gratuitamente e envie sua cotação para diversas tranportadoras!</h5>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center">
                        <i class="fas fa-check-square fa-3x text-light mb-3"></i>
                        <h3 class="text-light text-center">GARANTIA DE SUCESSO</h3>
                        <h5 class="text-light justific">Você vai conquistar muitos clientes com nossa plataforma tecnlógica.</h5>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center">
                        <i class="fas fa-user-friends fa-3x text-light mb-3"></i>
                        <h3 class="text-light text-center">QUANTIDADE E QUALIDADE</h3>
                        <h5 class="text-light justific">Especialistas de logística dedicados no sucesso das suas cotações!</h5>

                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer" class="footer pb-3" style="background-color: #363636;">
            <div class="container">
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="row m-0 p-0">
                            <div class="col-11">
                                <h2 class="text-light">ENDEREÇO</h2>
                            </div>
                        </div>
                        <div style="border-left: 5px solid #2f48d2">
                            <div class="row m-0 mt-3 p-0">
                                <div class="col-12">
                                    <h4 class="text-light">Av. Anhanguera, km120, 550<br> Distrito Industrial 1 <br> Nova Odessa / SP <br>CEP 13.388-220</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu-footer" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-0 mt-lg-0 mt-xl-0">
                        <div class="row m-0 p-0">
                            <div class="col-11">
                                <h2 class="text-light">MENU</h2>
                            </div>
                        </div>
                        <ul class="" style="border-left: 5px solid #2f48d2">
                            <li class="mt-3 dot-white">
                                <a class="text-white mr-3 neosans" href="#home">Home</a>
                            </li>
                            <li class="mt-3 dot-white">
                                <a class="text-white mr-3 neosans" href="#about">Sobre Nós</a>
                            </li>
                            <li class="mt-3 dot-white">
                                <a class="text-white mr-3 neosans" href="#services">Serviço</a>
                            </li>
                            <li class="mt-3 dot-white">
                                <a class="text-white mr-3 neosans" href="#difer">Diferenciais</a>
                            </li>
                            <li class="mt-3 dot-white">
                                <a class="text-white mr-3 neosans" href="#footer">Contato</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-4 mt-sm-4 mt-md-0 mt-lg-0 mt-xl-0">
                        <form method="POST" action="<?= base_url('/contato') ?>">
                            <div class="row m-0 p-0">
                                <div class="col-11">
                                    <h2 class="text-light">CONTATO</h2>
                                </div>
                            </div>
                            <div style="border-left: 5px solid #2f48d2">
                                <div class="row m-0 mt-3 p-0">
                                    <div class="col-12">
                                        <h6 class="text-light text-left">NOME*</h6>
                                        <input class="form-control" name="nome" type="text" required>
                                    </div>
                                </div>
                                <div class="row m-0 mt-3 p-0">
                                    <div class="col-12">
                                        <h6 class="text-light text-left">E-MAIL*</h6>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="row m-0 mt-3 p-0">
                                    <div class="col-12">
                                        <h6 class="text-light text-left">TELEFONE</h6>
                                        <input class="form-control" type="text" name="telefone" maxlength="14">
                                    </div>
                                </div>
                                <!--                <div class="row m-0 mt-2 p-0">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <h6 class="text-light">Email*</h6>
                                <input class="form-control" type="email" required>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                            <h6 class="text-light">Telefone</h6>
                            <input class="form-control" type="text">
                        </div>
                    </div>-->
                                <div class="row m-0 mt-3 p-0">
                                    <div class="col-12">
                                        <h6 class="text-light">MENSAGEM*</h6>
                                        <textarea class="form-control" col="50" rows="8" name="mensagem" required></textarea>
                                    </div>
                                </div>
                                <div class="row m-0 mt-2 p-3">
                                    <input type="submit" class="col-12 btn text-light px-3" style="background-color: #2f48d2" value="ENVIAR">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="text-muted small mb-0 text-center pt-5">Copyright &copy; TNET Digital Marketing 2019</p>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#home">
            <i class="fas fa-angle-up mt-3"></i>
        </a>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for this template -->
        <script src="js/stylish-portfolio.min.js"></script>
    </body>
</html>
