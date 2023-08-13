

function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {

    if (confirm('Deseja confirmar a exlusão?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content') },
            data: {
                id: idDoRegistro,
            },
            beforeSend: function () {
                $.blockUI({
                    message: "Carregando...",
                    timeout: 2000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.sucess == true) {
                window.location.reload();
            } else {
                alert("Não foi possivel excluir os dados");
            }
        }).fail(function (data) {
            $.unblockUI();
            alert("Não foi possivel acessar os dados");
        })
    }
}