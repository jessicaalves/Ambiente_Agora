
<header> <!-- Início Menu -->
    <nav class="navbar navbar-expand-sm navbar-light fixed-top barra-transparente navbar-custom"> <!-- Início Barra Navegação -->
        <div class="container"> 

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo URL . 'user/home/index'; ?>" class="nav-link"><i class="fas fa-home"></i> Home</a>
                </li>
            </ul>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal"> 
                <i class="fas fa-bars text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="nav-principal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?php echo URLADM . 'adm/login/acesso-login'; ?>" class="nav-link mx-auto">Administrativo</a>
                    </li>                   
                    <li class="nav-item divisor"></li>
                    <li class="nav-item">
                        <a href="<?php echo URL . 'user/home/index/#legislacao-ambiental'; ?>" class="nav-link mx-auto">Legislação Ambiental</a>
                    </li>
                    <li class="nav-item divisor"></li>
                    <li class="nav-item">
                        <a href="" class="nav-link mx-auto" data-toggle="modal" data-target="#denunciar">Denunciar</a>
                    </li>
                    <li class="nav-item divisor"></li>
                    <li class="nav-item">
                        <a href="<?php echo URL . 'user/login/acesso-login'; ?>" class="nav-link mx-auto">Entrar / Criar Conta</a>
                    </li>                  
                </ul>
            </div>
        </div>
    </nav> <!-- Final Barra Navegação -->
    
    <div class="modal fade" id="denunciar" tabindex="-1" role="dialog" aria-labelledby="denunciarAnonimamenteCentralizado" aria-hidden="true"> <!-- Início Janela Modal - Continuar Denúncia Anônima -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-body">
                    <h5 class="modal-title" id="TituloModalCentralizado"><i class="fas fa-seedling text-success"></i> Cadastrar Denúncia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-justify">
                    <b class="font-weight-bold"> Uma denúncia pode ser cadastrada de forma anônima ou identificada.</b>                                   
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
    
</header> <!-- Final Menu -->
