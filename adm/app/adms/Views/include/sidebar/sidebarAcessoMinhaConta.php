<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
$sidebar_active = "";
if (isset($this->dados['sidebarActive'])) {
    $sidebar_active = $this->dados['sidebarActive'];
}
?>

<div class="d-flex">
    <!-- Início Sidebar Minha Conta -->
    <nav class="sidebar">
        <ul class="list-unstyled">

            <?php

            $count_drop_start = 0;
            $count_drop_end = 0;

            foreach ($this->dados['menu'] as $item_menu) {
                extract($item_menu);

                //var_dump($item_menu);

                $active = "";
                if ($sidebar_active == $menu_controller) {
                    $active = 'active';
                }

                if ($dropdown == 1) {
                    if ($count_drop_start != $id_men) {
                        if (($count_drop_end == 1) and ($count_drop_start != 0)) {
                            echo "</ul>";
                            echo "</li>";
                            $count_drop_end = 0;
                        }
                        echo "<li>";
                        echo "<a href='#submenu$id_men' data-toggle='collapse'> $nome_men</a>";
                        echo "<ul id='submenu$id_men' class='list-unstyled collapse'>";
                    }
                    echo "<li class='$active'><a href='" . URLADM . "$menu_controller/$menu_metodo'><i class='fas fa-seedling text-warning'></i> $nome</a></li>";
                    $count_drop_start = $id_men;
                    $count_drop_end = 1;
                } else {
                    if ($count_drop_end == 1) {
                        echo "</ul>";
                        echo "</li>";
                        $count_drop_end = 0;
                    }
                    echo "<li class='$active'><a href='" . URLADM . "$menu_controller/$menu_metodo'> $nome_men</a></li>";
                }
            }
            if ($count_drop_end == 1) {
                echo "</ul>";
                echo "</li>";
                $count_drop_end = 0;
            }
            echo "</ul>";
            ?>
        </ul>
    </nav>