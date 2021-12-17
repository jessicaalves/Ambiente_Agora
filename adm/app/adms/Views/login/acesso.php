
<section id="cadastro-login" class="secao-cadastro-login capa-cadastro-login"> <!-- Início Seção: Cadastro & Login & Denúncia Anônima -->
    <div class="container">
        <div class="row">  
            <div class="col-md-12">
                <div class="">
                    <i class="fas fa-user-circle text-success display-4 ml-3"></i>
                    <h5 class="p-3 ml-3">Minha Conta <i class="fas fa-seedling text-success"></i> Administrador</h5>

                    <form  action="<?php echo URLADM . 'login/acesso-login'; ?>" class="form" method="POST"> <!-- Início Login -->
                        <?php
                        //var_dump($this->dados['form']);
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        if (isset($this->dados['form'])) {
                            $valorForm = $this->dados['form'];
                        }
                        ?>

                        <div class="form-group row alinhamento c-login-resp m-2 p-2"> 
                            <label for="login" class="col-sm-4 col-form-label tamanho-font t-l-login"><b>Login <a href="#" class="tooltip-test text-success tamanho-font" title="Campo Obrigatório!">*</a></b></label> 
                            <div class="col-sm-8">
                                <input class="form-control c-login-resp" name="login" type="text" id="usuario" placeholder="Digite o seu login" 
                                       value="<?php
                                       if (isset($valorForm['login'])) {
                                           echo $valorForm['login'];
                                       }
                                       ?>">
                            </div>
                        </div>

                        <div class="form-group row alinhamento c-senha-resp m-2 p-2">
                            <label for="senha" class="col-sm-4 col-form-label tamanho-font t-l-senha"><b>Senha <a href="#" class="tooltip-test text-success tamanho-font" title="Campo Obrigatório!">*</a></b></label> 
                            <div class="col-sm-8"> 
                                <input class="form-control c-senha-resp" name="senha" type="password" id="senha" placeholder="Digite a sua senha"
                                       value="<?php
                                       if (isset($valorForm['senha'])) {
                                           echo $valorForm['senha'];
                                       }
                                       ?>"
                                       >
                            </div>
                        </div>

                        <div class="form-group row custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="p-1 ml-3"><a href="<?php echo URLADM . 'esqueceu-senha/esqueceu-senha'; ?>" class="form-control-sm text-success" style=" cursor: pointer;" target="">Esqueceu sua senha?</a></label>

                            <div class="borda-cadastro pb-5"><button name="acessar" type="submit"  value="acessar" class="btn btn-success btn-sm">Acessar</button></div><p>

                        </div> 
                    </form> <!-- Final Login -->

                    <form action="<?php echo URLADM . 'cadastro/cadastrar-usuario'; ?>" class="form pl-4 p-2" method="POST">  <!--Início Cadastro--> 
                        <div class=""> 
                            <h5>Não possui uma conta? Cadastre-se!</h5>
                            <button type="submit" name="cadastrar" class="btn btn-success ml-2 btn-sm" value="cadastrar">Cadastrar</button>
                        </div> 
                    </form>  <!-- Final Cadastro--> 

                </div>
            </div>
        </div>
    </div>



</section> <!-- Final Seção: Cadastro & Login & Denúncia Anônima -->
