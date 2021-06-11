<!DOCTYPE html>
<html lang="pt-br">
    <?php
    require './core/Config.php';
    require './vendor/autoload.php';

    use Core\ConfigController as Home;

$url = new Home();
    $url->carregar();
    ?>
</html>
