<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<?php
if (isset($this->dados['form'])) {
    $valorForm = $this->dados['form'];
}
if (isset($this->dados['form'][0])) {
    $valorForm = $this->dados['form'][0];
}

//var_dump($this->dados['select']);
?>


<section id="" class="p-4"> <!-- Início Seção Cadastrar Usuário -->
    <div class="container">

        <?php
        if ($this->dados['botao']['listUsuario']) {
            ?>

            <a href="<?php echo URLADM . 'listar-usuarios/listar-usuarios'; ?>">
                <div class="p-2">
                    <button style="float:right; vertical-align:middle;" class="btn btn-outline-success btn-sm">
                        Listar
                    </button>
                </div>
            </a>
            <?php
        }
        ?>


        <h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>CADASTRAR USUÁRIO</b> </h5>
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

                    <form class="p-2 form" method="POST" action=""> <!-- Início Formulário Cadastrar Usuário -->

                        <h5 class="p-2 borda-conteudo" id="">Dados de Acesso - Cadastrar Usuário</h5><p><p>


                        <div class="form-group row alinhamento c-login-resp"> 
                            <label for="Login" class="col-sm-2 tamanho-font">Login&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label>
                            <div class="col-sm-8 t-c-campos">
                                <input class="form-control tamanho-font" name="login" type="text" id="login" placeholder="Digite o seu login"
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

                        <div class="form-group row alinhamento c-tipo-resp">
                            <label for="Tipo" class="col-sm-2 col-form-label tamanho-font alin-tip">Nível de Acesso&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <select class="form-control tamanho-font-tipo bg-white tamanho-font text-secondary" name="adms_nivel_acesso_id" type="select" id="adms_nivel_acesso_id">
                                    <option value="">Selecione o nível de acesso</option>
                                    <?php
                                    foreach ($this->dados['select']['nivac'] as $nivac) {
                                        extract($nivac);
                                        if ($valorForm['adms_nivel_acesso_id'] == $id_nivac) {
                                            echo "<option value='$id_nivac' selected>$nome_nivac</option>";
                                        } else {
                                            echo "<option value='$id_nivac'>$nome_nivac</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-tipo-resp">
                            <label for="Tipo" class="col-sm-2 col-form-label tamanho-font alin-tip">Situação&nbsp;<a href="#" class="tooltip-test text-success tamanho-font a-alinhar" title="Campo Obrigatório!">*</a></label> 
                            <div class="col-sm-8">
                                <select class="form-control tamanho-font-tipo bg-white tamanho-font text-secondary" name="adms_sit_usuario_id" type="select" id="adms_sit_usuario_id">
                                    <option value="">Selecione a situação</option>
                                    <?php
                                    foreach ($this->dados['select']['sit'] as $sit) {
                                        extract($sit);
                                        if ($valorForm['adms_sit_usuario_id'] == $id_sit) {
                                            echo "<option value='$id_sit' selected>$nome_sit</option>";
                                        } else {
                                            echo "<option value='$id_sit'>$nome_sit</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="botao-atualizar"><button class="btn btn-outline-success" type="submit" name="cadastrarUsuario" value="Cadastrar">Cadastrar</button></div> 


                    </form> <!-- Final Formulário Cadastrar Usuário -->
                </div
            </div>
        </fieldset>  
    </div>
</section><!-- Final Seção Cadastrar Usuário -->
</div>


