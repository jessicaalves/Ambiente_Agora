<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<?php
if (isset($this->dados['form'])) {
    $valorForm = $this->dados['form'];
}
if (isset($this->dados['form'][0])) {
    $valorForm = $this->dados['form'][0];
}

//var_dump($this->dados['select']);
?>


<section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
    <div class="container">

        <a href="<?php echo URLADM . 'listar-niveis-acesso/listar-niveis-acesso'; ?>">
            <div class="p-2">
                <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                    Listar
                </button>
            </div>
        </a>


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>ALTERAR NÍVEL DE ACESSO</b></h5>

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

                    <form class="p-2 form" method="POST" action=""> <!-- Início Formulário Alterar Dados Cadastrais -->

                        <h5 class="p-2 borda-conteudo" id="">Dados - Alterar Nível de Acesso</h5><p><p>

                        <div class="form-group row alinhamento c-login-resp"> 
                            <label for="Id" class="col-sm-2 tamanho-font">Id&nbsp;</label>
                            <div class="col-sm-8 t-c-campos">
                                <input class="form-control tamanho-font bg-white" name="id" type="text" id="id" placeholder="<?php $id; ?>"
                                       value="<?php
                                       if (isset($valorForm['id'])) {
                                           echo $valorForm['id'];
                                       }
                                       ?>"
                                       readonly>
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-login-resp"> 
                            <label for="Nome" class="col-sm-2 tamanho-font">Nome&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label>
                            <div class="col-sm-8 t-c-campos">
                                <input class="form-control tamanho-font" name="nome" type="text" id="nome" placeholder="Digite o nome do nível de acesso"
                                       value="<?php
                                       if (isset($valorForm['nome'])) {
                                           echo $valorForm['nome'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>


                        <div class="form-group row alinhamento c-senha-resp ">
                            <label for="Ordem" class="col-sm-2 tamanho-font">Ordem&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8 t-c-campos"> 
                                <input class="form-control tamanho-font" name="ordem" type="text" id="ordem" placeholder="Digite a ordem do nível de acesso"
                                       value="<?php
                                       if (isset($valorForm['ordem'])) {
                                           echo $valorForm['ordem'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>



                        <div class="botao-atualizar"><button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm" type="submit" name="atualizarNivelAcesso" value="atualizarNivelAcesso">Atualizar</button></div> 

                        <?php
                        if ($this->dados['botao']['visNivelAcesso']) {
                            ?>
                            <div class="botao-visualizar">
                                <a href="<?php echo URLADM . 'visualizar-nivel-acesso/visualizar-nivel-acesso/' . $valorForm['id']; ?>" style="float:center; vertical-align:middle;" class="btn btn-outline-primary btn-sm">Visualizar</a>
                            </div>
                            <?php
                        }
                        ?>

                    </form> <!-- Final Formulário Alterar Dados Cadastrais -->
                </div>
            </div>
        </fieldset>




    </div>




</section><!-- Final Seção Denúncias Realizadas -->


</div>
</div>
</div>
</div> <!-- Final Listar Usuários -->
</div>








