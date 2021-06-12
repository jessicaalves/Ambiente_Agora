<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li><a href="<?php echo URL . 'user/minha conta/acessoMinhaConta'; ?>"><b>Minha Conta</b></a></li>  
            <li><a href="<?php echo URL . 'user/denuncia comum/cadastrarDenunciaComum'; ?>">Nova Denúncia</a></li>
            <li><a href="<?php echo URL . 'user/denuncias realizadas/visualizarDenunciasRealizadas'; ?>">Denúncias Realizadas</a></li>
            <li><a href="<?php echo URL . 'user/visualizar dados cadastrais/visualizarDadosCadastrais'; ?>">Dados Cadastrais</a></li>
            <li><a href="<?php echo URL . 'user/login/logout'; ?>">Sair</a></li>
        </ul>
    </nav>

    <section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
        <div class="container">

            <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>DENÚNCIAS REALIZADAS</b></h5>

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
                        <th class="d-lg-table-cell">Status</th>
                        <th class="d-sm-table-cell">Mais Dados da Denúncia</th>
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
                                <td class="d-lg-table-cell">Em Andamento</td>
                                <td class="align-center d-sm-table-cell"><a href="<?php echo URL . 'user/visualizar dados denuncia/visualizarDadosDenuncia/' . $id; ?>" class="text-body">Visualizar Dados </a><i class="far fa-eye text-success"></i></td>
                            </tr>

                        </tbody>

                        <?php
                    }
                    ?>

                </table><!-- Final Tabela de Denúncias Realizadas -->




            </div>
        </div>
    </section><!-- Final Seção Denúncias Realizadas -->


</div>

