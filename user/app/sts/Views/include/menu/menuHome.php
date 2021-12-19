
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
                        <a href="<?php echo URL . 'user/login/acesso-login'; ?>" class="nav-link mx-auto">Entrar / Criar Conta</a>
                    </li>                  
                </ul>
            </div>
        </div>
    </nav> <!-- Final Barra Navegação -->
</header> <!-- Final Menu -->
