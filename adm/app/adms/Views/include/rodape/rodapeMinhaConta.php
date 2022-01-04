<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<footer> <!--Início Rodapé-->
    <div class="container">
        <div class="row">   
            <div class = "col-md-12 text-center">
                <p><small>&copy; Copyright 2022 | Desenvolvido por Jéssica Alves Ferreira.</small></p>
            </div>   
        </div>
    </div>
</footer> <!--Final Rodapé-->

</div> <!-- Final Sidebar Minha Conta -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- JS Personalizado -->
<script src="<?php echo URLADM . '/assets/js/janelaModalApagarUsuario.js'; ?>"></script>

<!-- Bootstrap JS Personalizado -->
<script src="<?php echo URLADM . '/assets/js/menuLateral.js'; ?>"></script>

<!-- JS Personalizado -->
<script src="<?php echo URLADM . '/assets/js/previewImagem.js'; ?>"></script>

<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- jQuery Mask -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<!-- jQuery Mask -->
<script type="text/javascript" src="<?php echo URLADM . '/assets/js/jquery.mask.min.js'; ?>"></script> 


</html>