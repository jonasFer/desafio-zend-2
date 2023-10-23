$(document).ready(function(){
    $(".btn-delete").click(function(e) {
        e.preventDefault();

        var url = $(this).attr('data-url');

        Swal.fire({
            title: 'Atenção',
            text: "Tem certeza que deseja deletar o registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                $('.btn-delete').attr('disabled', true);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    success: function() {
                        Swal.fire({
                            title: 'Registro deletado com sucesso!',
                            icon: 'success'
                        }).then((result) => {
                            location.reload()
                        })
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Erro',
                            text: 'Ocorreu um erro ao excluir o registro, tente novamente em alguns instantes',
                            icon: 'error'
                        })
                    },
                    complete: function () {
                        $('.btn-delete').attr('disabled', false);
                    }
                });
            }
        })
    });
});
