$( () => {

    // Máscara para o CPF
    $('#cpf').mask('000.000.000-00', {reverse: true});

    /**
     * Captura evento de fechamento do modal pra limpar o conteúdo
     */
    $('#generic-modal').on('hidden.bs.modal',  () => {
        $('#generic-modal-body').html('');
    })

});


function searchOrders () {

    // Captura e remove caracteres especiais do CPF
    const cpf = $("#cpf").val().replace(/[^\w\s]/gi, '');

    axios.get(`../api/receiver/orders?cpf=${cpf}`)
        .then( ({ data }) => {

            // Se não encontrar nenhuma entrega, mostra um alerta
            if ( data.length === 0 ) {
                return Swal.fire({
                    icon: "info",
                    title: "Ops...",
                    text: "Nenhuma entrega encontrada para este CPF!"
                });
            }

            // Apenda as entregas no modal em cards
            for (order of data) {
                $('#generic-modal-body').append(`
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><b>Remetente</b>: ${order.sender_name}</p>
                            <p class="card-text"><b>Destinatário</b>: ${order.receiver_name}</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-order-tracking" order-uuid="${order.uuid}">Detalhes</button>
                        </div>
                    </div>
                `);
            }

            // Mostra e manipula o modal
            $('#generic-modal-title').text('Listagem de Entregas')
            $('#generic-modal').modal('show')
        })
        .catch( error => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Revise o seu CPF e tente novamente!"
            });
        })
}

/**
 * Evento de click no botão de "Detalhe" para rastreio
 */
$(document).on('click', '.btn-order-tracking', function (element) {

    // Captura atributo UUID do botão
    const uuid = $(element.target).attr('order-uuid');

    // Desabilita o botão para evitar multiplos clicks
    $(element.target).prop('disabled', true);

    axios.get(`../api/order/tracking?uuid=${uuid}`)
        .then( ({ data }) => {

            for (orderTracking of data.data) {

                // Apenda o status das entregas no modal em cards
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

})
