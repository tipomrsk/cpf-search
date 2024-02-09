$(function () {

    $('#cpf').mask('000.000.000-00', {reverse: true});

    /**
     * Captura evento de fechamento do modal pra limpar
     */
    $('#generic-modal').on('hidden.bs.modal', function (event) {
        $('#generic-modal-body').html('');
    })

});




function searchOrders () {

    const cpf = $("#cpf").val().replace(/[^\w\s]/gi, '');

    axios.get(`../api/receiver/orders?cpf=${cpf}`)
        .then( ({ data }) => {

            if ( data.length === 0 )
                return Swal.fire({
                    icon: "info",
                    title: "Ops...",
                    text: "Nenhuma entrega encontrada para este CPF!"
                });

            $('#generic-modal').modal('show')
            $('#generic-modal-title').text('Listagem de Entregas')

            for (order of data) {
                $('#generic-modal-body').append(`
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Entrega</h5>
                            <p class="card-text">Remetente: ${order.sender_name}</p>
                            <p class="card-text">Destinatário: ${order.receiver_name}</p>
                        </div>
                    </div>
                `);
            }
        })
        .catch( error => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Revise o seu CPF e tente novamente!"
            });
        })
}
