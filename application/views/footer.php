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
            <div style="border-left: 5px solid #b21e1e">
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
            <ul class="" style="border-left: 5px solid #b21e1e">
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
                <div style="border-left: 5px solid #b21e1e">
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
            <input type="submit" class="col-12 btn text-white px-3" style="background-color: #b21e1e" value="ENVIAR">
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
<script src="js/util.js"></script>
</body>
</html>
