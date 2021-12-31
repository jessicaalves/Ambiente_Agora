<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li><a href="<?php echo URL . 'user/minha-conta/acesso-minha-Conta'; ?>"> Minha Conta</a></li>  
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

    <section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
        <div class="container">

            <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>LISTAR DENÚNCIAS</b></h5>

            <!--<h5 class="p-2">Olá, você não criou nenhuma denúncia ainda!</h5><p><p>-->


            <div class="table table-responsive text-center">   

                <?php
                if (empty($this->dados['denunciasRealizadas'])) {
                    //var_dump($this->dados);
                    ?>

                    <div class="alert alert-danger" role="alert">
                        Nenhuma denúncia encontrada!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                }

                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

                <table class="table table-bordered"> <!-- Início Tabela de Denúncias Realizadas -->
                    <thead>                                                    
                    <th colspan="6" class="bg-success text-white">Quadro de Denúncias</th>
                    <tr>                           
                        <th>Id</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th class="d-lg-table-cell">Status de Avaliação</th>
                        <th class="d-sm-table-cell">Ações</th>
                    </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($this->dados['denunciasRealizadas'] as $denuncias) {
                            extract($denuncias);
                            ?>

                            <tr>
                                <th class="text-success"><?php echo $id; ?></th>
                                <td><?php echo $titulo; ?></td>
                                <td><?php echo $tipo; ?></td>
                                <td class="d-none d-lg-table-cell">
                                    <a href="" class="badge badge-<?php echo $nome_cor; ?>"><?php echo $nome_status; ?></a>
                                </td>

                                <td class="align-center d-sm-table-cell">
                                    <a href="<?php echo URL . 'user/visualizar-dados-denuncia/visualizar-dados-denuncia/' . $id; ?>" class="btn btn-primary btn-sm">Visualizar</a>
                                    <a href="<?php echo URL . 'user/visualizar-avaliacao-denuncia/visualizar-avaliacao-denuncia/' . $id; ?>" class="btn btn-success btn-sm">Consultar Avaliação </a>
                                </td>
                                
                            </tr>

                        </tbody>

                        <?php
                    }
                    ?>

                </table><!-- Final Tabela de Denúncias Realizadas -->

                <?php
                echo $this->dados['paginacao'];
                ?>

            </div>
        </div>
    </section><!-- Final Seção Denúncias Realizadas -->


</div>

