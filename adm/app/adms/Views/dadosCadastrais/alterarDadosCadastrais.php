<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<section id="" class="p-4"> <!-- Início Seção Alterar Cadastro -->
    <div class="container">
        
        <a href="<?php echo URLADM . 'visualizar-dados-cadastrais/visualizar-dados-cadastrais'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-outline-primary btn-sm">
                        Visualizar
                    </button>
                </div>
            </a>
        
        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>ALTERAR DADOS CADASTRAIS</b></h5>
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

                        <h5 class="p-2 borda-conteudo" id="">Dados de Acesso - Usuário</h5><p><p>

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

                        <div class="form-group row alinhamento c-nome-resp"> 
                            <label for="apelido" class="col-sm-2 tamanho-font a-alinhar">Apelido&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar"></a></label> 
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


                        <div class="botao-atualizar b-atualizar pt-3"><button type="submit" name="atualizar" class="btn btn-outline-success btn-sm" value="atualizar">Atualizar</button></div>
                    </form> <!-- Final Formulário Alterar Dados Cadastrais -->
                </div>
            </div>
        </fieldset>  
    </div>
</section><!-- Final Seção Alterar Cadastro -->
</div>


