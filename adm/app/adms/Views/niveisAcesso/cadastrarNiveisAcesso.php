<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
    <div class="container">
        <?php
        if ($this->dados['botao']['listNivelAcesso']) {
            ?>
            <a href="<?php echo URLADM . 'listar-niveis-acesso/listar-niveis-acesso'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>
            <?php
        }
        ?>


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CADASTRAR NÍVEL DE ACESSO</b></h5>


        <fieldset class="the-fieldset">    
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados Cadastrais</h6>
                    </div>

                    <form class="p-2" method="POST" action=""> <!-- Início Formulário Cadastro -->

                        <h5 class="p-2 borda-conteudo" id="">Dados - Nível de Acesso</h5><p><p>

                            <?php
                            //var_dump (isset($this->dados['form']));
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            if (isset($this->dados['form'])) {
                                $valorForm = $this->dados['form'];
                            }
                            ?>

                        <div class="form-group row alinhamento c-nome-resp"> 
                            <label for="nome" class="col-sm-2 tamanho-font a-alinhar">Nome&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="nome" type="text" id="nome" placeholder="Digite o nome do nível de acesso" 
                                       value="<?php
                                       if (isset($valorForm['nome'])) {
                                           echo $valorForm['nome'];
                                       }
                                       ?>">
                            </div>
                        </div>

                        <div class="botao-atualizar b-cadastrar"><button type="submit" name="cadastrarNivelAcesso" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button></div>
                    </form> <!-- Final Formulário Cadastro -->
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










