
<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li><a href="<?php echo URL . 'user/minha-conta/acesso-minha-conta'; ?>"> Minha Conta</a></li>        
            <li><a href="<?php echo URL . 'user/denuncia-comum/cadastrar-denuncia-comum'; ?>"> Nova Denúncia</a></li>

            <li>
                <a href="#submenu1" data-toggle="collapse"> Denúncias Realizadas
                </a>

                <ul class="list-unstyled collapse" id="submenu1">
                    <li><a href="<?php echo URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas'; ?>"> <i class="fas fa-seedling text-warning"></i> Listar Denúncias</a></li>  
                </ul>
            </li>

            <li>
                <a href="#submenu2" data-toggle="collapse"> Dados Cadastrais
                </a>

                <ul class="list-unstyled collapse" id="submenu2">
                    <li><a href="<?php echo URL . 'user/consultar-dados-cadastrais/consultar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Consultar</a></li>  
                    <li class="active"><a href="<?php echo URL . 'user/alterar-dados-cadastrais/alterar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Alterar </a></li>  
                </ul>
            </li>


            <li><a href="<?php echo URL . 'user/login/logout'; ?>"> Sair</a></li>
        </ul>
    </nav>

    <section id="" class="p-4"> <!-- Início Seção Alterar Cadastro -->
        <div class="container">

<!--            <a href="<?php echo URL . 'user/visualizar-dados-cadastrais/visualizar-dados-cadastrais'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-primary btn-sm">
                        Visualizar
                    </button>
                </div>
            </a>-->

            <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>ALTERAR DADOS DO DENUNCIANTE</b></h5>
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
                        if (isset($this->dados['form'])) {
                            $valorForm = $this->dados['form'];
                        }
                        if (isset($this->dados['form'][0])) {
                            $valorForm = $this->dados['form'][0];
                        }
                        ?>

                        <form class="p-2 form" method="POST" action=""> <!-- Início Formulário Alterar Dados Cadastrais -->

                            <h5 class="p-2 borda-conteudo" id="">Dados de Acesso</h5><p><p>

                            <div class="form-group row alinhamento c-login-resp"> 
                                <label for="Login" class="col-sm-2 tamanho-font">Login&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label>

                                <div class="col-sm-8 t-c-campos">
                                    <input class="form-control tamanho-font" name="login" type="text" id="usuario" placeholder="Digite o seu login"
                                           value="<?php
                                           if (isset($valorForm['login'])) {
                                               echo $valorForm['login'];
                                           }
                                           ?>"
                                           >
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-senha-resp ">
                                <label for="Senha" class="col-sm-2 tamanho-font">Senha&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                <div class="col-sm-8 t-c-campos"> 
                                    <input class="form-control tamanho-font" name="senha" type="password" id="senha" placeholder="Digite sua nova senha"
                                           value="<?php
                                           if (isset($valorForm[''])) {
                                               echo $valorForm[''];
                                           }
                                           ?>"
                                           >
                                </div>
                            </div>

                            <h5 class="p-2 bor-titulo borda-conteudo" id="estilo">Dados Pessoais</h5><p><p>

                            <div class="form-group row alinhamento c-nome-resp"> 
                                <label for="Nome-Completo" class="col-sm-2 tamanho-font">Nome&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                <div class="col-sm-8 t-c-campos">
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
                                <label for="cpf" class="col-sm-2 tamanho-font a-alinhar">CPF&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                <div class="col-sm-8">
                                    <input class="form-control tamanho-font" name="cpf" type="text" id="cpf" placeholder="Digite o seu cpf"
                                           value="<?php
                                           if (isset($valorForm['cpf'])) {
                                               echo $valorForm['cpf'];
                                           }
                                           ?>"
                                           >
                                </div>
                            </div>

                            <div class="form-group row alinhamento c-email-resp"> 
                                <label for="Email" class="col-sm-2 tamanho-font">E-mail&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                <div class="col-sm-8 t-c-campos">
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


                            <div class="form-group row alinhamento c-logradouro-resp"> 
                                <label for="Logradouro" class="col-sm-2 tamanho-font a-alinhar">Logradouro&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                                <div class="col-sm-8 t-c-logradouro">
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
                                <div class="col-sm-8 t-c-bairro">
                                    <input class="form-control tamanho-font" name="bairro" type="text" id="bairro" placeholder="Digite o seu bairro"
                                           value="<?php
                                           if (isset($valorForm['bairro'])) {
                                               echo $valorForm['bairro'];
                                           }
                                           ?>"
                                           >
                                </div>
                            </div>


                            <div class="botao-atualizar b-atualizar pt-3"><button type="submit" name="atualizar" class="btn btn-success btn-sm" value="atualizar">Alterar</button></div>
                        </form> <!-- Final Formulário Alterar Dados Cadastrais -->
                    </div>
                </div>
            </fieldset>  
        </div>
    </section><!-- Final Seção Alterar Cadastro -->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#cpf").mask("999.999.999-99");
    });
</script>
