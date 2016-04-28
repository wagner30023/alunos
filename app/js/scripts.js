/* Efeitos do popup na hora de remover */

// Fecha o lightbox caso o usuario aperte ESC
window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}

// Configuração da box quando está visível
function lightbox_open(id, nome){
    window.scrollTo(0,0);
    document.getElementById('remover-box').style.display='block';
    document.getElementById('remover-link').setAttribute('href', 'listar.php?delet-id='+id);
    document.getElementById('remover-nome').innerHTML = nome;
    document.getElementById('remover-fade').style.display='block';  
}

// Evento para fechar a lightbox...
function lightbox_close(){
    document.getElementById('remover-box').style.display='none';
    document.getElementById('remover-fade').style.display='none';
}

$(document).ready( function () {
     $('#data').mask("99/99/9999");
});

