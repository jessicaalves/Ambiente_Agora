
<section id="" class="p-4"> <!-- Início Seção Cadastro -->
    <div class="container">
        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CADASTRAR NOVA CONTA</b></h5>
        <fieldset class="the-fieldset">    
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados Cadastrais</h6>
                    </div>

                    <form class="p-2" method="POST" action=""> <!-- Início Formulário Cadastro -->

                        <h5 class="p-2 borda-conteudo" id="">Dados de Acesso - Administrador</h5><p><p>

                            <?php
                            //var_dump (isset($this->dados['form']));
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            if (isset($this->dados['form'])) {
                                $valorForm = $this->dados['form'];
                            }
                            ?>

                        <div class="form-group row alinhamento c-login-resp"> 
                            <label for="login" class="col-sm-2 tamanho-font a-alinhar">Login&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="login" type="text" id="usuario" placeholder="Digite o seu login" 
                                       value="<?php
                                       if (isset($valorForm['login'])) {
                                           echo $valorForm['login'];
                                       }
                                       ?>">
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-senha-resp">
                            <label for="senha" class="col-sm-2 tamanho-font a-alinhar">Senha&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8"> 
                                <input class="form-control tamanho-font" name="senha" type="password" id="senha" placeholder="Digite a sua senha"
                                       value="<?php
                                       if (isset($valorForm['senha'])) {
                                           echo $valorForm['senha'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>


                        <h5 class="p-2 bor-titulo borda-conteudo" id="estilo">Dados Pessoais</h5><p><p>

                        <div class="form-group row alinhamento c-nome-resp"> 
                            <label for="nome-completo" class="col-sm-2 tamanho-font a-alinhar">Nome&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="nome" type="text" id="nome-completo" placeholder="Digite o seu nome completo"
                                       value="<?php
                                       if (isset($valorForm['nome'])) {
                                           echo $valorForm['nome'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-nome-resp"> 
                            <label for="cpf" class="col-sm-2 tamanho-font a-alinhar">CPF&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font cpf" name="cpf" type="text" id="cpf" placeholder="Digite o seu cpf"
                                       value="<?php
                                       if (isset($valorForm['cpf'])) {
                                           echo $valorForm['cpf'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-email-resp"> 
                            <label for="email" class="col-sm-2 tamanho-font a-alinhar">E-mail&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="email" type="text" id="email" placeholder="Digite o seu e-mail"
                                       value="<?php
                                       if (isset($valorForm['email'])) {
                                           echo $valorForm['email'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>


                        <div class="botao-cadastrar b-cadastrar pt-3"><button type="submit" name="cadastrarUsuario" class="btn btn-success btn-sm" value="Cadastrar">Cadastrar</button></div>
                    </form> <!-- Final Formulário Cadastro -->
                </div>
            </div>

        </fieldset>   
    </div>
</section> <!-- Final Seção Cadastro -->


<script type="text/javascript">
    $(document).ready(function () {
        $("#cpf").mask("999.999.999-99");
    });
</script>



