$(function () {

    // CPF Mask
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

            // Mostra e manipula o modal
            $('#generic-modal').modal('show')
            $('#generic-modal-title').text('Listagem de Entregas')

            // Apenda as entregas no modal em cards
            for (order of data) {
                $('#generic-modal-body').append(`
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><b>Remetente</b>: ${order.sender_name}</p>
                            <p class="card-text"><b>Destinatário</b>: ${order.receiver_name}</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" onclick="seachOrderTracking('${order.uuid}')">Detalhes</button>
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


function seachOrderTracking (uuid) {

        axios.get(`../api/order/tracking?uuid=${uuid}`)
            .then( ({ data }) => {

                // Mostra e manipula o modal
                $('#generic-modal').modal('show')
                $('#generic-modal-title').text('Status da Entrega')

                for (orderTracking of data.data) {

                    // Apenda as entregas no modal em cards
                    $('#generic-modal-body').append(`
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"><b>Status</b>: ${orderTracking.status}</p>
                                <p class="card-text"><b>Data</b>: ${orderTracking.status_date}</p>
                            </div>
                        </div>
                    `);
                }
            })
            .catch( error => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Erro ao buscar o rastreio da entrega!"
                });
            })
}
