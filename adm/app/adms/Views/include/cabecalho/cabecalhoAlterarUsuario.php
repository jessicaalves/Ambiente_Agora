<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<!-- @author jessica -->
<!-- Página Alterar Usuário -->  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <meta name="description" content="Ambiente Agora">
        <meta name="author" content="Jessica">

        <title>Alterar Administrador | Ambiente Agora</title>

        <link rel="icon" href="<?php echo URLADM . '/assets/img/imagensSistema/icon.png'; ?>">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo URLADM . '/assets/css/bootstrap.min.css'; ?>">

        <!-- Estilo Customizado -->
        <link rel="stylesheet" text="text/css" href="<?php echo URLADM . '/assets/css/adm_alterar_usuario.css'; ?>">

        <!-- Reboot CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo URLADM . '/assets/css/reboot.css'; ?>">

        <!-- Custom Fonts -->
        <link rel="stylesheet" type="text/css" href="<?php echo URLADM . '/assets/font-awesome/css/all.css'; ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"> 
        
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!-- jQuery Mask -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
