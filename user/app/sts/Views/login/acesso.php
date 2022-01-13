
<section id="cadastro-login" class="secao-cadastro-login capa-cadastro-login"> <!-- Início Seção: Cadastro & Login & Denúncia Anônima -->
    <div class="container">
        <div class="row">  
            <div class="col-md-12">
                <div class="borda-login">
                    <i class="fas fa-user-circle text-success display-4 ml-3"></i>
                    <h5 class="p-3 ml-3">Minha Conta <i class="fas fa-seedling text-success"></i> Denunciante</h5>

                    <form  action="<?php echo URL . 'user/login/acesso-login'; ?>" class="form" method="POST"> <!-- Início Login -->
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
                            <label class="p-1"><a href="<?php echo URL . 'user/esqueceu-senha/esqueceu-senha'; ?>" class="form-control-sm text-success ml-3" style=" cursor: pointer;" target="">Esqueceu sua senha?</a></label>

                            <div class="p-3"><button name="acessar" type="submit"  value="acessar" class="btn btn-success btn-sm ">Acessar</button></div><p>
                        </div> 
                    </form> <!-- Final Login -->

                    <form action="<?php echo URL . 'user/cadastro/cadastrar-denunciante'; ?>" class="form pl-3" method="POST"> <!-- Início Cadastro -->
                        <div class="borda-cadastro pb-3"> 
                            <h5>Não possui uma conta? Cadastre-se!</h5>
                            <button type="submit" name="cadastrar" class="btn btn-success ml-2 btn-sm" value="cadastrar">Cadastrar</button>
                        </div> 
                    </form> <!-- Final Cadastro -->

                    <form class="form pb-2 pl-5"> <!-- Início Denúncia Anônima -->
                        <a href="<?php echo URL . 'user/denuncia-anonima/cadastrar-denuncia-anonima'; ?>" class="text-success form-control-sm a-modal" data-toggle="modal" data-target="#denunciarAnonimamente">Não quer se identificar? Denuncie anonimamente!</a>
                    </form> <!-- Final Denúncia Anônima -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="denunciarAnonimamente" tabindex="-1" role="dialog" aria-labelledby="denunciarAnonimamenteCentralizado" aria-hidden="true"> <!-- Início Janela Modal - Continuar Denúncia Anônima -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-body">
                    <h5 class="modal-title" id="TituloModalCentralizado"><i class="fas fa-seedling text-success"></i> Cadastrar Denúncia Anônima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-justify">
                    <b class="font-weight-bold">Tem certeza que deseja continuar?</b><br>
                    Após cadastrar uma denúncia anônima, não é possível consultar a denúncia e nem sua avaliação.
                    Por isso, para ter acesso a estas informações é necessário cadastrar uma nova conta.
                </div>
                <div class="modal-footer">
                    <a href="<?php echo URL . 'user/cadastro/cadastrar-denunciante'; ?>" class="p-2 flex-fill bd-highlight"><button class="btn-primary" style="border-radius: 4px; padding: 8px; cursor: pointer;  border: none; font-size: 15.5px;">Cadastrar Nova Conta</button></a>
                    <a href="<?php echo URL . 'user/denuncia-anonima/cadastrar-denuncia-anonima'; ?>" class="p-2 flex-fill bd-highlight"><button class="btn-success" style="border-radius: 4px; padding: 8px; cursor: pointer;  border: none; font-size: 15.5px;">Cadastrar Denúncia Anônima</button></a>               
                </div>
            </div>
        </div>
    </div> <!-- Final Janela Modal - Continuar Denúncia Anônima -->

</section> <!-- Final Seção: Cadastro & Login & Denúncia Anônima -->
