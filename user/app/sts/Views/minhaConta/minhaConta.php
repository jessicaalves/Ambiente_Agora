
<div class="d-flex">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li class="active"><a href="<?php echo URL . 'user/minha conta/acessoMinhaConta'; ?>">Minha Conta</a></li>   
            <li><a href="<?php echo URL . 'user/denuncia comum/cadastrarDenunciaComum'; ?>">Nova Denúncia</a></li>
            <li><a href="<?php echo URL . 'user/denuncias realizadas/visualizarDenunciasRealizadas'; ?>">Denúncias Realizadas</a></li>
            <li><a href="<?php echo URL . 'user/visualizar dados cadastrais/visualizarDadosCadastrais'; ?>">Dados Cadastrais</a></li>
            <li><a href="<?php echo URL . 'user/login/logout'; ?>">Sair</a></li>
        </ul>
    </nav>

    <section> <!-- Início Seção Minha Conta -->
        <br>
        <h5 class="text-center"><b class="mensagem text-body">"Olá <i class="fas fa-seedling text-success"></i> <?php
                $nome = explode(" ", $_SESSION['nome']);
                //$nome = explode(" ", isset($POST['nome']) . $_SESSION['nome']);
                $primeiro_nome = $nome[0];
                echo $primeiro_nome;
                ?> <i class="fas fa-seedling text-success"></i>, Seja Bem-Vindo(a)!"</b></h5>
        <img src="<?php echo URL . 'user/assets/img/imagensSistema/imagem8-2.png'; ?>" width="60%" class="img-fluid">

    </section><!-- Final Seção Minha Conta -->
</div>

