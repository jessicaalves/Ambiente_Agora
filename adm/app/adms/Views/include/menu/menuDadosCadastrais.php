<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<header> <!-- Início Menu -->
    <nav class="navbar navbar-expand-sm navbar-dark barra-preta navbar-custom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="sidebar-toggle text-success">
                    <span class="navbar-toggler-icon"></span>
                </a>
                <a href="#" class="navbar navbar-brand"><img src="<?php echo URLADM . '/assets/img/imagensSistema/logo3.png'; ?>" width="140" height="40"></a>
            </li>
        </ul>
        <div class="dropdown nav-link ml-auto">
            <a class="dropdown-toggle nav-link mx-auto" data-toggle="dropdown"> <i class="fas fa-user-circle color-green"></i>&nbsp;<span class="d-none d-sm-inline">
                    <?php
                    $nome = explode(" ", $_SESSION['nome']);
                    //$nome = explode(" ", isset($POST['nome']) . $_SESSION['nome']);
                    $primeiro_nome = $nome[0];
                    echo $primeiro_nome;
                    ?></span>&nbsp;</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item bg-transparent" href="<?php echo URLADM . 'login/logout'; ?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
    </nav>  
</header> <!-- Final Menu -->


