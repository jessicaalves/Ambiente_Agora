<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<section id="" class="p-4 alinhamento"> <!-- Início Seção Visualizar Cadastro -->
    <div class="container">

        <?php
        //if ($this->dados['botao']['listNivelAcesso']) {
            ?>
<!--            <a href="<?php echo URLADM . 'listar-niveis-acesso/listar-niveis-acesso'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>-->
            <?php
        //}
        ?>


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CONSULTAR NÍVEL DE ACESSO</b></h5>
        <fieldset class="the-fieldset">    
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados Cadastrais</h6>
                    </div>

                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <form class="p-2" class="form" action="" method="POST"> <!-- Início Formulário Alterar Usuário -->

                        <h5 class="p-2 borda-conteudo" id="">Dados Nível de Acesso</h5><p><p>

                            <?php
                            if (!empty($this->dados['dados_nivel_acesso'][0])) {
                                //var_dump($this->dados ['dados_usuario'][0]);
                                extract($this->dados ['dados_nivel_acesso'][0]);
                                ?>

                            <div class="form-group row alinhamento c-login-resp"> 
                                <label for="id" class="col-sm-2 tamanho-font">Id</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="id" type="text" id="id" placeholder="<?php echo $id; ?>"
                                           value="<?php
                                           if (isset($valorForm['id'])) {
                                               echo $valorForm['id'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-login-resp"> 
                                <label for="Nome" class="col-sm-2 tamanho-font">Nome</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="nome" type="text" id="usuario" placeholder="<?php echo $nome; ?>"
                                           value="<?php
                                           if (isset($valorForm['nome'])) {
                                               echo $valorForm['nome'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-senha-resp ">
                                <label for="Ordem" class="col-sm-2 tamanho-font">Ordem</label> 
                                <div class="col-sm-8 t-c-campos"> 
                                    <input class="form-control tamanho-font bg-white" name="ordem" type="text" id="ordem" placeholder="<?php echo $ordem; ?>"
                                           value="<?php
                                           if (isset($valorForm['ordem'])) {
                                               echo $valorForm['ordem'];
                                           }
                                           ?>"
                                           readonly> 
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-senha-resp ">
                                <label for="Created" class="col-sm-2 tamanho-font">Inserido</label> 
                                <div class="col-sm-8 t-c-campos"> 
                                    <input class="form-control tamanho-font bg-white" name="created" type="text" id="created" placeholder="<?php echo $created; ?>"
                                           value="<?php
                                           if (isset($valorForm['created'])) {
                                               echo $valorForm['created'];
                                           }
                                           ?>"
                                           readonly> 
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-senha-resp ">
                                <label for="Modified" class="col-sm-2 tamanho-font">Alterado</label> 
                                <div class="col-sm-8 t-c-campos"> 
                                    <input class="form-control tamanho-font bg-white" name="modified" type="text" id="modified" placeholder="<?php echo $modified; ?>"
                                           value="<?php
                                           if (isset($valorForm['modified'])) {
                                               echo $valorForm['modified'];
                                           }
                                           ?>"
                                           readonly> 
                                </div>
                            </div>


                            <?php
                        }
                        ?>

<!--                        <div class="botao-atualizar"><a href="<?php echo URLADM . 'alterar-nivel-acesso/alterar-nivel-acesso/' . $id; ?>" class="btn btn-success btn-sm">Alterar</a></div>-->


                    </form> <!-- Final Formulário Alterar Dados Cadastrais -->
                </div>
            </div>
        </fieldset>  
    </div>
</section><!-- Final Seção Visualizar Cadastro -->
</div>





