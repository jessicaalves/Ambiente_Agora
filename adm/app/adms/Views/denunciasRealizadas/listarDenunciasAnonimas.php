<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}

//var_dump($this->dados['botao']);
?>

<section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
    <div class="container">


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>LISTAR DENÚNCIAS ANÔNIMAS</b></h5>


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

            <table class="table table-bordered"> <!-- Início Tabela de Listar Usuários -->
                <thead>                                                    
                <th colspan="6" class="bg-success text-white">Quadro de Denúncias Anônimas</th>
                <tr>                           
                    <th>Id</th>
                    <th>Título</th>
                    <th class="d-sm-table-cell">Tipo</th>
                    <th>Status</th>
                    <th class="d-sm-table-cell text-center">Ações</th>
                </tr>
                </thead>

                <tbody>

                    <?php
                    foreach ($this->dados['denunciasRealizadas'] as $denuncias) {
                        extract($denuncias);
                        ?>

                        <tr>
                            <th class="text-success"><?php echo $id; ?></th>
                            <td><?php echo $id; ?></td>                                  
                            <td><?php echo $tipo; ?></td>  
                            <td class="d-none d-lg-table-cell">
                                <a href="<?php echo URLADM . 'avaliar-denuncia-anonima/avaliar-denuncia-anonima/' . $id; ?>" class="badge badge-<?php echo $nome_cor; ?>"><?php echo $nome_status; ?></a>
                            </td>

                            <td class="align-center">
                                <span class="d-none d-md-block">

                                    <?php
                                    if ($this->dados['botao']['visDenuncia']) {
                                        echo "<a href='" . URLADM . "visualizar-denuncia-anonima/visualizar-denuncia-anonima/$id' class='btn btn-outline-primary btn-sm'>Visualizar</a>&nbsp;";
                                    }
                                    if ($this->dados['botao']['altAvaliacaoDenuncia']) {
                                        echo "<a href='" . URLADM . "avaliar-denuncia-anonima/avaliar-denuncia-anonima/$id' class='btn btn-outline-warning btn-sm'>Alterar</a>&nbsp;";
                                    }
                                    ?>

                                </span>

                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                                        <?php
                                        if ($this->dados['botao']['visDenuncia']) {
                                            echo "<a class='dropdown-item' href='" . URLADM . "visualizar-denuncia-anonima/visualizar-denuncia-anonima/$id'>Visualizar</a>";
                                        }
                                        if ($this->dados['botao']['altAvaliacaoDenuncia']) {
                                            echo "<a class='dropdown-item' href='" . URLADM . "avaliar-denuncia-anonima/avaliar-denuncia-anonima/$id'>Alterar</a>";
                                        }
                                        ?>

                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>

                    <?php
                }
                ?>

            </table><!-- Final Tabela de Listar Usuários -->

            <?php
            echo $this->dados['paginacao'];
            ?>

        </div>
    </div>




</section><!-- Final Seção Denúncias Realizadas -->


</div>
</div>
</div>
</div> <!-- Final Listar Usuários -->
</div>










