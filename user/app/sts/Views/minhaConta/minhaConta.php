
<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li class="active"><a href="<?php echo URL . 'user/minha-conta/acesso-minha-conta'; ?>"> Minha Conta</a></li>   
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
                    <li><a href="<?php echo URL . 'user/alterar-dados-cadastrais/alterar-dados-cadastrais'; ?>"> <i class="fas fa-seedling text-warning"></i> Alterar</a></li>  
                   </ul>
            </li>
            
            
            <li><a href="<?php echo URL . 'user/login/logout'; ?>"> Sair</a></li>
        </ul>
    </nav>

    <section> <!-- Início Seção Minha Conta -->
        <br>
        <h5 class="text-center"><b class="mensagem text-body">"Olá <i class="fas fa-seedling text-success"></i> <?php
                $nome = explode(" ", $_SESSION['nome']);
                //$nome = explode(" ", isset($POST['nome']) . $_SESSION['nome']);
                $primeiro_nome = $nome[0];
                echo $primeiro_nome;
                ?> <i class="fas fa-seedling text-success"></i>, Seja Bem-Vindo(a) ao <i class="fas fa-seedling text-success"></i> Ambiente Agora!"</b></h5>
        <img src="<?php echo URL . 'user/assets/img/imagensSistema/imagem8-2.png'; ?>" width="60%" class="img-fluid">

    </section><!-- Final Seção Minha Conta -->
</div>

