<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<section id="" class="p-4"> <!-- Início Seção Listar Níveis de Acesso -->  
    <div class="container">
        <?php
        if ($this->dados['botao']['cadNivelAcesso']) {
            ?>
            <a href="<?php echo URLADM . 'cadastrar-nivel-acesso/cadastrar-nivel-acesso'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-success btn-sm">
                        Cadastrar
                    </button>
                </div>
            </a>
            <?php
        }
        ?>

        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>LISTAR NÍVEIS DE ACESSO</b></h5>


            <!--<h5 class="p-2">Olá, você não criou nenhuma denúncia ainda!</h5><p><p>-->


        <div class="table table-responsive text-center">   

            <?php
            if (empty($this->dados['listarNiveisAcesso'])) {
                //var_dump($this->dados);
                ?>
<!--
                <div class="alert alert-danger" role="alert">
                    Nenhum nível de acesso encontrado!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               -->

                <?php
            }
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>

            <table class="table table-bordered"> <!-- Início Tabela de Listar Usuários -->
                <thead>                                                    
                <th colspan="6" class="bg-success text-white">Quadro de Níveis de Acesso</th>
                <tr>                           
                    <th>Id</th>
                    <th>Nome</th>
                    <th class="d-sm-table-cell">Ordem</th>
                    <th class="d-sm-table-cell text-center">Ações</th>
                </tr>
                </thead>
                <tbody>

                    <?php
                    $qnt_linhas_exe = 1;
                    foreach ($this->dados['listarNiveisAcesso'] as $niveisAcesso) {
                        extract($niveisAcesso);
                        ?>
                        <tr>
                            <th class="text-success"><?php echo $id; ?></th>
                            <td><?php echo $nome; ?></td>  
                            <td class="d-none d-sm-table-cell"><?php echo $ordem; ?></td>

                            <td class="align-center">
                                <span class="d-none d-md-block">

                                    <?php
                                    if ($qnt_linhas_exe <= 2) {
                                        if ($this->dados['botao']['altOrdemNivelAcesso']) {
                                            echo "<button class='btn btn-outline-secondary btn-sm disabled'><i class='fas fa-angle-double-up'></i></button>&nbsp;";
                                        }
                                    } else {
                                        if ($this->dados['botao']['altOrdemNivelAcesso']) {
                                            echo "<a href='" . URLADM . "alterar-ordem-nivel-acesso/alterar-ordem-nivel-acesso/$id' class='btn btn-secondary btn-sm'><i class='fas fa-angle-double-up'></i></a>&nbsp;";
                                        }
                                    }
                                    $qnt_linhas_exe++;

                                    if ($this->dados['botao']['visNivelAcesso']) {
                                        echo "<a href='" . URLADM . "consultar-nivel-acesso/consultar-nivel-acesso/$id' class='btn btn-primary btn-sm'>Consultar</a>&nbsp;";
                                    }
                                    if ($this->dados['botao']['altNivelAcesso']) {
                                        echo "<a href='" . URLADM . "alterar-nivel-acesso/alterar-nivel-acesso/$id' class='btn btn-warning btn-sm'>Alterar</a>&nbsp;";
                                    }

                                    if ($this->dados['botao']['delNivelAcesso']) {
                                        echo "<a href='" . URLADM . "apagar-nivel-acesso/apagar-nivel-acesso/$id' class='btn btn-danger btn-sm' data-confirm='Tem certeza que deseja apagar o nível de acesso selecionado?'>Apagar</a>";
                                    }
                                    ?>

                                </span>

                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                                        <?php
                                        if ($this->dados['botao']['visNivelAcesso']) {
                                            echo "<a class='dropdown-item btn-sm' href='" . URLADM . "consultar-nivel-acesso/consultar-nivel-acesso/$id'>Consultar</a>";
                                        }
                                        if ($this->dados['botao']['altNivelAcesso']) {
                                            echo "<a class='dropdown-item btn-sm' href='" . URLADM . "alterar-nivel-acesso/alterar-nivel-acesso/$id'>Alterar</a>";
                                        }
                                        if ($this->dados['botao']['delNivelAcesso']) {
                                            echo "<a class='dropdown-item btn-sm' data-toggle='modal' data-target='#confirm-delete-nivac' href='" . URLADM . "apagar-nivel-acesso/apagar-nivel-acesso/$id'>Apagar</a>";
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




</section><!-- Final Seção Listar Níveis de Acesso -->


</div>
</div>
</div>
</div> <!-- Final Listar Níveis de Acesso -->
</div>








