<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<div class="d-flex"> <!-- Início Sidebar Minha Conta -->
    <nav class="sidebar"> 
        <ul class="list-unstyled">

            <?php
            $cont_drop = 0;
            $cont_drop_fech = 0;
            foreach ($this->dados['menu'] as $menu) {
                extract($menu);
                if ($dropdown == 1) {
                    if ($cont_drop != $id_men) {
                        if (($cont_drop_fech == 1) AND ( $cont_drop != 0)) {
                            echo "</ul>";
                            echo "</li>";
                            $cont_drop_fech = 0;
                        }
                        echo "<li>";
                        echo "<a href='#submenu" . $id_men . "'data-toggle='collapse'>" . $nome_men;
                        echo "</a>";
                        echo "<ul id='submenu" . $id_men . "' class='list-unstyled collapse'>";
                        $cont_drop = $id_men;
                    }
                    echo "<li><a href='" . URLADM . $menu_controller . "/" . $menu_metodo . "'> <i class='fas fa-seedling text-warning'></i> " . $nome . "</a></li>";
                    $cont_drop_fech = 1;
                } else {
                    if ($cont_drop_fech == 1) {
                        echo "</ul>";
                        echo "</li>";
                        $cont_drop_fech = 0;
                    }
                    echo "<li><a href='" . URLADM . $menu_controller . "/" . $menu_metodo . "'>" . $nome_men . "</a></li>";
                }
            }
            if ($cont_drop_fech == 1) {
                echo "</ul>";
                echo "</li>";
                $cont_drop_fech = 0;
            }
            ?>
        </ul>
    </nav>

