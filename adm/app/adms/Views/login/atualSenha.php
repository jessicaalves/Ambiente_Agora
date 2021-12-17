
<section class="alinhamento">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo URLADM . '/assets/img/imagensSistema/img30.png'; ?>" class="img-fluid pt-3 pb-3" alt="Responsive image">
            </div>
            <div class="col-md-6 d-flex">
                <div class="align-self-center">
                    <h5 class="estilo-font pl-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>ATUALIZAR A SENHA</b></h5>
                    <p class="estilo-font tamanho-text pl-1" style="letter-spacing: 0.5px;">Você solicitou uma alteração de senha, informe uma nova senha para atualizar a senha anterior.</p>

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
                            <label for="senha" class="col-sm-2 col-form-label tamanho-text c-email-resp">Senha&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-text c-campo-email-resp" name="senha" type="password" required="required" placeholder="Digite a senha">
                            </div>
                            <input class="btn btn-success bto-enviar-c" type="submit" name="AtualSenha" value="Atualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

