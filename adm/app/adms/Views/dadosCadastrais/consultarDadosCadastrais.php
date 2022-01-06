<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<section id="" class="p-4 alinhamento"> <!-- Início Seção Visualizar Cadastro -->
    <div class="container">
        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CONSULTAR DADOS DO ADMINISTRADOR</b></h5>
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

                    <form class="p-2" class="form" action="<?php echo URLADM . 'alterar-dados-cadastrais/alterar-dados-cadastrais'; ?>" method="POST"> <!-- Início Formulário Alterar Dados Cadastrais -->

                        <h5 class="p-2 borda-conteudo" id="">Dados de Acesso</h5><p><p>

                            <?php
                            if (!empty($this->dados['dados_usuario'][0])) {
                                //var_dump($this->dados ['dados_usuario'][0]);
                                extract($this->dados ['dados_usuario'][0]);
                                ?>

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
                                <label for="cpf" class="col-sm-2 tamanho-font a-alinhar">CPF<a href="#" class="tooltip-test text-success tamanho-font a-alinhar"></a></label> 
                                <div class="col-sm-8">
                                    <input class="form-control tamanho-font bg-white" name="cpf" type="text" id="cpf" placeholder="<?php echo $cpf; ?>"
                                           value="<?php
                                           if (isset($valorForm['cpf'])) {
                                               echo $valorForm['cpf'];
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


                            <?php
                        }
                        ?>


<!--                        <div class="botao-atualizar b-atualizar pt-3"><button type="submit" name="editar" class="btn btn-success btn-sm" value="atualizar">Alterar</button></div>-->
                    </form> <!-- Final Formulário Alterar Dados Cadastrais -->
                </div>
            </div>
        </fieldset>  
    </div>
</section><!-- Final Seção Visualizar Cadastro -->
</div>



