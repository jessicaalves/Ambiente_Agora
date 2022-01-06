<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}

//var_dump($this->dados['botao']);
?>

<section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
    <div class="container">


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>LISTAR DENÚNCIAS</b></h5>


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
                <th colspan="6" class="bg-success text-white">Quadro de Denúncias</th>
                <tr>                           
                    <th>Id</th>
                    <th>Título</th>
                    <th class="d-sm-table-cell">Tipo</th>
                    <th>Status de Avaliação</th>
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
                            <td><?php echo $titulo; ?></td>                                  
                            <td><?php echo $tipo; ?></td> 
                            <td class="d-none d-lg-table-cell">
                                <a href="" class="badge badge-<?php echo $nome_cor; ?>"><?php echo $nome_status; ?></a>
                            </td>

                            <td class="align-center">
                                <span class="d-none d-md-block">

                                    <?php
                                    if ($this->dados['botao']['visDenuncia']) {
                                        echo "<a href='" . URLADM . "consultar-denuncia/consultar-denuncia/$id' class='btn btn-primary btn-sm'>Consultar</a>&nbsp;";
                                    }
                                    if ($this->dados['botao']['altAvaliacaoDenuncia']) {
                                        echo "<a href='" . URLADM . "avaliar-denuncia/avaliar-denuncia/$id' class='btn btn-warning btn-sm'>Avaliar</a>&nbsp;";
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
                                            echo "<a class='dropdown-item' href='" . URLADM . "consultar-denuncia/consultar-denuncia/$id'>Consultar</a>";
                                        }
                                        if ($this->dados['botao']['altAvaliacaoDenuncia']) {
                                            echo "<a class='dropdown-item' href='" . URLADM . "avaliar-denuncia/avaliar-denuncia/$id'>Avaliar</a>";
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










