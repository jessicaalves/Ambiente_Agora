<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>
<section> <!-- Início Seção Minha Conta -->
        <!--<h5 class="estilo-font p-1 text-body" style="letter-spacing: 0.5px;"><i class="fas fa-seedling text-success"></i> <b>MINHA CONTA</b></h5>-->
        <br>
        <h5 class="text-center"><b class="mensagem text-body">"Olá <i class="fas fa-seedling text-success"></i> 
                <?php
                $nome = explode(" ", $_SESSION['nome']);
                //$nome = explode(" ", isset($POST['nome']) . $_SESSION['nome']);
                $primeiro_nome = $nome[0];
                echo $primeiro_nome;
                ?> 
                <i class="fas fa-seedling text-success"></i>, Seja Bem-Vindo(a)!"</b></h5>
        <img src="<?php echo URLADM . '/assets/img/imagensSistema/imagem8-2.png'; ?>" width="60%" class="img-fluid">

    </section><!-- Final Seção Minha Conta -->

</div> <!-- Final Minha Conta -->


