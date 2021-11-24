<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<section id="" class="p-4 alinhamento"> <!-- Início Seção Visualizar Cadastro -->
    <div class="container">

        <a href="<?php echo URLADM . 'listar-usuarios/listar-usuarios'; ?>">
            <div class="p-2">
                <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                    Listar
                </button>
            </div>
        </a>

        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>VISUALIZAR USUÁRIO</b></h5>
        <fieldset class="the-fieldset">    
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados Cadastrais</h6>
                    </div>

                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <form class="p-2" class="form" action="" method="POST"> <!-- Início Formulário Alterar Usuário -->

                        <h5 class="p-2 borda-conteudo" id="">Dados de Acesso - Visualizar Usuário</h5><p><p>

                            <?php
                            if (!empty($this->dados['dados_usuario'][0])) {
                                //var_dump($this->dados ['dados_usuario'][0]);
                                extract($this->dados ['dados_usuario'][0]);
                                ?>

                            <div class="form-group row alinhamento c-login-resp"> 
                                <label for="id" class="col-sm-2 tamanho-font">Id</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="id" type="text" id="id" placeholder="<?php echo $id; ?>"
                                           value="<?php
                                           if (isset($valorForm['id'])) {
                                               echo $valorForm['id'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-login-resp"> 
                                <label for="Login" class="col-sm-2 tamanho-font">Login</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="login" type="text" id="usuario" placeholder="<?php echo $login; ?>"
                                           value="<?php
                                           if (isset($valorForm['login'])) {
                                               echo $valorForm['login'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-senha-resp ">
                                <label for="Senha" class="col-sm-2 tamanho-font">Senha</label> 
                                <div class="col-sm-8 t-c-campos"> 
                                    <input class="form-control tamanho-font bg-white" name="senha" type="password" id="senha" placeholder="<?php echo $senha; ?>"
                                           value="<?php
                                           if (isset($valorForm['senha'])) {
                                               echo $valorForm['senha'];
                                           }
                                           ?>"
                                           readonly> 
                                </div>
                            </div>

                            <h5 class="p-2 borda-conteudo" id="estilo">Dados Pessoais</h5><p><p>

                            <div class="form-group row alinhamento c-nome-resp"> 
                                <label for="Nome-Completo" class="col-sm-2 tamanho-font">Nome</label>
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="nome" type="text" id="nome-completo" placeholder="<?php echo $nome; ?>"
                                           value="<?php
                                           if (isset($valorForm['nome'])) {
                                               echo $valorForm['nome'];
                                           }
                                           ?>"
                                           readonly> 
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-nome-resp"> 
                                <label for="apelido" class="col-sm-2 tamanho-font a-alinhar">Apelido&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar"></a></label> 
                                <div class="col-sm-8">
                                    <input class="form-control tamanho-font bg-white" name="apelido" type="text" id="apelido" placeholder="<?php echo $apelido; ?>"
                                           value="<?php
                                           if (isset($valorForm['apelido'])) {
                                               echo $valorForm['apelido'];
                                           }
                                           ?>"
                                           readonly>

                                </div>
                            </div>

                            <div class="form-group row alinhamento c-email-resp"> 
                                <label for="Email" class="col-sm-2  tamanho-font">E-mail</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="email" type="text" id="email" placeholder="<?php echo $email; ?>"
                                           value="<?php
                                           if (isset($valorForm['email'])) {
                                               echo $valorForm['email'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-email-resp"> 
                                <label for="nivelAcesso" class="col-sm-2  tamanho-font">Nível de Acesso</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="nivelAcesso" type="text" id="email" placeholder="<?php echo $nome_nivac; ?>"
                                           value="<?php
                                           if (isset($valorForm['adms_nivel_acesso_id'])) {
                                               echo $valorForm['adms_nivel_acesso_id'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-email-resp"> 
                                <label for="situacaoUser" class="col-sm-2  tamanho-font">Situação</label> 
                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font bg-white" name="situacaoUser" type="text" id="situacaoUser" placeholder="<?php echo $nome_sit; ?>"
                                           value="<?php
                                           if (isset($valorForm['adms_sit_usuario_id'])) {
                                               echo $valorForm['adms_sit_usuario_id'];
                                           }
                                           ?>"
                                           readonly>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                        <?php
                        if ($this->dados['botao']['altUsuario']) {
                            //echo "<a href='" . URLADM . "alterar-usuario/alterar-usuario/$id' class='btn btn-outline-success btn-sm'>Alterar</a>&nbsp;";
                            echo "<div class='botao-atualizar b-atualizar pt-3'><a href='" . URLADM . "alterar-usuario/alterar-usuario/$id' class='btn btn-outline-success btn-sm'>Alterar</a></div>";
                        }
                        ?>


                    </form> <!-- Final Formulário Alterar Dados Cadastrais -->
                </div>
            </div>
        </fieldset>  
    </div>
</section><!-- Final Seção Visualizar Cadastro -->
</div>





