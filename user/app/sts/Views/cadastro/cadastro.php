
<section id="" class="p-4"> <!-- Início Seção Cadastro -->
    <div class="container">
        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CADASTRAR UMA NOVA CONTA</b></h5>
        <fieldset class="the-fieldset">    
            <div class="row">
                <div class="col-md-12">
                    <div class="borda-sup">
                        <h6 class="ml-2 pt-1">Dados Cadastrais</h6>
                    </div>

                    <form class="p-2" method="POST" action=""> <!-- Início Formulário Cadastro -->

                        <h5 class="p-2 borda-conteudo" id="">Dados de Acesso - Usuário</h5><p><p>

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
                        
                        <div class="form-group row alinhamento c-email-resp"> 
                            <label for="apelido" class="col-sm-2 tamanho-font a-alinhar">Apelido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="apelido" type="text" id="apelido" placeholder="Digite o seu apelido"
                                       value="<?php
                                       if (isset($valorForm['apelido'])) {
                                           echo $valorForm['apelido'];
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
                        
                        <h5 class="p-2 bor-titulo borda-conteudo" id="estilo">Endereço</h5><p><p>

                        <div class="form-group alinhamento row c-logradouro-resp"> 
                            <label for="logradouro" class="col-sm-2 tamanho-font a-log a-alinhar">Logradouro&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="logradouro" type="text" id="logradouro" placeholder="Digite o seu endereço completo"
                                       value="<?php
                                       if (isset($valorForm['logradouro'])) {
                                           echo $valorForm['logradouro'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-bairro-resp"> 
                            <label for="bairro" class="col-sm-2 tamanho-font a-alinhar">Bairro&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <input class="form-control tamanho-font" name="bairro" type="text" id="bairro" placeholder="Digite o seu bairro"
                                       value="<?php
                                       if (isset($valorForm['bairro'])) {
                                           echo $valorForm['bairro'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>

                        <div class="botao-cadastrar b-cadastrar pt-3"><button type="submit" name="cadastrarUsuario" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button></div>
                    </form> <!-- Final Formulário Cadastro -->
                </div>
            </div>

        </fieldset>   
    </div>
</section> <!-- Final Seção Cadastro -->



