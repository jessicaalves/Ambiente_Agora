/*Author: Jéssica*/

/* ______JavaScript Personalidado______*/

/* ______Janela Modal Apagar Nível de Acesso______*/




$(document).ready(function () { /*Metódo responsável por carregar a modal do apagar nível de acesso*/
$('a[data-confirm]').click(function (ev) {
var href = $(this).attr('href');
        if (!$('#confirm-delete-nivac').length) {
$('body').append('<div class="modal fade" id="confirm-delete-nivac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header bg-danger text-white"><i class="fas fa-seedling fa-lg text-white"></i><b> Apagar Nível de Acesso</b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body text-justify"><b>Tem certeza que deseja apagar o nível de acesso selecionado?</b> Após excluir este item, não será possível ter acesso aos dados deste nível de acesso novamente.</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal" style="border-radius: 4px; padding: 8px; cursor: pointer;  border: none; font-size: 16px; float:center; vertical-align:middle;">Não, Listar Níveis de Acesso</button><a class="btn btn-danger text-white" id="dataComfirmOK" style="border-radius: 4px; padding: 8px; cursor: pointer; border: none; font-size: 16px; float:right; vertical-align:middle;">Sim, Apagar Nível de Acesso</a></div></div></div></div>');
}
$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete-nivac').modal({show: true});
        return false;
});
        });

