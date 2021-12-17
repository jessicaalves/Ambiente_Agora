<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li><a href="<?php echo URL . 'user/minha-conta/acesso-minha-conta'; ?>"> Minha Conta</a></li>   
            <li><a href="<?php echo URL . 'user/denuncia-comum/cadastrar-denuncia-comum'; ?>"> Nova Denúncia</a></li>

            <li>
                <a href="#submenu1" data-toggle="collapse"> Denúncias Realizadas
                </a>

                <ul class="list-unstyled collapse" id="submenu1">
                    <li class="active"><a href="<?php echo URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas'; ?>"> <i class="fas fa-seedling text-warning"></i> Listar Denúncias</a></li>  
                </ul>
            </li>

            <li>
                <a href="#submenu2" data-toggle="collapse"> Dados Cadastrais
                </a>

                <ul class="list-unstyled collapse" id="submenu2">
                    <li><a href="<?php echo URL . 'user/visualizar-dados-cadastrais/visualizar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Visualizar Dados</a></li>  
                    <li><a href="<?php echo URL . 'user/alterar-dados-cadastrais/alterar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Alterar Dados</a></li>  
                </ul>
            </li>

            <li><a href="<?php echo URL . 'user/login/logout'; ?>"> Sair</a></li>
        </ul>
    </nav>

    <section id="" class="p-4 alinhamento"> <!-- Início Seção Nova Denúncia Comum -->
        <div class="container">

            <?php
            if (!empty($this->dados['dados_denuncia'][0])) {
                //var_dump($this->dados ['dados_denuncia'][0]);
                extract($this->dados ['dados_denuncia'][0]);
                ?>

<!--                <a href="<?php echo URL . 'user/visualizar-dados-denuncia/visualizar-dados-denuncia/' . $id ?>">
                    <div class="p-2">
                        <button style="float:right; vertical-align:middle;" class="btn btn-primary btn-sm">
                            Visualizar
                        </button>
                    </div>
                </a>-->

                <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>VISUALIZAR AVALIAÇÃO DA DENÚNCIA</b></h5>
                <fieldset class="the-fieldset">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="borda-sup">
                                <h6 class="ml-2 pt-1">Linha do Tempo</h6>
                            </div>

                            <form class="p-2" class="form" method="POST" id="formDenunciaComum" enctype="multipart/form-data"> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                                <h5 class="p-2 margem-titulo borda-conteudo" id="">Detalhes de Avaliação da Denúncia</h5><p><p>



                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="id" class="col-sm-2 col-form-label tamanho-font alin-tip"> Id&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control-plaintext tamanho-font bg-white" name="id" type="text" id="created" placeholder="<?php echo $id; ?>"
                                               value="<?php
                                               if (isset($valorForm['id'])) {
                                                   echo $valorForm['id'];
                                               }
                                               ?>"
                                               readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="status" class="col-sm-2 col-form-label tamanho-font alin-tip"> Status&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control-plaintext tamanho-font bg-white" name="status" type="text" id="modified" placeholder="<?php echo $nome_status; ?>"
                                               value="<?php
                                               if (isset($valorForm['nome_status'])) {
                                                   echo $valorForm['nome_status'];
                                               }
                                               ?>"
                                               readonly>
                                    </div>
                                </div>

                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="descricao" class="col-sm-2 col-form-label tamanho-font alin-tip"> Descrição&nbsp;&nbsp;</label> 
                                    <div class="col-sm-9">
                                        <input class="form-control-plaintext tamanho-font bg-white" name="descricao" type="text" id="modified" placeholder="<?php echo $descricao_status; ?>"
                                               value="<?php
                                               if (isset($valorForm['descricao_status'])) {
                                                   echo $valorForm['descricao_status'];
                                               }
                                               ?>"
                                               readonly>
                                    </div>
                                </div>


                                <?php
                            }
                            ?>



                            <!--<div class="pt-3 botao-denunciar b-denunciar"><button name="cadastrarDenunciaComum" type="submit" value="Denunciar" class="btn btn-outline-success alin-de">Denunciar</button></div>-->

                        </form> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                    </div>
                </div>
            </fieldset>
        </div>



    </section><!-- Final Seção Nova Denúncia Comum -->
</div>





