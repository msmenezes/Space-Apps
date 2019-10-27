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
            <a class="navbar-brand text-light" href="<?=base_url()?>"><img src="./img/thenet_logo_branco.png" width="130" height=""></a>
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
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#price">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light neosans js-scroll-trigger" href="#footer">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
        <section id="home" class="home-page">
            <div class="row m-0 p-0 pb-5">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pl-3 pl-sm-3 pl-md-3 pl-lg-5 pl-xl-5 mb-auto pr-3 pr-sm-3 pr-md-0 pr-lg-0 pr-xl-0" style="padding-top:15%">
                    <div class="row m-0 p-0">
                        <h1 class="text-light m-0 ml-0 ml-sm-0 ml-md-3 ml-lg-5 ml-xl-5">A PRIMEIRA E MAIOR EMPRESA DE GERAÇÃO DE COTAÇÕES <br>VOLTADAS PARA TRANSPORTADORAS</h1>
                    </div>
                    <div class="row m-0 p-0">
                        <hr class="my-4 ml-0 ml-sm-0 ml-md-3 ml-lg-5 ml-xl-5" style="border:2px solid #fac312; width:10%;">
                    </div>

                    <div class="row m-0 p-0">
                        <h3 class="text-light m-0 ml-0 ml-sm-0 ml-md-3 ml-lg-5 ml-xl-5">Já pensou em receber de 7 a 12 cotações de <br>FRETES de novos clientes todos os dias?<br>Com o e-Logistics isso é possível</h3>
                    </div>
                    <div class="row m-0 mt-4 ml-0 ml-sm-0 ml-md-5 ml-lg-5 ml-xl-5 p-0">
                        <input onclick="redi('https://api.whatsapp.com/send?phone=5519996259861&text=Ol%C3%A1,%20eu%20gostaria%20de%20receber%20%20um%20orçamento!', 'wp')" type="button" id="" class="btn btn-light col-12 col-sm-12 col-md-12 col-lg-6 col-6" style="" value="SOLICITE UM ORÇAMENTO">
                    </div>
                    <script>
                        function redi(param, wp = null){
                            if(!wp){
                                window.location.href = "<?=base_url()?>" + param;
                            } else {
                                window.open(param);
                            }

                        }
                    </script>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-xl-5" style="padding-top:13%">
                    <form class="" method="POST" action="<?= base_url('/insertCliente') ?>">
                        <div class="rounded py-3 px-3" style="background-color: #363636;">
                            <div class="row m-0 mt-3 p-0 justify-content-center">
                                <div class="col-11 p-0">
                                    <h2 class="text-light text-center">ADQUIRA NOSSO SERVIÇO</h2>
                                </div>
                            </div>
                            <div class="row m-0 mt-3 p-0">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <h6 class="text-light">CNPJ*</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" type="text" maxlength="14" name="cnpj" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                    <h6 class="text-light">Razão Social*</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" type="text" name="razao_social" required>
                                </div>
                            </div>

                            <div class="row m-0 mt-2 p-0">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <h6 class="text-light">Telefone*</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" type="text" name="telefone" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                    <h6 class="text-light">Celular*</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" type="text" name="celular" required>
                                </div>
                            </div>

                            <div class="row m-0 mt-2 p-0">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <h6 class="text-light">Email*</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" type="email" name="email" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">
                                    <h6 class="text-light">Nome</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" type="text" name="nome" required>
                                </div>
                            </div>

                            <div class="row m-0 mt-2 p-0">
                                <div class="col-12">
                                    <h6 class="text-light">Segmento de Interesse*</h6>
                                    <select class="form-control pt-0" style="height: calc(1.5em + 2px); border-radius:.15rem" name="segmento" >
                                        <option value="">*Segmento</option>
                                        <?php foreach ($segmentos as $segmento) { ?>
                                            <option value="<?= $segmento["id"] ?>"><?= $segmento["nome"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row m-0 mt-2 p-0">
                                <div class="col-12">
                                    <h6 class="text-light">A sua Região</h6>
                                    <input class="form-control" style="height: calc(1.5em + 2px); border-radius:.15rem" placeholder="" type="text" name="regiao">
                                </div>
                            </div>

                            <div class="row m-0 mt-2 p-3">
                                <input type="submit" class="col-12 btn text-dark px-3" style="background-color: #fac312" value="ADQUIRA AGORA!">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</section>

<section class="content-section about" id="about">
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-right" style="margin-top:10%">
                <h3 class="um-pouco">UM POUCO SOBRE O<br>E-LOGISTICS</h3>
            </div>
            <div class="col-lg-4 mx-auto">
                <h2>SOBRE NÓS</h2>
                <blockquote>
                    <p class="lead mb-5 text-justify first p-3 p-sm-3 p-md-0 p-lg-0 p-xl-0" style="font-weight: 500; z-index: -1">Chegou a hora da sua empresa se tornar Digital. Somos uma empresa focada em
                        buscar cotações específicas para o seu segmento e temos um algoritmo que está em constante mudança para garantir que
                        as cotações cheguem até você sem intermediários, com rapidez e segurança.</p>
                    <!--                <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>-->
                </blockquote>
            </div>
            <div class="col-lg-4 mx-auto">
                <img class="caminhao-perspec" src="./img/caminhao-perspectiva.png">
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

        <!--        <div class="row m-0 p-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 pl-0 pl-sm-0 pl-md-2 pl-lg-5 pl-xl-5">
                        <img class="rounded-circle" src="./img/tnet-tercio-borlenghi.png" width="500">
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 mt-8">
                        <div class="row m-0 p-0 justify-content-start">
                            <div class="col-10">
                                <h1 class="text-light">TERCIO PATINI BORLENGHI</h1>
                            </div>
                        </div>
                        <div class="row m-0 p-0 justify-content-center">
                            <div class="col-12">
                                <h5 class="text-light" style="text-align: justify">O fundador da TNET Digital Marketing, Tercio Borlenghi Neto, é conhecido por sua forma agressiva de conduzir os negócios,
                                    e por suas grandes realizações no segmento de Transportes nos últimos anos, tem apurado senso de oportunidade,
                                    que deu a ele o titulo de um dos mais jovens Presidente de empresas multinacionais do Brasil, A Ambipar Logistics.</h5>
                            </div>
                        </div>
                    </div>
                </div>-->
    </div>
</section>

<section class="content-section" id="video">
    <div class="">
        <div class="text-center mb-4">
            <h2>COMO PODEMOS TE AJUDAR:</h2>
        </div>
        <video class="mx-auto d-block" width="60%" poster="./img/poster.png" controls controlsList="nodownload">
            <source src="./video/tnet.mp4" type="video/mp4">
        </video>
    </div>

</seciton>

<section class="content-section" style="" id="services">
    <div class="row m-0 p-0 py-5 bg-light">
        <div class="col-12">
            <h2 class="text-center">COTAÇÕES SEGMENTADAS</h2>
        </div>
    </div>

    <div class="container">
        <div class="row m-0 p-0 bg-light">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #dcdcdc;">
                <img class="mx-auto d-block" src="./img/airplane.png" width="100">
                <h3 class="text-center">AÉREO</h3>
                <p style="text-align: justify;">
                    Contamos com um algoritmo totalmente capacitado em encontrar clientes para o seu negócio.
                    Aqui você não perde tempo e os clientes são segmentados para a sua região.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                <img class="mx-auto d-block" src="./img/armazenagem.png" width="100">
                <h3 class="text-center">ARMAZENAGEM</h3>
                <p style="text-align: justify;">
                    Soluções para o seu negócio. Receba cotações diárias de clientes que buscam um local seguro para armazenagem.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #dcdcdc;">
                <img class="mx-auto d-block" src="./img/container.png" width="100">
                <h3 class="text-center">CARGA COMPLETA</h3>
                <p style="text-align: justify">
                    Cotações específicas para o seu segmento. Aqui você consegue novas cotações de carga sem esforço algum.
                </p>
            </div>
        </div>

        <div class="row m-0 p-0 bg-light">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                <img class="mx-auto d-block" src="./img/box.png" width="100">
                <h3 class="text-center">CARGA FRACIONADA</h3>
                <p style="text-align: justify">
                    O embarcador te procura e você não tem nenhuma dor de cabeça. Somos especialistas em encontrar clientes para o seu setor de transporte.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #dcdcdc;">
                <img class="mx-auto d-block" src="./img/scooter.png" width="100">
                <h3 class="text-center">MOTOBOY</h3>
                <p style="text-align: justify">
                    Encontre clientes que necessitam de pequenas e rápidas entregas. De uma forma automatizada, agilizando o seu serviço e aumentando sua lucratividade.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                <img class="mx-auto d-block" src="./img/truck.png" width="100">
                <h3 class="text-center">MUDANÇA</h3>
                <p style="text-align: justify">
                    Vai se mudar? A TNET Digital te oferece as melhores transportadoras de mudanças em qualquer lugar do Brasil.
                </p>
            </div>
        </div>

        <div class="row m-0 p-0 bg-light">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #dcdcdc;">
                <img class="mx-auto d-block" src="./img/flasks.png" width="100">
                <h3 class="text-center">QUÍMICO</h3>
                <p style="text-align: justify">
                    Oferecemos as melhores oportunidades para captação dos seu clientes.
                    Aqui você recebe cotações de embarcadores de carga química de todo o Brasil.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3">
                <img class="mx-auto d-block" src="./img/refrigerado.png" width="100">
                <h3 class="text-center">REFRIGERADO</h3>
                <p style="text-align: justify">
                    Você que possui uma transportadora de cargas refrigeradas, seu negócio está aqui.
                    Garanta seu contato com o cliente do seu segmento e veja sua empresa alavancar.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 px-5 py-3" style="background-color: #dcdcdc;">
                <img class="mx-auto d-block" src="./img/trash.png" width="100">
                <h3 class="text-center">RESÍDUO</h3>
                <p style="text-align: justify">
                    Buscamos atender com precisão as necessidades de nossos clientes.
                    Com o conhecimento técnico adquirido temos a missão de entregar cotações para você, facilitando tanto o seu negócio quanto o do seu cliente.
                </p>
            </div>
        </div>
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mx-2 pt-4 px-2 px-sm-2 px-md-5 px-lg-5 px-xl-5 pb-4 pb-sm-4 pb-md-0 pb-lg-0 pb-xl-0 services">
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mx-2 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 pt-4 px-2 px-sm-2 px-md-5 px-lg-5 px-xl-5 pb-4 pb-sm-4 pb-md-0 pb-lg-0 pb-xl-0 services">
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mx-2 pt-4 px-2 px-sm-2 px-md-5 px-lg-5 px-xl-5 pb-4 pb-sm-4 pb-md-0 pb-lg-0 pb-xl-0 services">
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mx-2 pt-4 px-5 services">
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
            <h1 class="text-dark">Somos a solução para sua transportadora</h1>
            <p class="text-dark" style="font-weight: 500">Obtenha cotações diárias e começe agora mesmo</p>
        </div>
    </div>
    <div class="justify-content-center row m-0 p-0">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 text-center align-content-center">
            <a class="js-scroll-trigger" href="#price">
                <input type="button" class="btn btn-xl px-4 py-1 mt-4" style="background-color: #fac312;" value="OBTER SERVIÇO">
            </a>
            <a class="js-scroll-trigger" target="_blank" href="https://api.whatsapp.com/send?phone=5519996259861&text=Ol%C3%A1,%20eu%20gostaria%20de%20mais%20informações%20sobre%20o%20e-logistics!">
                <input type="button" class="btn btn-xl text-light px-4 py-1 mt-4 ml-0 ml-sm-0 ml-md-3 ml-lg-3 ml-xl-3" style="background-color: #363636;" value="ENTRE EM CONTATO CONOSCO">
            </a>
        </div>
    </div>
</section>

<section id="difer" class="choice">
    <div class="row m-0 p-0 pt-5 justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
            <h1 class="text-light mt-4">Por que nos escolher?</h1>
        </div>
    </div>
    <div class="choice-item">
        <div class="row m-0 p-0 justify-content-center">
            <div class="col-12">
                <hr class="mb-5 hrclass" style="border:2px solid #fac312; text-align: center">
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center">
                <i class="fas fa-hand-holding-usd fa-3x text-light mb-3"></i>
                <h3 class="text-light text-center">BAIXO CUSTO</h3>
                <h5 class="text-light justific">Menos de R$30,00 por dia para fazer sua empresa decolar!</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center">
                <i class="fas fa-check-square fa-3x text-light mb-3"></i>
                <h3 class="text-light text-center">GARANTIA DE SUCESSO</h3>
                <h5 class="text-light justific">Se não obter cotações, devolvemos seu dinheiro. O risco é ZERO!</h5>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center">
                <i class="fas fa-user-friends fa-3x text-light mb-3"></i>
                <h3 class="text-light text-center">QUANTIDADE E QUALIDADE</h3>
                <h5 class="text-light justific">Especialistas de logística dedicados no sucesso das suas cotações!</h5>

            </div>
        </div>
    </div>
</section>

<section id="price" class="price-list py-5">
    <div class="container">
        <div class="row m-0 p-0 pt-3 justify-content-center">
            <div class="col-12 text-center">
                <h2>Planos Personalizados</h2>
            </div>
        </div>
        <div class="row m-0 p-0 pt-3 justify-content-center">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0">
                <div class="py-3 plano-person" style="">
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-4" style="background-color:#000000;">&nbsp;</div>
                        <div class="col-4" style="background-color:#fac312;">&nbsp;</div>
                        <div class="col-4" style="background-color:#000000;">&nbsp;</div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 my-3 text-light">
                            <h5 class="text-center">Mensal</h5>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3 text-light">
                            <h6 class="text-center">de: R$1997,00</h6>
                            <h1 class="text-center">por: R$887,00</h1>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12">
                            <hr style="border:2px solid #fac312; width:50%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3">
                            <input type="button" class="btn bg-light text-dark mx-auto d-block" value="COMPRAR">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0">
                <div class="" style="">
                    <div class="row m-0 p-0 justify-content-center" style="background-color: #000000;">
                        <div class="col-4" style="background-color:#fac312;">&nbsp;</div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 my-3 text-light">
                            <h5 class="text-center">Semestral</h5>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3 text-light">
                            <h1 class="text-center">R$799,00 <span style="font-size: 15px;">(6x)</span></h1>
                            <h6 class="text-center">Total: R$4794,00</h6>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12">
                            <hr style="border:2px solid #fac312; width:50%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0 py-4" style="background-color: #000000;">
                        <div class="col-12 mb-3">
                            <input type="button" class="btn bg-light text-dark mx-auto d-block" value="COMPRAR">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0">
                <div class="py-3" style="">
                    <div class="row m-0 p-0 justify-content-center" style="background-color: #000000;">
                        <div class="col-4" style="background-color:#fac312;">&nbsp;</div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 my-3 text-light">
                            <h5 class="text-center">Anual</h5>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3 text-light">
                            <h1 class="text-center">R$679,00 <span style="font-size: 15px;">(12x)</span></h1>
                            <h6 class="text-center">Total: R$8148,00</h6>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12">
                            <hr style="border:2px solid #fac312; width:50%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3">
                            <input type="button" class="btn bg-light text-dark mx-auto d-block" value="COMPRAR">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-4" style="border:1px solid #000000; width: 90%">

    <div class="container">
        <div class="row m-0 p-0 pt-3 justify-content-center">
            <div class="col-12 text-center">
                <h2>Planos Básicos</h2>
            </div>
        </div>
        <div class="row m-0 p-0 pt-3 justify-content-center">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0">
                <div class="py-3 plano-person" style="">
                    <div class="row m-0 p-0 justify-content-center">
                        <div class="col-4" style="background-color:#000000;">&nbsp;</div>
                        <div class="col-4" style="background-color:#fac312;">&nbsp;</div>
                        <div class="col-4" style="background-color:#000000;">&nbsp;</div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 my-3 text-light">
                            <h5 class="text-center">Mensal</h5>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3 text-light">
                            <h6 class="text-center">de: R$1135,00</h6>
                            <h1 class="text-center">por: R$499,00</h1>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12">
                            <hr style="border:2px solid #fac312; width:50%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3">
                            <input type="button" class="btn bg-light text-dark mx-auto d-block" value="COMPRAR">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0">
                <div class="" style="">
                    <div class="row m-0 p-0 justify-content-center" style="background-color: #000000;">
                        <div class="col-4" style="background-color:#fac312;">&nbsp;</div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 my-3 text-light">
                            <h5 class="text-center">Semestral</h5>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3 text-light">
                            <h1 class="text-center">R$419,00 <span style="font-size: 15px;">(6x)</span></h1>
                            <h6 class="text-center">Total: R$2514,00</h6>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12">
                            <hr style="border:2px solid #fac312; width:50%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0 py-4" style="background-color: #000000;">
                        <div class="col-12 mb-3">
                            <input type="button" class="btn bg-light text-dark mx-auto d-block" value="COMPRAR">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0">
                <div class="py-3" style="">
                    <div class="row m-0 p-0 justify-content-center" style="background-color: #000000;">
                        <div class="col-4" style="background-color:#fac312;">&nbsp;</div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 my-3 text-light">
                            <h5 class="text-center">Anual</h5>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3 text-light">
                            <h1 class="text-center">R$359,00 <span style="font-size: 15px;">(12x)</span></h1>
                            <h6 class="text-center">Total: R$4308,00</h6>
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12">
                            <hr style="border:2px solid #fac312; width:50%;">
                        </div>
                    </div>
                    <div class="row m-0 p-0" style="background-color: #000000;">
                        <div class="col-12 mb-3">
                            <input type="button" class="btn bg-light text-dark mx-auto d-block" value="COMPRAR">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
<!-- Footer -->
<footer id="footer" class="footer pb-3" style="background-color: #363636;">
    <!--    <ul class="list-inline mb-5">
            <li class="list-inline-item">
                <a class="social-link bg-dark rounded-circle text-white mr-3" href="#">
                    <i class="icon-social-facebook"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="social-link bg-light text-dark border rounded-circle mr-3" href="#">
                    <i class="icon-social-instagram"></i>
                </a>
            </li>
                                <li class="list-inline-item">
                                    <a class="social-link bg-dark rounded-circle text-white" href="#">
                                        <i class="icon-social-github"></i>
                                    </a>
                                </li>
        </ul>-->
    <div class="container">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="row m-0 p-0">
                    <div class="col-11">
                        <h2 class="text-light">ENDEREÇO</h2>
                    </div>
                </div>
                <div style="border-left: 5px solid #fac312">
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
                <ul class="" style="border-left: 5px solid #fac312">
                    <li class="mt-3">
                        <a class="text-white mr-3 neosans" href="#home">Home</a>
                    </li>
                    <li class="mt-3">
                        <a class="text-white mr-3 neosans" href="#about">Sobre Nós</a>
                    </li>
                    <li class="mt-3">
                        <a class="text-white mr-3 neosans" href="#services">Serviço</a>
                    </li>
                    <li class="mt-3">
                        <a class="text-white mr-3 neosans" href="#difer">Diferenciais</a>
                    </li>
                    <li class="mt-3">
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
                    <div style="border-left: 5px solid #fac312">
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
                            <input type="submit" class="col-12 btn text-dark px-3" style="background-color: #fac312" value="ENVIAR">
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
