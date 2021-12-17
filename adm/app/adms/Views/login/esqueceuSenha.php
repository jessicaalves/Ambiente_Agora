
<section class="alinhamento">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo URLADM . '/assets/img/imagensSistema/img30.png'; ?>" class="img-fluid pt-3 pb-3" alt="Responsive image">
            </div>
            <div class="col-md-6 d-flex">
                <div class="align-self-center">
                    <h5 class="estilo-font pl-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i><b> ESQUECEU SUA SENHA?</b></h5>
                    <p class="estilo-font tamanho-text pl-1" style="letter-spacing: 0.5px;">Informe seu endereço de e-mail já cadastrado anteriormente para gerar uma nova senha.</p>

                    <form method="POST">

                        <?php
                        //var_dump($this->dados['form']);
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        if (isset($this->dados['form'])) {
                            $valorForm = $this->dados['form'];
                        }
                        ?>

                        <div class="form-group row mr-6"> 
                            <label for="email" class="col-sm-2 col-form-label tamanho-text c-email-resp">E-mail&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-text c-campo-email-resp" name="email" type="text" id="email" required="required" placeholder="Digite o seu e-mail"
                                       value="<?php
                                       if (isset($valorForm['email'])) {
                                           echo $valorForm['email'];
                                       }
                                       ?>"
                                       >
                            </div>

                            <button class="btn btn-success bto-enviar-c" type="submit" name="RecupUserLogin" value="enviar">Enviar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

