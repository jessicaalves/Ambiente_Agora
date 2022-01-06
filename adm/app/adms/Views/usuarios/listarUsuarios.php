<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}

//var_dump($this->dados['botao']);
?>

<section id="" class="p-4"> <!-- Início Seção Denúncias Realizadas -->  
    <div class="container">
        <?php
        if ($this->dados['botao']['cadUsuario']) {
            ?>
            <a href="<?php echo URLADM . 'cadastrar-usuario/cadastrar-usuario'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-success btn-sm">
                        Cadastrar
                    </button>
                </div>
            </a>
            <?php
        }
        ?>

        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>LISTAR ADMINISTRADORES</b></h5>

        
        <form class="form-inline" method="POST" action="<?php echo URLADM . 'pesquisar-usuario/listar-usuario'; ?>">
            <div class="form-group">
                <label>Nome</label>
                <input name="nome" type="text" id="nome" class="form-control form-control-sm mx-sm-3" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input name="email" type="text" id="email" class="form-control form-control-sm mx-sm-3" placeholder="Digite o e-mail">
            </div>
            <input name="PesqAdministrador" type="submit" class="btn btn-secondary my-2 btn-sm" value="Pesquisar">
        </form><hr>
        

        <div class="table table-responsive text-center">   

            <?php
            if (empty($this->dados['listarUsuarios'])) {
                //var_dump($this->dados);
                ?>

                <div class="alert alert-danger" role="alert">
                    Nenhum usuário encontrado!
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
                <th colspan="6" class="bg-success text-white">Quadro de Administradores</th>
                <tr>                           
                    <th>Id</th>
                    <th>Nome</th>
                    <th class="d-sm-table-cell">E-mail</th>
                    <th>Situação</th>
                    <th>Nível de Acesso</th>
                    <th class="d-sm-table-cell text-center">Ações</th>
                </tr>
                </thead>

                <tbody>

                    <?php
                    foreach ($this->dados['listarUsuarios'] as $usuarios) {
                        extract($usuarios);
                        ?>

                        <tr>
                            <th class="text-success"><?php echo $id; ?></th>
                            <td><?php echo $nome; ?></td>                                  
                            <td><?php echo $email; ?></td> 
                            <td class="d-none d-lg-table-cell">
                                <span class="badge badge-<?php echo $cor_cr; ?>"><?php echo $nome_sit; ?></span>
                            </td>
                            <td><?php echo $nome_nivac; ?></td> 

                            <td class="align-center">
                                <span class="d-none d-md-block">

                                    <?php
                                    if ($this->dados['botao']['visUsuario']) {
                                        echo "<a href='" . URLADM . "visualizar-usuario/visualizar-usuario/$id' class='btn btn-primary btn-sm'>Visualizar</a>&nbsp;";
                                    }
                                    if ($this->dados['botao']['altUsuario']) {
                                        echo "<a href='" . URLADM . "alterar-usuario/alterar-usuario/$id' class='btn btn-warning btn-sm'>Alterar</a>&nbsp;";
                                    }

                                    if ($this->dados['botao']['delUsuario']) {
                                        echo "<a href='" . URLADM . "apagar-usuario/apagar-usuario/$id' class='btn btn-danger btn-sm' data-confirm='Tem certeza que deseja apagar o usuário selecionado?'>Apagar</a>";
                                    }
                                    ?>

                                </span>

                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">

                                        <?php
                                        if ($this->dados['botao']['visUsuario']) {
                                            echo "<a class='dropdown-item' href='" . URLADM . "visualizar-usuario/visualizar-usuario/$id'>Visualizar</a>";
                                        }
                                        if ($this->dados['botao']['altUsuario']) {
                                            echo "<a class='dropdown-item' href='" . URLADM . "alterar-usuario/alterar-usuario/$id'>Alterar</a>";
                                        }
                                        if ($this->dados['botao']['delUsuario']) {
                                            echo "<a class='dropdown-item' data-toggle='modal' data-target='#confirm-delete' href='" . URLADM . "apagar-usuario/apagar-usuario/$id'>Apagar</a>";
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








