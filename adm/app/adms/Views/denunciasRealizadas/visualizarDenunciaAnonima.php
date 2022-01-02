<div class="d-flex">

    <section id="" class="p-4 alinhamento"> <!-- Início Seção Nova Denúncia Comum -->
        <div class="container">

<!--            <a href="<?php echo URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>-->

            <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>VISUALIZAR DENÚNCIA ANÔNIMA</b></h5>
            <fieldset class="the-fieldset">
                <div class="row">
                    <div class="col-md-12">
                        <div class="borda-sup">
                            <h6 class="ml-2 pt-1">Dados da Denúncia</h6>
                        </div>

                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>

                        <form class="p-2" class="form" method="POST" id="formDenunciaComum" enctype="multipart/form-data"> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                            <h5 class="p-2 margem-titulo borda-conteudo" id="">Dados Cadastrais - Denúncia Anônima</h5><p><p>

                                <?php
                                if (!empty($this->dados['dados_denuncia'][0])) {
                                    //var_dump($this->dados ['dados_denuncia'][0]);
                                    extract($this->dados ['dados_denuncia'][0]);
                                    ?>

                                <div class="form-group row alinhamento c-email-resp"> 
                                    <label for="status" class="col-sm-2  tamanho-font">Status&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8 t-c-campos">
                                        <input class="form-control tamanho-font bg-white" name="status" type="text" id="status" placeholder="<?php echo $nome_status; ?>"
                                               value="<?php
                                               if (isset($valorForm['sts_status_denuncia_id'])) {
                                                   echo $valorForm['sts_status_denuncia_id'];
                                               }
                                               ?>"
                                               readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-titulo-resp"> 
                                    <label for="Titulo" class="col-sm-2 col-form-label tamanho-font alin-tit">Título&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="titulo" type="text" id="titulo" placeholder="<?php echo $titulo; ?>"
                                               value="<?php
                                               if (isset($valorForm['titulo'])) {
                                                   echo $valorForm['titulo'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="Tipo" class="col-sm-2 col-form-label tamanho-font alin-tip">Tipo&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8">
                                        <select class="form-control tamanho-font-tipo bg-white" name="tipo" type="select" id="Tipo"
                                                value="<?php
                                                if (isset($valorForm['tipo'])) {
                                                    echo $valorForm['tipo'];
                                                }
                                                ?>">
                                            <option selected><?php echo $tipo; ?></option>
                                            <!--                                            <option value="Fauna">Fauna</option>
                                                                                        <option value="Flora">Flora</option>
                                                                                        <option value="Poluição e Outros Crimes Ambientais">Poluição e Outros Crimes Ambientais</option>
                                                                                        <option value="Ordenamento Urbano e Patrimônio Cultural">Ordenamento Urbano e Patrimônio Cultural</option>
                                                                                        <option value="Administração Ambiental">Administração Ambiental</option>-->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-descricao-resp"> 
                                    <label for="Descricao" class="col-sm-2 col-form-label tamanho-font alinhar">Descrição&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8">
                                        <textarea readonly class="form-control tamanho-font tamanho-descricao bg-white" name="descricao" type="text" id="descricao" placeholder="<?php echo $descricao; ?>"><?php
                                            if (isset($valorForm['descricao'])) {
                                                echo $valorForm['descricao'];
                                            }
                                            ?></textarea>
                                    </div>
                                </div>   

                                <div class="form-group row alinhamento c-envolvido-resp">
                                    <label for="Envolvido" class="col-sm-2 col-form-label tamanho-font alinhar">Tipo/Envolvido&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                    <div class="col-sm-8">
                                        <select class="form-control tamanho-font-tipo tamanho bg-white" name="envolvido" type="select" id="Envolvido"
                                                value="<?php
                                                if (isset($valorForm['envolvido'])) {
                                                    echo $valorForm['envolvido'];
                                                }
                                                ?>">
                                            <option selected><?php echo $envolvido; ?></option>
                                            <!--                                            <option value="Pessoa Física">Pessoa Física</option>
                                                                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>-->
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group row alinhamento c-infrator-resp"> 
                                    <label for="NomeEnvolvido" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-nom">Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="nomeEnvolvido" type="text" id="nomeEnvolvido" placeholder="<?php echo $nome_envolvido; ?>"
                                               value="<?php
                                               if (isset($valorForm['nomeEnvolvido'])) {
                                                   echo $valorForm['nomeEnvolvido'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div> 

                                <div class="form-group row alinhamento c-funcao-infrator-resp"> 
                                    <label for="FuncaoEnvolvido" class="col-sm-2 col-form-label tamanho-font al-nome-funcao alin-fun">Função&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control tamanho-font bg-white" name="funcaoEnvolvido" type="text" id="funcaoEnvolvido" placeholder="<?php echo $funcao_envolvido; ?>"
                                               value="<?php
                                               if (isset($valorForm['funcaoEnvolvido'])) {
                                                   echo $valorForm['funcaoEnvolvido'];
                                               }
                                               ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-anexos-resp">
                                    <label for="imagem" class="col-sm-2 col-form-label tamanho-font alin-img">Imagem/Incidente&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label>
                                    <div class="col-sm-8 borda-imagem alin-img">
                                        <input class="tamanho-font padd-inserir-imagem" name="imagem" type="file" id="imagem" onchange="previewImagem();" onclick="return false;" >  


                                        <div class="col-sm-8 padd-img img-alinhamento">


                                            <?php
                                            if (!empty($imagem)) {
                                                echo "<img src='" . URL . "user/assets/img/uploadImagens/denunciaComum/" . $id . "/" . $imagem . "' witdh='135' height='135'>";
                                            } else {
                                                echo "<img src='" . URL . "user/assets/img/uploadImagens/preview_img.png" . "' witdh='135' height='135'>";
                                            }
                                            ?>

                                    <!--                                            <img src="" alt="Imagem da Denúncia" id="preview-img" class="img-thumbnail" style="width:135px; height:135px;">-->
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                            </div>

                           
<!--                            <div class="botao-atualizar"><a href="<?php echo URLADM . 'avaliar-denuncia-anonima/avaliar-denuncia-anonima/' . $id; ?>" class="btn btn-success btn-sm">Alterar</a></div>-->
                        
                        </form> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                    </div>
                </div>
            </fieldset>
        </div>
    </section><!-- Final Seção Nova Denúncia Comum -->
</div>
</div>
</div>
</div> <!-- Final Listar Níveis de Acesso -->
</div>





