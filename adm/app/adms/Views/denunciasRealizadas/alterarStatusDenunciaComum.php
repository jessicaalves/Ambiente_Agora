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

        <?php
        if ($this->dados['botao']['listDenuncias']) {
            ?>

            <a href="<?php echo URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>
            <?php
        }
        ?>


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>ALTERAR STATUS DENÚNCIA COMUM</b></h5>

        <fieldset class="the-fieldset">    
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados Denúncia</h6>
                    </div>

                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <form class="p-2 form" method="POST" action=""> <!-- Início Formulário Alterar Dados Cadastrais -->

                        <h5 class="p-2 borda-conteudo" id="">Dados - Alterar Status Denúncia</h5><p><p>

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

                        <div class="form-group row alinhamento c-tipo-resp">
                            <label for="Status" class="col-sm-2 col-form-label tamanho-font alin-tip">Status&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <select class="form-control tamanho-font-tipo bg-white tamanho-font" name="sts_status_denuncia_id" type="select" id="sts_status_denuncia_id">
                                    <option value="">Selecione o status da denúncia</option>
                                    <?php
                                    foreach ($this->dados['select']['stat'] as $stat) {
                                        extract($stat);
                                        if ($valorForm['sts_status_denuncia_id'] == $id_stat) {
                                            echo "<option value='$id_stat' selected>$nome_stat</option>";
                                        } else {
                                            echo "<option value='$id_stat'>$nome_stat</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        



                        <div class="botao-atualizar"><button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm" type="submit" name="atualizarStatusDenuncia" value="atualizarStatusDenuncia">Atualizar</button></div> 

                        <?php
                        if ($this->dados['botao']['visDenuncia']) {
                            ?>
                            <div class="botao-visualizar">
                                <a href="<?php echo URLADM . 'visualizar-denuncia-comum/visualizar-denuncia-comum/' . $valorForm['id']; ?>" style="float:center; vertical-align:middle;" class="btn btn-outline-primary btn-sm">Visualizar</a>
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








