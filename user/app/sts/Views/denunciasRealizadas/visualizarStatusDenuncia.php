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

            <a href="<?php echo URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>

            <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>VISUALIZAR STATUS DA DENÚNCIA</b></h5>
            <fieldset class="the-fieldset">
                <div class="row">
                    <div class="col-md-12">
                        <div class="borda-sup">
                            <h6 class="ml-2 pt-1">Linha do Tempo</h6>
                        </div>

                        <form class="p-2" class="form" method="POST" id="formDenunciaComum" enctype="multipart/form-data"> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                            <h5 class="p-2 margem-titulo borda-conteudo" id="">Detalhes da Denúncia</h5><p><p>

                                <?php
                                if (!empty($this->dados['dados_denuncia'][0])) {
                                    //var_dump($this->dados ['dados_denuncia'][0]);
                                    extract($this->dados ['dados_denuncia'][0]);
                                    ?>

                                <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="created" class="col-sm-2 col-form-label tamanho-font alin-tip"> <?php echo $created; ?>&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control-plaintext tamanho-font bg-white" name="created" type="text" id="created" placeholder="<?php echo $descricao_status; ?>"
                                               value="<?php
                                               if (isset($valorForm['created'])) {
                                                   echo $valorForm['created'];
                                               }
                                               ?>"
                                               readonly>
                                    </div>
                                </div>
                            
                            <div class="form-group row alinhamento c-tipo-resp">
                                    <label for="modified" class="col-sm-2 col-form-label tamanho-font alin-tip"> <?php echo $modified; ?>&nbsp;&nbsp;</label> 
                                    <div class="col-sm-8">
                                        <input class="form-control-plaintext tamanho-font bg-white" name="modified" type="text" id="modified" placeholder="..."
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



                            <!--<div class="pt-3 botao-denunciar b-denunciar"><button name="cadastrarDenunciaComum" type="submit" value="Denunciar" class="btn btn-outline-success alin-de">Denunciar</button></div>-->

                        </form> <!-- Final Formulário Visualizar Dados da Denúncia Comum -->

                    </div>
                </div>
            </fieldset>
        </div>



    </section><!-- Final Seção Nova Denúncia Comum -->
</div>





